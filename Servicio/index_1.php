<?php
require('fpdf/fpdf.php');
header("Content-Type: text/html;charset=utf-8");
class PDF extends FPDF{ //Cabecera de página
   
   function Header(){
        //Logo
    $this->Image("../images/header.jpg" , 10 ,5, 270, 40 , "JPG" ,"");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    //$this->Cell(60,10,'Titulo del archivo',1,0,'C');
    //Salto de línea
    
    /*$this->Cell(10);
    $this->Cell(0,75,'Actividades.');
    $this->Ln(25);
    $this->Cell(10);
    $this->Cell(0,75,'Observaciones.');*/
    
   }
   function Foot(){
        $this->SetFont('Arial','I',9);
        $str = '* Las tolerancias de entrega obedecen a la naturaleza del proceso productivo.  En caso de desviaciones atípicas, serán concertadas.';
        $this->Ln(10);
        $cad =utf8_decode($str);
        $this->Cell(10);
        $this->Cell(0,5,$cad,0,0);
            
   }
    function Footer(){//Pie de página

            $this->SetFont('Arial','I',8);
            $this->SetY(-10);
            $str= 'Teléfonos:  Sabaneta (574)3010996    Bogotá (571)2958747    Cali (572)6605721    Barranquilla (575)3555556  C&oacuted.Formato: F14-PC01   Vigencia formato: 22-Jun-2011';
            $cad1 =utf8_decode($str);
            $this->Cell(0,10,$cad1.' Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
  function TablaBasica($header){
    
    foreach($header as $col)
            $this->SetFont('Arial','B',12);
            $this->MultiCell(270,5,$col,1);
            //$this->Ln();
            $this->SetFont('Arial','',9);
            $this->Cell(160,5,"Empresa:",1);
            $str ="Cotización No.:";
            $cad =utf8_decode($str);
            $this->Cell(55,5,$cad,1);
            $this->Cell(55,5,"Fecha:",1);
            $this->Ln();
            $this->Cell(90,5,"Dirigida a: ",1);
            $this->Cell(90,5,"Cargo: ",1);
            $this->Cell(90,5,"E-Mail:",1);
            $this->Ln();
            $this->Cell(90,5,"Funcionario: ",1);
            $this->Cell(90,5,"Celular: ",1);
            $this->Cell(90,5,"E-Mail:",1);
    }
    function Tabla2(){
            $this->SetY(90);
            $this->SetFont('Arial','',9);
            $str ="CÓDIGO:";
            $cad = utf8_decode($str);
            $this->Cell(60,5,$cad,1);
            $this->Cell(110,5,'NOMBRE',1);
            $this->Cell(40,5,'CANTIDAD',1);
            $this->Cell(60,5,'PRECIO',1);
            for($i=0;$i<12;$i++){
                $this->Ln();
                $this->Cell(60,5,'',1);
                $this->Cell(110,5,'',1);
                $this->Cell(40,5,'',1);
                $this->Cell(60,5,'',1);
            } 
            $this->Ln();
            $this->Cell(155);
            $this->Cell(15,5,'TOTAL',1);
            $this->Cell(40,5,'',1);
            $this->Cell(60,5,'',1);
     }
     
     function Context(){
            $this->SetFont('Arial','B',14);
            $this->Cell(-80);
            $this->Cell(0,115,'ACUERDO  DE  NIVEL DE SERVICIO ');
            $this->SetY(10);
            $this->SetFont('Arial','',11);
            $str = "1.	Nuestro compromiso es entregar el primer pedido en 5 días calendario, después de";
            $cad = utf8_decode($str);
            $this->Cell(0,130,$cad);
            $this->Ln(1);
            $str = "haber recibido la orden de compra y haberse aprobado el arte.";
            $cad = utf8_decode($str);
            $this->Cell(0,140,$cad);
            
            $this->Ln(2);
            $str = "2.	Tiempo de entrega para reimpresiones: A convenir.";
            $cad = utf8_decode($str);
            $this->Cell(0,160,$cad);
            
            $this->Ln(2);
            $str = "3.	Su compromiso es solicitar las cantidades en la orden de compra de acuerdo con ";
            $cad = utf8_decode($str);
            $this->Cell(0,170,$cad);
            
            $this->Ln(1);
            $this->SetY(70);
            $str = "las cantidades y frecuencias ofertadas.";
            $cad = utf8_decode($str);
            $this->Cell(0,70,$cad);
            
            $this->Ln(2);
            $this->SetY(70);
            $str = "4.	Su compromiso para mitigar la obsolescencia es informar con al menos 3 meses ";
            $cad = utf8_decode($str);
            $this->Cell(0,90,$cad);
            
            $this->SetY(70);
            $str = "antelación el cambio de especificaciones (materiales,artes,tamaños,acabados,textos)";
            $cad = utf8_decode($str);
            $this->Cell(0,100,$cad);
            
            $this->SetFont('Arial','B',14);
            $this->SetX(190);
            $this->Cell(0,-5,'CONDICIONES COMERCIALES');
            $this->SetY(70);
            $this->SetFont('Arial','',11);
            $str = "1.	Vigencia de la oferta: 15 días.";
            $cad = utf8_decode($str);
            $this->Cell(180);
            $this->Cell(0,10,$cad);
            $str = "2.	Plazo de pago: Sujeto a estudio de crédito.";
            $cad = utf8_decode($str);
            $this->SetY(70);
            $this->Cell(180);
            $this->Cell(0,30,$cad);
            $str = "3.	Los precios dados son antes de IVA y no ";
            $cad = utf8_decode($str);
            $this->SetY(70);
            $this->Cell(180);
            $this->Cell(0,50,$cad);
            $str = "incluyen elementos especiales contractuales como: ";
            $cad = utf8_decode($str);
            $this->SetY(70);
            $this->Cell(180);
            $this->Cell(0,70,$cad);
            $str = "pólizas, garantías, seguros, impuestos,";
            $cad = utf8_decode($str);
            $this->SetY(70);
            $this->Cell(180);
            $this->Cell(0,90,$cad);
            $str = "logísticas especiales, entre otros.";
            $cad = utf8_decode($str);
            $this->SetY(70);
            $this->Cell(180);
            $this->Cell(0,110,$cad);
     }
}

 

$pdf = new PDF('L','mm','A4');
$pdf->AddPage();

//$pdf->Cell(40,10,'Hola, Mundo!');

//Títulos de las columnas
$header=array('OFERTA COMERCIAL');
$pdf->AliasNbPages();
//Primera página
//$pdf->AddPage();
$pdf->SetY(60);
$pdf->TablaBasica($header); 
$pdf->Tabla2(); 
$pdf->Foot();
$pdf->AddPage();
$pdf->Context();
$pdf->Output();
?> 