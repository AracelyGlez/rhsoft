<?php
// header('Content-Type:application/pdf');
// header('Content-Disposition: attachment; filename= usuarios.pdf');

// $data <==== $usuarios
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(90);
    // Título
    $this->Cell(30,10,'Listado de Nóminas','B',0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','Letter');
$pdf->SetFont('Arial','',10);
    //En vez de td se usan cell
     foreach ($data as $usuario): 
      $pdf->Cell(10,10,$usuario->id,1,0);
      $pdf->Cell(40,10, $usuario->rfc,1,0);
      $pdf->Cell(80,10, $usuario->nombre_nomina,1,0);
      $pdf->Cell(35,10, $usuario->departamento_nomina,1,0);
      $pdf->Cell(25,10, $usuario->nss_nomina,1,0);
      $pdf->Cell(10,10, $usuario->horas_nomina,1,0);
      $pdf->Cell(30,10, $usuario->pago_nominas,1,1);
          
     
     endforeach; 

     $pdf->Output('nominas.pdf','D');
   