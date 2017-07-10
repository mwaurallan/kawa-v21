<?php



require('fpdf/fpdf.php');
include_once("objects/functions.php");
include_once("objects/fund.php");
include_once("config/database.php");

$insertdata=new DB_con();

$database=new database();
$db=$database->getConnection();
$fund=new fund($db);

$page_title="Savings";
//include_once("header.php");



//include_once("footer.php");
class PDF extends FPDF
{
// Page header
function Header()
{
// Logo
	//$this->Image('Print/model.png',10,6,17);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(30,8,'KAWA SELF HELP GROUP',0,1,'C');
	// Line break
	$this->SetFont('Arial','B',9);
	$this->Cell(180,6,'P.O. BOX 1478-00217, KAWANGWARE .TEL:020 2699768',0,1,'C');
	$this->Cell(180,6,'Email:kawa@yahoo.com',0,1,'C');
	$this->Ln();
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);

$dar=" LIST OF MEMBERS";

$pdf->Cell(40,10,"$dar");
$pdf->Ln();
$pdf->Cell(10,10,'NO',1);
$pdf->Cell(18,10,'M_NO',1);
$pdf->Cell(55,10,'NAME',1);
$pdf->Cell(55,10,'GENDER',1);
$pdf->Cell(40,10,'ID_NO',1);

$pdf->Ln();
//$query=mysql_query("SELECT * FROM blocks ORDER BY Block_ID ASC");
$sql=$insertdata->select();

$sql2=$insertdata->countm();
$row2=mysql_fetch_assoc($sql2);
$total2=$row2['total'];

//$row=mysql_fetch_array($sql);
//$name= $row['m_name'];
$x=1;
//$pdf->Cell(18,6,"$name",1);
while($row=mysql_fetch_array($sql)){

$m_no= $row['m_no'];
$m_name= $row['m_name'];
$m_gender= $row['m_gender'];
$id_no= $row['m_idno'];
$pdf->SetFont('Times','',10);
$pdf->Cell(10,6,"$x",1);
$pdf->Cell(18,6,"$m_no",1);
$pdf->Cell(55,6,"$m_name",1);
$pdf->Cell(55,6,"$m_gender",1);
$pdf->Cell(40,6,"$id_no",1);

$pdf->Ln();
$x++;
}
$pdf->Ln();
$pdf->Cell(170,6,"$total2",0,1,'R');
//$this->Cell(30,8,'KAWA SELF HELP GROUP',0,1,'C');

$pdf->Output();

?>

