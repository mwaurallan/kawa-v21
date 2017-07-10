
<?php



// get ID of the member to be edited

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

echo $id;
$mem_id=$id;

include_once 'config/database.php';
include_once 'objects/fund.php';
include_once 'objects/savings.php';

$database=new database();
$db=$database->getConnection();


$savings=new savings($db);
$fund=new fund($db);
// read the details of product to be edited
$savings->readOne();

$page_title="Members Savings";
include_once("header.php");

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Members</a>";
echo "</div>";

include_once("footer.php");

?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$s_mem_id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Mem_ID</td>
            <td><input type='text' name='s_mem_id' size='2' value='<?php echo $mem_id; ?>' readonly  class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Date</td>
            <td><input type='date' name='s_date' value='' class='form-control' /></td>
        </tr>
           <tr>
            <td>Amount</td>
            <td><input type='text' name='s_amount' value='' class='form-control' /></td>
            <td>Balance</td>
            <td><input type='text' name='s_balance' value='' class='form-control' /></td>
        </tr>
 		
    	 <tr>
            <td>Overpay</td>
            <td><input type='text' name='s_overpay' value='' class='form-control' /></td>
        </tr>
        s_t_id
        <tr>
            <td>Trust_Fund</td>
            <td>
                <!-- categories select drop-down will be here -->
    			<?php


            	//echo 'Categories are here';
            	// read the product categories from the database
				$stmt =$fund->read();
 
				// put them in a select drop-down
				echo "<select class='form-control' name='s_t_id'>";
   				 echo "<option>Select Fund...</option>";
 
   				 while ($row_fund = $stmt->fetch(PDO::FETCH_ASSO){
      				  extract($row_fund);
       			 echo "<option value='{$t_id}'>{$t_name}</option>";
    			}
 
				echo "</select>";

            ?>

            </td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Save</button>
            </td>
        </tr>
 
    </table>
</form>