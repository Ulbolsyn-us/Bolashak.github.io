<?php
    include('pdf/fpdf.php');
    include('connect.php');
    
    class PDF extends FPDF {
        function Header()
            {
                
                $this->SetFont('Times','',12);
                $this->Cell(80);
                $this->Cell(30,10,'Report',1,0,'C');
                $this->Ln(20);
            }
            function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Times','',12);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    $result = mysqli_query($connection, "SELECT `id`,`iin`,`goal`, `date`, `time`, `operation` FROM `users`");

    $pdf = new PDF();
    $pdf->AliasNbPAges();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    foreach($result as $row) {
        $pdf->Ln();
        foreach($row as $column)
        $pdf->Cell(30,12,$column,1,'L');
        }

    $pdf->Output();
    
?>