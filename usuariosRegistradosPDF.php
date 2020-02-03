<?php
require('fpdf/fpdf.php');
require('includes/conexion.php');

session_start();


class PDF extends FPDF
{
    
// Cabecera de página
function Header()
{
    require('includes/conexion.php');
    //$id_admin = $_SESSION["idempresa"];
    //$Query = "SELECT * FROM empresa WHERE idempresa='$id_empresa'";
    //$rsQuery = mysqli_query($conexion, $Query) or die(mysqli_error($conexion));
    //$resultado = mysqli_fetch_array($rsQuery);

    //$id_propuesta = $_GET["idpropuesta"];
    $Query = "SELECT * FROM usuarios";
    $rsQuery = mysqli_query($conexion, $Query) or die(mysqli_error($conexion));
    $filas = mysqli_num_rows($rsQuery);
    // Logo
    $this->Image('img/empresa.png',10,10,33);
    // Arial bold 10
    $this->SetFont('Arial','B',9);
    // Datos de emision del reporte
    $this->Cell(0,5, utf8_decode('Nombre de la Aplicación'),0,1,'R');
    $this->Cell(0,5, utf8_decode('Correo de Administrador'),0,1,'R');

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,15,utf8_decode('Reporte de Administrador'),0,1,'C');
    // Arial bold 12
    $this->SetFont('Arial','B',12);
    // Subtítulo
    $this->Cell(0,10,utf8_decode('Total de usuarios registrados es: '. $filas),0,1,'C');
    // Salto de línea
    $this->Ln(10);
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('Página ').$this->PageNo(),0,0,'C');
}
}

// Creación del objeto de la clase heredada
$fpdf = new PDF();
$fpdf->AliasNbPages();
$fpdf->AddPage();

require('includes/conexion.php');
//$id_propuesta = $_GET["idpropuesta"];

$Query2 = "SELECT * FROM usuarios";
$rsQuery2 = mysqli_query($conexion, $Query2) or die(mysqli_error($conexion));
$filas2 = mysqli_num_rows($rsQuery2);

$fpdf->SetFontSize(10);
$fpdf->SetFont('Arial','B');
$fpdf->SetFillColor(220,135,20);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetDrawColor(88,88,88);
$fpdf->Cell(180,10, utf8_decode('Lista de Usuarios Registrados'),1,1,'C',1);


for($i=0; $i < $filas2; $i++){
    $resultado2[$i] = mysqli_fetch_array($rsQuery2);
    $j = $i + 1;

        $fpdf->SetFillColor(255,255,255);
        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetDrawColor(88,88,88);
        $fpdf->Cell(10,10, $j,1,0,'L',1);
        $fpdf->Cell(80,10, utf8_decode('Nombres: '. $resultado2[$i]['nombre']),1,0,'L',1);
        $fpdf->Cell(90,10, utf8_decode('Apellidos: '. $resultado2[$i]['apellido']),1,1,'L',1);
        $fpdf->Cell(27,10, utf8_decode('DNI: '. $resultado2[$i]['ci']),1,0,'L',1);
        $fpdf->Cell(28,10, utf8_decode('País: '. $resultado2[$i]['pais']),1,0,'L',1);
        $fpdf->Cell(35,10, utf8_decode('Ciudad: '. $resultado2[$i]['ciudad']),1,0,'L',1);
        $fpdf->Cell(90,10, utf8_decode('Dirección: '. $resultado2[$i]['direccion']),1,1,'L',1);
        $fpdf->Cell(30,10, 'Edad: '. $resultado2[$i]['edad'],1,0,'L',1);
        $fpdf->Cell(60,10, utf8_decode('Fecha de Nacimiento: '. $resultado2[$i]['fechaNacimiento']),1,0,'L',1);
        $fpdf->Cell(30,10, utf8_decode('Sexo: '. $resultado2[$i]['genero']),1,0,'L',1);
        $fpdf->Cell(60,10, utf8_decode('Estado Civil: '. $resultado2[$i]['estadoCivil']),1,1,'L',1);
        $fpdf->Cell(90,10, utf8_decode('Correo: '. $resultado2[$i]['correo']),1,0,'L',1);
        $fpdf->Cell(90,10, utf8_decode('Teléfono: '. $resultado2[$i]['num1']),1,1,'L',1);
        $fpdf->SetFillColor(0,0,0);
        $fpdf->SetTextColor(0,0,0);
        $fpdf->SetDrawColor(88,88,88);
        $fpdf->Cell(180,5, utf8_decode(''),1,1,'C',1);
  
 $j++;
}
//$fpdf->SetDrawColor(61,174,233);
$fpdf->SetLineWidth(1);
$fpdf->SetTextColor(0,0,0);

$fpdf->Output();
?>