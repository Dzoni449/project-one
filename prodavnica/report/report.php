<?php


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $inputDateStart = $_POST['dateStart'];
    $inputDateEnd = $_POST['dateEnd'];

    $dateStart = date("Y-m-d", strtotime($inputDateStart));
    $dateEnd = date("Y-m-d", strtotime($inputDateEnd));
    $reportType = $_POST['reportType']; // 1= new users, 2= orders placed, 3= Product stats
    $reportFormat = $_POST['reportFormat']; // 1= PDF, 2= EXCEL

    if ($reportFormat == 2) {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        if ($reportType == 3) {
            $sheet->setCellValueByColumnAndRow(1, 1, 'Product');
            $sheet->setCellValueByColumnAndRow(2, 1, 'Price');
            $sheet->setCellValueByColumnAndRow(3, 1, 'Sales count');
            $sheet->setCellValueByColumnAndRow(4, 1, 'Total revenue');

            $maxSold = 0;
            $maxSoldName;
            $leastSold = PHP_INT_MAX;
            $leastSoldName;
            $totalRevenue = 0;
            $counter = 2;

            $q = "SELECT `id`,`name`,`cena` FROM `produkti`";
            $result = $database->executeQuery($q);
            while ($row = $result->fetch_assoc()) {
                $sheet->setCellValueByColumnAndRow(1, $counter, $row['name']);
                $sheet->setCellValueByColumnAndRow(2, $counter, $row['cena'] . '$');

                $q1 = "SELECT `kolicina` from `korpa` WHERE `product_id` =" . $row['id'];
                $result1 = $database->executeQuery($q1);
                $product_total_count = 0;
                while ($row1 = $result1->fetch_assoc()) {
                    $product_total_count += $row1['amount'];
                }
                $sheet->setCellValueByColumnAndRow(3, $counter, $product_total_count);
                $sheet->setCellValueByColumnAndRow(4, $counter, $product_total_count * $row['price'] . '$');
                $totalRevenue += $product_total_count * $row['price'];
                $counter++;

                if ($product_total_count > $maxSold) {
                    $maxSold = $product_total_count;
                    $maxSoldName = $row['name'];
                }

                if ($product_total_count < $leastSold) {
                    $leastSold = $product_total_count;
                    $leastSoldName = $row['name'];
                }

                $product_total_count = 0;
            }
            $sheet->setCellValueByColumnAndRow(1, $counter++, 'Most sought after product:' . $maxSoldName);
            $sheet->setCellValueByColumnAndRow(1, $counter++, 'Least sought after product:' . $leastSoldName);
            $sheet->setCellValueByColumnAndRow(1, $counter++, 'Total revenue(all products):' . $totalRevenue . '$');
        }
        if ($reportType == 1) {
            $sheet->setCellValueByColumnAndRow(1, 1, 'Name');
            $sheet->setCellValueByColumnAndRow(2, 1, 'Email');
            

            $counter = 2;
            $q = "SELECT `name`, `email`
                FROM `users`";

            $result = $database->executeQuery($q);
            while ($row = $result->fetch_assoc()) {
                $sheet->setCellValueByColumnAndRow(1, $counter, $row['name']);
                $sheet->setCellValueByColumnAndRow(2, $counter, $row['email']);
              
                $counter++;
            }
           
          
            $sheet->setCellValueByColumnAndRow(2, $counter++, "Count:");

            $q1 = "SELECT 
            `email`,
            COUNT(*) as `number2`
            FROM `users`
           
            ORDER BY COUNT(*) DESC";
            $result1 = $database->executeQuery($q1);
            while ($row1 = $result1->fetch_assoc()) {
               
                $sheet->setCellValueByColumnAndRow(2, $counter, $row1['number2']);
                $counter++;
            }
            $sheet->setCellValueByColumnAndRow(1, $counter++, 'Total number of new users:' . mysqli_num_rows($result));
        }

        if ($reportType == 2) {
            $q = "SELECT `datum`,`id` FROM `porudzbine`
            WHERE `datum` BETWEEN '" . $dateStart . "' AND '" . $dateEnd . "'";

            $result = $database->executeQuery($q);

            $counter = 2;
            $orderCount = mysqli_num_rows($result);

            $sheet->setCellValueByColumnAndRow(1, 1, 'datum');
            $sheet->setCellValueByColumnAndRow(2, 1, 'cena');
            $sheet->setCellValueByColumnAndRow(3, 1, 'Status)kupovine');

            $order_total = 0;
            $report_total = 0;
            $not_completed_counter = 0;

            while ($row = $result->fetch_assoc()) {
                $q1 = "SELECT `status_kupovine` FROM `porudzbine`
            WHERE `datum` BETWEEN '" . $dateStart . "' AND '" . $dateEnd . "'";

                $q2 = "SELECT `product_id`, `kolicina`
                FROM `korpa`
                WHERE `product_id`=" . $row['id'];
                $result2 = $database->executeQuery($q2);
                while ($row2 = $result2->fetch_assoc()) {
                    $q3 = "SELECT `cena` 
                    FROM `korpa`
                    WHERE `produkti`.`id`=" . $row2['product_id'];
                    $result3 = $database->executeQuery($q3);
                    while ($row3 = $result3->fetch_assoc()) {
                        $order_total += $row3['cena'] * $row2['kolicina'];
                    }
                }

                
        ob_clean();
        $excelName = $dateStart . "-" . $dateEnd . ".xlsx";
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $excelName);
        $writer->save('php://output');
 
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        if ($reportType == 3) {
            $pdf->Cell(50, 10, 'Product');
            $pdf->Cell(40, 10, 'Price');
            $pdf->Cell(40, 10, 'Sales count');
            $pdf->Cell(40, 10, 'Total revenue');
            $pdf->Ln();

            $maxSold = 0;
            $maxSoldName;
            $leastSold = PHP_INT_MAX;
            $leastSoldName;
            $totalRevenue = 0;

            $q = "SELECT `id`,`name`,`cena` FROM `produkti`";
            $result = $database->executeQuery($q);
            while ($row = $result->fetch_assoc()) {
                $pdf->Cell(50, 10, $row['name']);
                $pdf->Cell(40, 10, $row['cena']);

                $q1 = "SELECT `kolicina` from `korpa` WHERE `product_id` =" . $row['id'];
                $result1 = $database->executeQuery($q1);
                $product_total_count = 0;
                while ($row1 = $result1->fetch_assoc()) {
                    $product_total_count += $row1['kolicina'];
                }
                $pdf->Cell(40, 10, $product_total_count);
                $pdf->Cell(70, 10, $product_total_count * $row['cena'] . '$');
                $totalRevenue += $product_total_count * $row['cena'];

                if ($product_total_count > $maxSold) {
                    $maxSold = $product_total_count;
                    $maxSoldName = $row['name'];
                }

                if ($product_total_count < $leastSold) {
                    $leastSold = $product_total_count;
                    $leastSoldName = $row['name'];
                }

                $product_total_count = 0;
                $pdf->Ln();
            }

            $pdf->Cell(40, 10, 'Most sought after product:' . $maxSoldName);
            $pdf->Ln();
            $pdf->Cell(40, 10, 'Least sought after product:' . $leastSoldName);
            $pdf->Ln();
            $pdf->Cell(40, 10, 'Total revenue(all products):' . $totalRevenue . '$');
            $pdf->Ln();

            $pdfName = $dateStart . "-" . $dateEnd . ".pdf";
            $pdf->Output("D", $pdfName);
        }
        if ($reportType == 1) {

            $pdf->Cell(50, 10, 'Name');
            $pdf->Cell(70, 10, 'Email');
          

            $pdf->Ln();
            $q = "SELECT `name`, `email`
                FROM `users`";

            $result = $database->executeQuery($q);
            while ($row = $result->fetch_assoc()) {
                $pdf->Cell(50, 10, $row['name']);
                $pdf->Cell(70, 10, $row['email']);
               
                $pdf->Ln();
            }
           
            

            $pdfName = $dateStart . "-" . $dateEnd . ".pdf";
            $pdf->Output("D", $pdfName);
        }
        if ($reportType == 2) {
            $q = "SELECT `datum`,`id` FROM `porudzbine`
            WHERE `datum` BETWEEN '" . $dateStart . "' AND '" . $dateEnd . "'";

            $result = $database->executeQuery($q);

            $orderCount = mysqli_num_rows($result);

            $pdf->Cell(40, 10, 'datum');
            $pdf->Cell(40, 10, 'cena');
            $pdf->Cell(40, 10, 'status_kupovine');
            $pdf->Ln();

            $order_total = 0;
            $report_total = 0;
            $not_completed_counter = 0;

            
        }

        }
   
    //header("Location: ../reports");
 
