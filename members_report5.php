<?php


include_once("config/connect.php");
require('fpdf/fpdf.php');
//include_once("objects/functions.php");
//include_once("objects/fund.php");


//$insertdata=new DB_con();F

//$database=new database();
//$db=$database->getConnection();
//$fund=new fund($db);

$page_title="Savings";

//include_once("header2.php");
//if(isset($_POST['send'])){
//$block=$_POST['block'];
if(isset($_POST['send'])){

//$name2="PATSON WANJIRI NDEMI";

$date1=$_POST['date1'];


$date2=$_POST['date2'];
//echo $name2;
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
	$this->Cell(180,6,'P.O. BOX 1478-00217, Kawangware.TEL:020 2699768',0,1,'C');
	$this->Cell(180,6,'Email:kawa@yahoo.com',0,1,'C');
	$this->Cell(180,6,'Name',0,1,'C');

	$this->Ln();
	
	//$pdf->Cell(55,6,"$s_amount",1);
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

$dar=" MEMBERS CONTRIBUTIONS SUMMARY";
$namel="From:";
$datef=$date1;
$datet=$date2;
$to="TO";
//$named=$_POST['m_name'];
//$name3=$_POST['m_name'];
$pdf->Cell(60,10,"");
$pdf->Cell(40,10,"$dar");

$pdf->Ln();

$pdf->Cell(55,10,"$namel",'B','L');
$pdf->Cell(40,10,"$datef",'B','L');
$pdf->Cell(35,10,"$to",'B','L');
$pdf->Cell(35,10,"$datet",'B','L');
//$pdf->Cell(55,10,"$named",'B','L');

$pdf->Ln();
$pdf->Cell(10,10,'NO',1);
$pdf->Cell(18,10,'M_NO',1);
//$pdf->Cell(18,10,'M_NO',1);
//$pdf->Cell(55,10,'NAME',1);
$pdf->Cell(55,10,'DATE',1);
$pdf->Cell(30,10,'Contribution',1);
$pdf->Cell(30,10,'Fines',1);
$pdf->Cell(30,10,'Arreas',1);

$pdf->Ln();
//$query=mysql_query("SELECT * FROM blocks ORDER BY Block_ID ASC");
//$sql=$insertdata->selects();
//$sql=mysql_query("SELECT * FROM mem_savings WHERE m_name='PATSON WANJIRI NDEMI'");

$sql=mysql_query("SELECT * FROM mem_savings2 WHERE DATE(s_date) BETWEEN '$date1' AND '$date2' ");
if($sql){

$qc2=mysql_query("SELECT SUM(s_contrib) as amt FROM mem_savings2");
$rm2=mysql_fetch_array($qc2);
$TotalAmt=$rm2['amt'];
$TotalAmt2=number_format($TotalAmt,2);
//com1pute f1ines totals
$qc3=mysql_query("SELECT SUM(s_fine) as amt2 FROM mem_savings2");
$rm3=mysql_fetch_array($qc3);
$TotalAmt3=$rm3['amt2'];
$TotalAmt4=number_format($TotalAmt3,2);

$qc4=mysql_query("SELECT SUM(s_arreas) as amt3 FROM mem_savings2");
$rm4=mysql_fetch_array($qc4);
$TotalAmt5=$rm4['amt3'];
$TotalAmt6=number_format($TotalAmt5,2);
//SELECT users.* FROM users WHERE DATE(created_at) BETWEEN '2011-12-01' AND '2011-12-06'
//'".$name3."' 
//$qc2=mysql_query("SELECT SUM(s_amount) as amt FROM mem_savings WHERE m_name='".$name3."'");
//$rm2=mysql_fetch_array($qc2);
//$TotalAmt=$rm2['amt'];
//$TotalAmt2=number_format($TotalAmt,2);
$dar2="TOTALS";
//$query=mysql_query("SELECT * FROM members_reg WHERE BlockNo='".$block."' ORDER BY Connection_No ASC");
 //WHERE Connection_No='".$conn."' ORDER BY Arr_ID DESC

//$sql2=$insertdata->countm(); 
//$row2=mysql_fetch_assoc($sql2);
//$total2=$row2['total'];

//$row=mysql_fetch_array($sql);
//$name= $row['m_name'];
$x=1;
//$pdf->Cell(18,6,"$name",1);
//$row2=mysql_fetch_array($sql);
//$s_amount2=SUM($row2['s_amount']);
while($row=mysql_fetch_array($sql)){

$m_no= $row['m_no'];
$m_name= $row['m_name'];
$m_date= $row['s_date'];
$s_amount= $row['s_contrib'];
$s_fine= $row['s_fine'];	
$s_arreas= $row['s_arreas'];
//$s_amount2=SUM($row2['s_amount']);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,6,"$x",1);
$pdf->Cell(18,6,"$m_no",1);
//$pdf->Cell(55,6,"$m_name",1);
$pdf->Cell(55,6,"$m_date",1);
$pdf->Cell(30,6,"$s_amount",1);
$pdf->Cell(30,6,"$s_fine",1);
$pdf->Cell(30,6,"$s_arreas",1);
$pdf->Ln();
//$pdf->Cell(55,6,"$s_amount2",1);
$x++;
}
$pdf->Ln();
$pdf->Cell(55,6,"",0,'C');
$pdf->SetFont('Times','',18);
$pdf->Cell(28,6,"$dar2",0,'C');
$pdf->Cell(28,6,"$TotalAmt2",0,'C');
$pdf->Cell(35,6,"$TotalAmt4",0,'C');
$pdf->Cell(28,6,"$TotalAmt5",0,'C');
//$pdf->Cell(55,6,"$TotalAmt2",1);

//$pdf->Cell(170,6,"$total2",0,1,'R');
//$this->Cell(30,8,'KAWA SELF HELP GROUP',0,1,'C');
}else{

	echo mysql_error();
}

$pdf->Output();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>KAWA SHG</title>
<link rel="stylesheet" href="../css/styles.css" />
<script src="../jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../calendar/calendar.js"></script>
<script type="text/javascript" src="../calendar/calendar-setup.js"></script>
<script type="text/javascript" src="../calendar/lang/calendar-en.js"></script>
 <style type="text/css"> @import url("../calendar/calendar-win2k-cold-1.css"); </style>
 <link href="libs/css/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen"/>


</head>
<body bgcolor="#f5f5dc">
<form method="POST" action="">
<table  align='centre' class='table table-hover table-responsive table-bordered'>
<tr>
				<td>Select date Range To View</td>
</tr>
<tr>
	<td><input type='date' name='date1' class='form-control'/></td>

	<td><input type='date' name='date2' class='form-control'/></td>

</tr>
<tr>


<td><input type='submit' name='send' value='Print'></td>
</tr>

</table>

</form></fieldset>
</body></html>


<?php
/*}else{
header("Location:index.php");
}*/

//include_once("header.php");
?>