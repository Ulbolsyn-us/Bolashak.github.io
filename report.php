<?php
    include('pdf/fpdf.php');
    include('connect.php');
    
    class PDF extends FPDF {
        
    }

    $result = mysqli_query($connection, "SELECT * FROM `users`");

    $pdf = new PDF();
    $pdf->AliasNbPAges();
    $pdf->AddPage();
    $pdf->SetFont('helvetica','',10);
    foreach($result as $row) {
        $pdf->Ln();
        foreach($row as $column)
        $pdf->Cell(30,12,$column,1,'L');
        }

    $pdf->Output();
    
?>