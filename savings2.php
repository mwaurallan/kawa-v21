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

$insertdata=new DB_con();

$database=new database();
$db=$database->getConnection();
$fund=new fund($db);

$page_title="Savings";
include_once("header.php");

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Members</a>";
echo "</div>";



include_once("footer.php");

?>
<?php

//if(isset($_POST['submit']))
if(isset($_POST['submit']))
{
echo "data updated";
$s_mem_id=$_POST['s_mem_id'];
$s_date=$_POST['s_date'];
$s_amount=$_POST['s_amount'];
$s_contrib=$_POST['s_contrib'];
$s_balance=$_POST['s_balance'];
$s_overpay=$_POST['s_overpay'];
$s_t_id=$_POST['s_t_id'];
$s_fine=$_POST['s_fine'];


$amnt=700;
$s_arreas=0;
$arr=0;

//$sql=$insertdata->insert($s_mem_id,$s_date,$s_amount,$s_balance,$s_overpay,$s_t_id,$s_fine);

$fshares=700;
 //$fines=0;
 $s_balance=0;

//$sql7=mysql_query("SELECT * from savings WHERE s_mem_id='$s_mem_id'");
$sql7=mysql_query("SELECT s_balance FROM savings WHERE s_mem_id='$s_mem_id' ORDER BY s_id DESC");

if($sql7){

$rst2=mysql_fetch_assoc($sql7);

$cb=$rst2['s_balance'];
//echo $cb;
}else{

    echo "error in query".mysql_error();
}

 if($s_contrib == $fshares){

   $bald= $cb+$s_fine;
   $s_balance=$bald;
    $s_arreas=0;

 }else if($s_contrib < $fshares){


        $bald=$fshares-$s_contrib;

        $bald=$bald+($s_fine+$cb);

        $s_balance=$bald;
        $s_arreas=$fshares-$s_contrib;

 }else if($s_contrib > $fshares){

              $diff1=$s_contrib -$cb;
              $diff2=$fshares-$diff1;
           //$bald=$bald+($s_fine+$cb);

                 $s_balance=$diff2;

                  $s_arreas=$fshares-$s_contrib;

 }else{

    $s_balance=0;
 }




 

$sql=mysql_query("insert into savings(s_mem_id,s_date,s_amount,s_contrib,s_balance,s_overpay,s_t_id,s_fine,s_arreas) 
        values('$s_mem_id','$s_date','$s_amount',$s_contrib,'$s_balance','$s_overpay','$s_t_id','$s_fine','$s_arreas')");

if(!$sql){

      echo "error in query".mysql_error();
}

$sql5=mysql_query("SELECT * from t_fund ");

$row6=mysql_fetch_assoc($sql5);

    $fund=$row6['t_amount'];

    $fund2=$fund+$s_contrib;
    
    $sql7=mysql_query("UPDATE t_fund SET t_amount='$fund2' ");
    if($sql7){

       // echo "update success";
    }else{
       // mysql_error();
    }
    //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE i$amntfnd=2";

//$sql=$insertdata->insert($fname,$email,$contact,$gender,$education,$adrss);

if($sql)
{
 echo "<div class='alert alert-success'>Member was added succesfully.</div>";
}
else
{
echo "<div class='alert alert-danger'>Unable to add member</div>".mysql_error();


}
}
 ?>

<form  action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Mem_ID</td>
            <td><input type='text' name='s_mem_id' size='2' value="<?php echo $mem_id2; ?>"  readonly class='form-control' /></td>
        </tr>

        <tr>
            <td>Date</td>
            <td><input type='date' name='s_date' value='2015-10-10' class='form-control' /></td>


        </tr>
           <tr>
            <td>Amount</td>
            <td><input type='text' name='s_amount' value='700'  readonly class='form-control' /></td>
            <td></td>
            
        </tr>
 	
        <tr>
            <td>Contribution</td>

            <td><input type='text' name='s_contrib' value='0' class='form-control' /></td>
            
        </tr>

        
       
      
        <tr>

                    <td>Fines</td>
            <td><input type='text' name='s_fine' value='' class='form-control' /></td>
        </tr>
        </tr>
            <tr>
            <tr>

                    <td>Trust_Fund</td>
            
            <td><select name="s_t_id" class='form-control'><option value='ALL'>ALL</option>

            <?php


            $sql4 = mysql_query("SELECT * FROM t_fund ORDER BY t_name ASC")or die(mysql_error());
                if($sql4){


            while($rw=mysql_fetch_array($sql4)){

            echo "<option value='".$rw['t_id']."'>".$rw['t_name']."</option>";

                }
        echo "</select></td></tr>";

                }else{

                    echo mysql_error();
                }
            ?>
     
        </tr>
            <tr>
            
            <td><input type='hidden' name='s_balance' value='0' class='form-control' /></td>
            
        </tr>
         <tr>
      
            <td><input type='hidden' name='s_overpay' value='0' class='form-control' /></td>
            
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


