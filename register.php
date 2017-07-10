<?php



$mem_id2=$_GET['id'];
//echo  $mem_id2; 

//echo $mem_id2=$_GET['id'];

//} else{

	//die('ERROR: missing ID.');
//}
include_once("objects/functions.php");
include_once("objects/fund.php");
include_once("config/database.php");
include_once("config/connect.php");



$page_title="Regitration Fees";
include_once("header.php");





include_once("footer.php");

?>
<?php

//if(isset($_POST['submit']))
if(isset($_POST['submit']))
{
//echo "data updated";
$r_m_id=trim($_POST['r_m_id']);
$r_date=trim($_POST['r_date']);
$r_amount=trim($_POST['r_amount']);
//$s_t_id=$_POST['s_t_id'];

$sql=mysql_query("insert into  register(r_date,r_m_id,r_amount) 
        values('$r_date','$r_m_id','$r_amount')");

$sql5=mysql_query("SELECT * from t_fund ");

$row6=mysql_fetch_assoc($sql5);

    $fund=$row6['t_amount'];

    $fund2=$fund+$r_amount;
    
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
            <td>Mem_ID</td>
            <td><input type='text' name='r_m_id'  value="<?php echo  $mem_id2; ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type='date' name='r_date'  value='' class='form-control' /></td>
        </tr>

        <tr>
            <td>Amount_Deposited</td>
            <td><input type='text' name='r_amount' value='' class='form-control' /></td>
            
        </tr>
         
              

              <tr>
            <td></td>
            <td>
                <!--<button type="submit" class="btn btn-primary">Save</button>-->
                <input type="submit" value="Save" name="submit">
            </td>
        </tr>
 
    </table>
</form>

