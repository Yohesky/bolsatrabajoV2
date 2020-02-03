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
    $id_empresa = $_SESSION["idempresa"];
    $Query = "SELECT * FROM empresa WHERE idempresa='$id_empresa'";
    $rsQuery = mysqli_query($conexion, $Query) or die(mysqli_error($conexion));
    $resultado = mysqli_fetch_array($rsQuery);

    $id_propuesta = $_GET["idpropuesta"];
    $Query2 = "SELECT * FROM propuesta JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa WHERE idempresa= '$id_empresa'";
    $rsQuery2 = mysqli_query($conexion, $Query2) or die(mysqli_error($conexion));
    $resultado2 = mysqli_fetch_array($rsQuery2);
    // Logo
    $this->Image('img/empresa.png',10,10,33);
    // Arial bold 10
    $this->SetFont('Arial','B',9);
    // Datos de emision del reporte
    $this->Cell(0,5, utf8_decode($resultado['nombreEmpresa']),0,1,'R');
    $this->Cell(0,5, utf8_decode($resultado['correoEmpresa']),0,1,'R');
    $this->Cell(0,5, utf8_decode('Fecha de emision de Reporte '),0,1,'R');
    $this->Cell(0,5, utf8_decode('Hora de emision de Reporte '),0,1,'R');
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,15,utf8_decode('Reporte de la empresa '. $resultado['nombreEmpresa']),0,1,'C');
    // Arial bold 12
    $this->SetFont('Arial','B',12);
    // Subtítulo
    $this->Cell(0,10,utf8_decode('Postulados a la oferta de empleo '. $resultado2['titulo'] ),0,1,'C');
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
    $this->Cell(0,10, utf8_decode('Página ').$this->PageNo(),0,0,'C');
}
}

// Creación del objeto de la clase heredada
$fpdf = new PDF();
$fpdf->AliasNbPages();
$fpdf->AddPage();

require('includes/conexion.php');
$id_propuesta = $_GET["idpropuesta"];

$Query6 = "SELECT * FROM usuarios JOIN usuarios_has_propuesta ON usuarios.idusuarios = usuarios_has_propuesta.usuarios_idusuarios WHERE propuesta_idpropuesta= '$id_propuesta'";
$rsQuery6 = mysqli_query($conexion, $Query6) or die(mysqli_error($conexion));
$filas6 = mysqli_num_rows($rsQuery6);

$fpdf->SetFontSize(10);
$fpdf->SetFont('Arial','B');
$fpdf->SetFillColor(220,135,20);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetDrawColor(88,88,88);
$fpdf->Cell(180,10, utf8_decode('Lista de Postulados'),1,1,'C',1);
$fpdf->SetFillColor(255,255,255);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetDrawColor(88,88,88);

for($i=0; $i < $filas6; $i++){
    $resultado6[$i] = mysqli_fetch_array($rsQuery6);
    
    $fpdf->Cell(90,10, utf8_decode('Nombres: '. $resultado6[$i]['nombre']),1,0,'L',1);
    $fpdf->Cell(90,10, utf8_decode('Apellidos: '. $resultado6[$i]['apellido']),1,1,'L',1);
    $fpdf->Cell(27,10, utf8_decode('DNI: '. $resultado6[$i]['ci']),1,0,'L',1);
    $fpdf->Cell(28,10, utf8_decode('País: '. $resultado6[$i]['pais']),1,0,'L',1);
    $fpdf->Cell(35,10, utf8_decode('Ciudad: '. $resultado6[$i]['ciudad']),1,0,'L',1);
    $fpdf->Cell(90,10, utf8_decode('Dirección: '. $resultado6[$i]['direccion']),1,1,'L',1);
    $fpdf->Cell(30,10, 'Edad: '. $resultado6[$i]['edad'],1,0,'L',1);
    $fpdf->Cell(60,10, utf8_decode('Fecha de Nacimiento: '. $resultado6[$i]['fechaNacimiento']),1,0,'L',1);
    $fpdf->Cell(30,10, utf8_decode('Sexo: '. $resultado6[$i]['genero']),1,0,'L',1);
    $fpdf->Cell(60,10, utf8_decode('Estado Civil: '. $resultado6[$i]['estadoCivil']),1,1,'L',1);
    $fpdf->Cell(90,10, utf8_decode('Correo: '. $resultado6[$i]['correo']),1,0,'L',1);
    $fpdf->Cell(90,10, utf8_decode('Teléfono: '. $resultado6[$i]['num1']),1,1,'L',1);
    $fpdf->SetFillColor(0,0,0);
    $fpdf->SetTextColor(0,0,0);
    $fpdf->SetDrawColor(88,88,88);
    $fpdf->Cell(180,10, utf8_decode(''),1,1,'C',1);

}
//$fpdf->SetDrawColor(61,174,233);
$fpdf->SetLineWidth(1);
$fpdf->SetTextColor(0,0,0);

$fpdf->Output();
?>