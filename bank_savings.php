<?php

include_once("objects/functions.php");
include_once("objects/fund.php");
include_once("config/database.php");
include_once("config/connect.php");


$insertdata=new DB_con();

$database=new database();
$db=$database->getConnection();
$fund=new fund($db);

include_once("header.php");

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Members</a>";
echo "</div>";

include_once("footer.php");

$sql5=mysql_query("SELECT * from t_fund ");

$row6=mysql_fetch_assoc($sql5);

$chama_fund=$row6['t_amount'];
?>
<?php
if(isset($_POST['submit']))
{
  // keep track validation errors
  $bank_nameError = null;
  $account_numberError = null;
  $amount_savedError = null;
  $date_savedError = null;
  $chama_fund = null;

// keep track post values
  $bank_name = $_POST['bank_name'];
  $account_number = $_POST['account_number'];
  $amount_saved = $_POST['amount_saved'];
  $date_saved = $_POST['date_saved'];

// insert into DB
  $sql=mysql_query("insert into save_banking(bank_name,account_number,amount_saved,date_saved) 
    values('$bank_name','$account_number','$amount_saved','$date_saved')");

  $sql5=mysql_query("SELECT * from t_fund ");

  $row6=mysql_fetch_assoc($sql5);

  $chama_fund=$row6['t_amount'];

  $display_fund=$row6['t_amount'];

  $fund2=$chama_fund-$amount_saved;
    
  $sql7=mysql_query("UPDATE t_fund SET t_amount='$fund2' ");
    if($sql7){

      echo "update success";
    }else{
      mysql_error();
    }

  // validate input
    $valid = true;
    if (empty($bank_name)) {
      $bank_nameError = 'Please enter Bank Name';
      $valid = false;
    }

    $valid = true;
    if (empty($account_number)) {
      $account_numberError = 'Please enter account number';
      $valid = false;
    }


    if (empty($amount_saved)) {
      $amount_savedError = 'Please enter amount to be saved';
      $valid = false;
    } else if ( $amount_saved < 0)  {
      $amount_savedError = 'Amount saved should be more than 0';
      $valid = false;
    }

    if (empty($date_saved)) {
      $date_savedError = 'Please enter date_saved';
      $valid = false;
    }

header("Location: bank_savings.php");
}
?>

<h3>Available Funds:<?php if ( isset( $chama_fund ) ) {  echo $chama_fund; } ?></h3>
<form  action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Bank Name</td>
            <td>
            <input type='text' name='bank_name' size='2' value='' class='form-control'></td>
        </tr>

        <tr>
            <td>Account Number</td>
            <td>
            <input type='text' name='account_number' value="" class='form-control'>
            </td>


        </tr>
           <tr>
            <td>Date Saved</td>
            <td>
            <input type='Date' name='date_saved' value="" class='form-control'></td> 
        </tr>
  
        <tr>
            <td>Amount Saved</td>

            <td>
            <input type='text' name='amount_saved' value='' class='form-control'>
            </td>
            
        </tr>
        <tr>
            <td>
                <!--<button type="submit" class="btn btn-primary">Save</button>-->
                <input type="submit" value="Save" name="submit">
            </td>
        </tr>
 
    </table>
</form>
