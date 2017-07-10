<?php


include_once("config/connect.php");
require('fpdf/fpdf.php');
//include_once("objects/functions.php");
//include_once("objects/fund.php");


//$insertdata=new DB_con();F

//$database=new database();
//$db=$database->getConnection();
//$fund=new fund($db);

$page_title="Banks Statements";

//include_once("header2.php");
//if(isset($_POST['send'])){
//$block=$_POST['block'];
if(isset($_POST['send'])){

//$name2="PATSON WANJIRI NDEMI";

$bankn=$_POST['b_name'];

$sql8=mysql_query("SELECT * FROM banks WHERE b_name='".$bankn."' ");
if ($sql8){

$row12=mysql_fetch_array($sql8);

$accno1=$row12['b_acno'];

}else{

	echo "Error in query".mysql_error();
}


//$sqlt=mysql_query("SELECT * FROM members WHERE m_name='".$name3."'");
//$sqlt=mysql_query("SELECT * FROM members WHERE m_name='".$name3."'");

//$ttt=mysql_query("SELECT s_mem_id FROM mem_savings7 WHERE m_name='".$name3."'");

//$sql40=mysql_query("SELECT * FROM savings WHERE m_name='".$name3."'");

//$row80=mysql_fetch_array($ttt);


//$sid=$row80['s_id'];
//SELECT []* FROM members WHERE m_name='PATSON WANJIRU NDEMI'
//PATSON WANJIRU NDEMI
//$row7=mysql_fetch_array($sqlt);
//$tel=$row7['m_tel'];
//echo $name2;
//include_once("footer.php
class PDF extends FPDF
{
// Page header
function Header()
{
// Logo

	$this->Image('Print/model.png',10,6,17);
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
//$pdf->SetFont('Times','B',12);

$dar=" Bank Satement";
$namel="Bank Name";
$named=$_POST['b_name'];
//$name3=$_POST['m_name'];
//$name8=$tel;
$dar15=" A/C No.";
$pdf->SetFont('Times','B',20);
$pdf->SetTextColor(91,137,42);
$pdf->Cell(70,10,"");
$pdf->Cell(40,10,"$dar");

$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell(55,10,"$namel",'B','L');
$pdf->Cell(55,10,"$named",'B','L');
$pdf->Cell(40,10,"$dar15",'B','L');
$pdf->Cell(10,10,"$accno1",'B','L');
//$pdf->Cell(55,10,"$name8",'B','L');
$pdf->Ln();
$pdf->Cell(50,10,'NO',1);
//$pdf->Cell(18,10,'M_NO',1);
//$pdf->Cell(18,10,'M_NO',1);
//$pdf->Cell(55,10,'NAME',1);
//$pdf->Cell(55,10,'BANK_NAME',1);
//$pdf->Cell(30,10,'A/C NO',1);
$pdf->Cell(60,10,'DATE',1);
$pdf->Cell(60,10,'AMOUNT DEPOSITED',1);
//$pdf->Cell(30,10,'CONTR',1);
//$pdf->Cell(20,10,'BALAN',1);
$pdf->Ln();
//$query=mysql_query("SELECT * FROM blocks ORDER BY Block_ID ASC");
//$sql=$insertdata->selects();
//$sql=mysql_query("SELECT * FROM mem_savings WHERE m_name='PATSON WANJIRI NDEMI'");

//$sql=mysql_query("SELECT * FROM mem_savings WHERE m_name='".$name3."' ");
$sql=mysql_query("SELECT * FROM bank_depo WHERE b_name='".$bankn."' ");

//ORDER BY m_name ASC
//'".$name3."' 
$qc2=mysql_query("SELECT SUM(d_amount) as amt FROM bank_depo WHERE b_name='".$bankn."'");
$rm2=mysql_fetch_array($qc2);
$TotalAmt=$rm2['amt'];
$TotalAmt2=number_format($TotalAmt,2);
$dar4="Totals";


//$qc3=mysql_query("SELECT s_balance FROM savings WHERE s_mem_id='18' ORDER BY s_id DESC");
//SELECT s_balance FROM savings WHERE s_mem_id='18' ORDER BY s_id DESC

//$qc3=mysql_query("SELECT SUM(s_balance) as amtb FROM mem_savings WHERE m_name='".$name3."'");
//$rm3=mysql_fetch_array($qc3);
//$TotalAmt3=$rm3['s_balance'];
//$TotalAmt4=number_format($TotalAmt3,2);
//$dar2="Expected Shares";
//$dar3="Arreas";

//$qc4=mysql_query("SELECT SUM(s_contrib) as amtc FROM mem_savings WHERE m_name='".$name3."'");
//$rm4=mysql_fetch_array($qc4);
//$TotalAmt5=$rm4['amtc'];
//$TotalAmt6=number_format($TotalAmt5,2);
//$dar4="Total Contribution";

//$qc5=mysql_query("SELECT SUM(s_fine) as amtf FROM mem_savings WHERE m_name='".$name3."'");
//$rm5=mysql_fetch_array($qc5);
//$TotalAmt7=$rm5['amtf'];
//$TotalAmt8=number_format($TotalAmt7,2);
//$dar6="Total Fines";
//$dar3="Arreas";
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

//$b_name= $row['b_name'];
//$b_acno= $row['b_acno'];
$b_date= $row['d_date'];
$d_amount= $row['d_amount'];
//$s_contrib= $row['s_contrib'];
//$s_fine= $row['s_fine'];
//$s_balance= $row['s_balance'];
//$s_amount2=SUM($row2['s_amount']);
$pdf->SetFont('Times','',10);
$pdf->Cell(50,6,"$x",1);
//$pdf->Cell(18,6,"$m_no",1);
//$pdf->Cell(55,6,"$m_name",1);
//$pdf->Cell(55,6,"$b_name",1);
//$pdf->Cell(30,6,"$b_acno",1);
$pdf->Cell(60,6,"$b_date",1);
$pdf->Cell(60,6,"$d_amount",1);

//$pdf->Cell(20,6,"$s_balance",1)


$pdf->Ln();
//$pdf->Cell(55,6,"$s_amount2",1);
$x++;
}
$pdf->Ln();
$pdf->Cell(80,6,"",0,'C');
$pdf->SetFont('Times','',18);
//$pdf->Cell(28,6,"$dar2",0,'C');
//$pdf->Cell(30,6,"$TotalAmt2",1);
//$pdf->Cell(10,6,"$dar3",0,1);
//$pdf->Cell(20,6,"$TotalAmt4",1);
//$pdf->Cell(55,10,"$dar2",'B','L');

$pdf->Cell(55,10,"$dar4",'B','L');
$pdf->Cell(35,10,"$TotalAmt2",'B','L');

//$pdf->Ln();
//$pdf->Cell(80,6,"",0,'C');
//$pdf->Cell(55,10,"$dar4",'B','L');
//$pdf->Cell(55,10,"$TotalAmt6",'B','L');

//$pdf->Ln();
//$pdf->Cell(80,6,"",0,'C');
//$pdf->Cell(55,10,"$dar6",'B','L');
//$pdf->Cell(55,10,"$TotalAmt7",'B','L');

//$pdf->Ln();
//$pdf->Cell(80,6,"",0,'C');
//$pdf->Cell(55,10,"$dar3",'B','L');
//$pdf->Cell(55,10,"$TotalAmt4",'B','L');
//$pdf->Cell(170,6,"$total2",0,1,'R');
//$this->Cell(30,8,'KAWA SELF HELP GROUP',0,1,'C');

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
					<td>Select Member</td>
					</tr>
					

<tr><td><select name="b_name" class='form-control'><option val1ue='ALL'>ALL</option>
<?php
//$query=mysql_query("SELECT * FROM blocks ORDER BY Block_ID ASC")or die(mysql_error());
$sql4=mysql_query("SELECT * FROM banks ORDER BY b_name ASC")or die(mysql_error());
while($rw=mysql_fetch_array($sql4)){
echo "<option value='".$rw['b_name']."'>".$rw['b_name']."</option>";

}
echo "</select></td></tr>";
echo "<tr>";

echo "<td><br/><input type='submit' name='send' value='Print'></td>
";
?>

</tr></table>

</form></fieldset>
</body></html>


<?php
/*}else{
header("Location:index.php");
}*/

//include_once("header.php");
?>