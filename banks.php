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



$page_title="Banks";
include_once("header.php");





include_once("footer.php");

?>
<?php

//if(isset($_POST['submit']))
if(isset($_POST['submit']))
{
//echo "data updated";
$b_name=trim($_POST['b_name']);
$b_acno=trim($_POST['b_acno']);

//$s_t_id=$_POST['s_t_id'];

$sql=mysql_query("insert into  banks(b_name,b_acno) 
        values('$b_name','$b_acno')");

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
            <td>Bank Name</td>
            <td><input type='text' name='b_name' size='2' value='' class='form-control' /></td>
        </tr>

        <tr>
            <td>Bank_A/C</td>
            <td><input type='text' name='b_acno' value='' class='form-control' /></td>
            
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

