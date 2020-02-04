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
    $Query2 = "SELECT * FROM propuesta JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa WHERE idpropuesta= '$id_propuesta'";
    $rsQuery2 = mysqli_query($conexion, $Query2) or die(mysqli_error($conexion));
    $resultado2 = mysqli_fetch_array($rsQuery2);
    // Logo
    $this->Image('img/empresa.png',10,10,33);
    // Arial bold 10
    $this->SetFont('Arial','B',9);
    // Datos de emision del reporte
    $this->Cell(0,5, utf8_decode($resultado['nombreEmpresa']),0,1,'R');
    $this->Cell(0,5, utf8_decode($resultado['correoEmpresa']),0,1,'R');
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
$id_usuario = $_GET["id"];
$Query3 = "SELECT * FROM usuarios WHERE idusuarios='$id_usuario'";
$rsQuery3 = mysqli_query($conexion, $Query3) or die(mysqli_error($conexion));
$resultado3 = mysqli_fetch_array($rsQuery3);

$Query4 = "SELECT * FROM habilidades WHERE idusuario='$id_usuario'";
$rsQuery4 = mysqli_query($conexion, $Query4) or die(mysqli_error($conexion));
$filas4 = mysqli_num_rows($rsQuery4);


$Query5 = "SELECT * FROM experiencia WHERE usuarios_idusuarios='$id_usuario'";
$rsQuery5 = mysqli_query($conexion, $Query5) or die(mysqli_error($conexion));
$filas5 = mysqli_num_rows($rsQuery5);

$fpdf->SetFontSize(10);
$fpdf->SetFont('Arial','B');
$fpdf->SetFillColor(220,135,20);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetDrawColor(88,88,88);
$fpdf->Cell(180,10, utf8_decode('Información Básica del Postulado'),1,1,'C',1);
$fpdf->SetFillColor(255,255,255);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetDrawColor(88,88,88);
$fpdf->Cell(90,10, utf8_decode('Nombres: '. $resultado3['nombre']),1,0,'L',1);
$fpdf->Cell(90,10, utf8_decode('Apellidos: '. $resultado3['apellido']),1,1,'L',1);
$fpdf->Cell(27,10, utf8_decode('DNI: '. $resultado3['ci']),1,0,'L',1);
$fpdf->Cell(28,10, utf8_decode('País: '. $resultado3['pais']),1,0,'L',1);
$fpdf->Cell(35,10, utf8_decode('Ciudad: '. $resultado3['ciudad']),1,0,'L',1);
$fpdf->Cell(90,10, utf8_decode('Dirección: '. $resultado3['direccion']),1,1,'L',1);
$fpdf->Cell(30,10, 'Edad: '. $resultado3['edad'],1,0,'L',1);
$fpdf->Cell(60,10, utf8_decode('Fecha de Nacimiento: '. $resultado3['fechaNacimiento']),1,0,'L',1);
$fpdf->Cell(30,10, utf8_decode('Sexo: '. $resultado3['genero']),1,0,'L',1);
$fpdf->Cell(60,10, utf8_decode('Estado Civil: '. $resultado3['estadoCivil']),1,1,'L',1);
$fpdf->Cell(90,10, utf8_decode('Correo: '. $resultado3['correo']),1,0,'L',1);
$fpdf->Cell(90,10, utf8_decode('Teléfono: '. $resultado3['num1']),1,1,'L',1);
$fpdf->SetFillColor(220,135,20);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetDrawColor(88,88,88);
$fpdf->Cell(180,10, utf8_decode('Educación/Habilidades del Postulado'),1,1,'C',1);
$fpdf->SetFillColor(255,255,255);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetDrawColor(88,88,88);
$fpdf->Cell(90,10, utf8_decode('Educación: '. $resultado3['educacion']),1,0,'L',1);
$fpdf->Cell(45,10, utf8_decode('Idioma: '. $resultado3['idioma']),1,0,'L',1);
$fpdf->Cell(45,10, utf8_decode('Nivel: '. $resultado3['nivelIdioma']),1,1,'L',1);
$fpdf->Cell(180,10, utf8_decode('Disponiblidad para Viajar: '. $resultado3['disponibilidadViajar']),1,1,'L',1);
    for($i=0; $i < $filas4; $i++){
        $resultado4[$i] = mysqli_fetch_array($rsQuery4);
        $fpdf->Cell(90,10, utf8_decode('Habilidad: '. $resultado4[$i]['nombreHabilidad']),1,0,'L',1);
        $fpdf->Cell(90,10, utf8_decode('Nivel: '. $resultado4[$i]['nivelHabilidad']),1,1,'L',1);
    }
$fpdf->SetFillColor(220,135,20);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetDrawColor(88,88,88);
$fpdf->Cell(180,10, utf8_decode('Experiencia Laboral'),1,1,'C',1);
$fpdf->SetFillColor(255,255,255);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetDrawColor(88,88,88);

    for($i=0; $i < $filas5; $i++){
        $resultado5[$i] = mysqli_fetch_array($rsQuery5);
        $fpdf->Cell(90,10, utf8_decode('Nombre: '. $resultado5[$i]['expEmpresa']),1,0,'L',1);
        $fpdf->Cell(45,10, utf8_decode('País: '. $resultado5[$i]['expPais']),1,0,'L',1);
        $fpdf->Cell(45,10, utf8_decode('Sector: '. $resultado5[$i]['expSector']),1,1,'L',1);
        $fpdf->Cell(90,10, utf8_decode('Área: '. $resultado5[$i]['expArea']),1,0,'L',1);
        $fpdf->Cell(45,10, utf8_decode('Labor: '. $resultado5[$i]['expLabor']),1,0,'L',1);
        $fpdf->Cell(45,10, utf8_decode('Tiempo: '. $resultado5[$i]['yearExp']. ' Años'),1,1,'L',1);
        $fpdf->SetFillColor(255,255,255);
        $fpdf->Cell(180,5, '',1,1,'L',1);
    }

//$fpdf->SetDrawColor(61,174,233);
$fpdf->SetLineWidth(1);
$fpdf->SetTextColor(0,0,0);

$fpdf->Output();
?>