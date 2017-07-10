


<?php


include_once 'config/database.php';
include_once 'objects/members.php';

$database=new database();
$db=$database->getConnection();


$members=new members($db);


$page_title="Register Members";
include_once("header.php");

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Members</a>";
echo "</div>";



include_once("footer.php");

?>
<?php
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
 
    // set product property values
    $members->m_no = $_POST['m_no'];
    $members->m_name = $_POST['m_name'];
    $members->m_gender = $_POST['m_gender'];
    $members->m_idno = $_POST['m_idno'];
    $members->m_tel = $_POST['m_tel'];
    
    // create the product
    if($members->create()){
        echo "<div class='alert alert-success'>Member was added succesfully.</div>";
        // try to upload the submitted file
// uploadPhoto() method will return an error message, if any.
    }
    // if unable to create the product, tell the user
    else{
       echo "<div class='alert alert-danger'>Unable to add member.</div>";
    }
}




?>

<!-- HTML form for creating a product -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
	
		<table class='table table-hover table-responsive table-bordered'>

				<tr>
					<td>Mem_No</td>
					<td><input type='text' name='m_no' class='form-control' /></td>
				</tr>
		<tr>
            <td>Name</td>
            <td><input type='text' name='m_name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Gender</td>


            <!--<td><input type='text' name='m_gender' class='form-control' />-->
            	<td>
            	 <select class='form-control' name='m_gender'>
            	<option>Select category...</option>
            	<option value='MALE'>MALE</option>
            	<option value='FEMALE'>FEMALE</option>
            	</select>
            </td>
        </tr>
        <tr>
            <td>Id_Number</td>
             <td><input type='text' name='m_idno' class='form-control' /></td>
        </tr>
        	 <tr>
            <td>Tel</td>
             <td><input type='text' name='m_tel' class='form-control' /></td>
        </tr>


        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>

    </table>
</form>


</table>

