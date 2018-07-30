<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF{ //Cabecera de página
   function contenido($datos){
       $Funcionario = $datos;
   } 
   function Header(){
        //Logo
    $this->Image("../images/ORDENES DE SERVICIO.jpg" , 0 ,0, 210, 300 , "JPG" ,"");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(70);
    //Título
    //$this->Cell(60,10,'Titulo del archivo',1,0,'C');
    //Salto de línea
    $this->Cell(0,65,'FUNCIONARIO.');//
    $this->Cell(-60);
    $this->Cell(0,65,'RECIBIDO POR.');
    
    $this->Ln(11);
    $this->Cell(24);
    $this->SetFont('Arial','B',15);
    $this->Cell(0,65,'cliente.');
    $this->Cell(-90);
    $this->Cell(0,67,'tipo.');
    $this->Ln(6);
    $this->Cell(24);
    $this->Cell(0,65,'direccion.');
    $this->Cell(-90);
    $this->Cell(0,65,'Equipo.');
    $this->Cell(-40);
    $this->Cell(0,67,'Fecha Inic.');
    $this->Ln(6);
    $this->Cell(24);
    $this->Cell(0,65,'ciudad.');
    $this->Cell(-90);
    $this->Cell(0,64,'Marca.');
    $this->Ln(6);
    $this->Cell(24);
    $this->Cell(0,65,'Telefono.');
    $this->Cell(-90);
    $this->Cell(0,63,'Referencia.');
    $this->Cell(-40);
    $this->Cell(0,67,'Fecha Fin.');
    $this->Ln(6);
    $this->Cell(24);
    $this->Cell(0,65,'Contacto.');
    $this->Cell(-90);
    $this->Cell(0,62,'Serial.');
    $this->Ln(6);
    $this->Cell(110);
    $this->Cell(0,71,'Hora inic.');
    $this->Cell(-30);
    $this->Cell(0,71,'Hora Fin.');
    $this->Ln(6);
    $this->Cell(10);
    $this->Cell(0,75,'Actividades.');
    $this->Ln(25);
    $this->Cell(10);
    $this->Cell(0,75,'Observaciones.');
   }
   /*
	function Footer(){//Pie de página
		$this->SetY(-10);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   function TablaBasica($header){
    //Colores, ancho de línea y fuente en negrita
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	//Cabecera
	
	for($i=0;$i<count($header);$i++)
	$this->Cell(40,7,$header[$i],1,0,'C',1);
	$this->Ln();
	//Restauración de colores y fuentes
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	//Datos
	$fill=false;
	
	$this->Cell(40,6,"hola",'LR',0,'L',$fill);
	$this->Cell(40,6,"hola2",'LR',0,'L',$fill);
	$this->Cell(40,6,"hola3",'LR',0,'R',$fill);
	$this->Cell(40,6,"hola4",'LR',0,'R',$fill);
	$this->Ln();
	$fill=true;
	$this->Cell(40,6,"col",'LR',0,'L',$fill);
	$this->Cell(40,6,"col2",'LR',0,'L',$fill);
	$this->Cell(40,6,"col3",'LR',0,'R',$fill);
	$this->Cell(40,6,"col4",'LR',0,'R',$fill);
	$fill=!$fill;
	$this->Ln();
	$this->Cell(160,0,'','T');
	}*/
}

 

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
//$pdf->Cell(40,10,'Hola, Mundo!');

//Títulos de las columnas
//$header=array('Columna 1','Columna 2','Columna 3','Columna 4');
//$pdf->AliasNbPages();
//Primera página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->AddPage();
//$pdf->TablaBasica($header); 
$pdf->Output();
?> 