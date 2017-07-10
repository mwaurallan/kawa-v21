<?php



//$mem_id2=$_GET['id'];
//echo  $mem_id2; 

//echo $mem_id2=$_GET['id'];

//} else{

	//die('ERROR: missing ID.');
//}
include_once("objects/functions.php");
include_once("objects/fund.php");
include_once("config/database.php");
include_once("config/connect.php");



$page_title="Deposits";
include_once("header.php");





include_once("footer.php");

?>
<?php

//if(isset($_POST['submit']))
if(isset($_POST['submit']))
{
//echo "data updated";
$d_date=trim($_POST['d_date']);
$d_amount=trim($_POST['d_amount']);
$d_bank_id=trim($_POST['d_bank_id']);
//$s_t_id=$_POST['s_t_id'];

$sql=mysql_query("insert into  deposits(d_date,d_amount,d_bank_id) 
        values('$d_date','$d_amount','$d_bank_id')");

$sql5=mysql_query("SELECT * from t_fund ");

$row6=mysql_fetch_assoc($sql5);

    $fund=$row6['t_amount'];

    $fund2=$fund-$d_amount;
    
    $sql7=mysql_query("UPDATE t_fund SET t_amount='$fund2' ");
    if($sql7){

        //echo "update success";
    }else{
        mysql_error();
    }
    //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE i$amntfnd=2";

//$sql=$insertdata->insert($fname,$email,$contact,$gender,$education,$adrss);

if($sql)
{
 echo "<div class='alert alert-success'>Bank added succesfuly.</div>";
}
else
{
echo "<div class='alert alert-danger'>Unable to add Bank</div>".mysql_error();
}
}
 ?>

<form  action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Date</td>
            <td><input type='date' name='d_date'  value='' class='form-control' /></td>
        </tr>

        <tr>
            <td>Amount_Deposited</td>
            <td><input type='text' name='d_amount' value='' class='form-control' /></td>
            
        </tr>
         
                <tr><td>Bank_Name</td>
                <td><select name="d_bank_id" class='form-control'><option value='ALL'>ALL</option>
<?php
//$query=mysql_query("SELECT * FROM blocks ORDER BY Block_ID ASC")or die(mysql_error());
$sql4=mysql_query("SELECT * FROM banks ORDER BY b_name ASC")or die(mysql_error());
while($rw=mysql_fetch_array($sql4)){
echo "<option value='".$rw['b_id']."'>".$rw['b_name']."</option>";

}
echo "</select></td></tr>";
echo "<tr>";

//echo "<td><br/><input type='submit' name='send' value='Print'></td>
//";
?>

              <tr>
            <td></td>
            <td>
                <!--<button type="submit" class="btn btn-primary">Save</button>-->
                <input type="submit" value="Save" name="submit">
            </td>
        </tr>
 
    </table>
</form>

