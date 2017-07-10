<?php
// search form
echo "<form role='search' action='search.php'>";
    echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
        $search_value=isset($search_term) ? "value='{$search_term}'" : "";
echo "<input type='text' class='form-control' placeholder='Type name  or Id number...' name='s' id='srch-term' />";
        echo "<div class='input-group-btn'>";
            echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
        echo "</div>";
    echo "</div>";
echo "</form>";
?>
<div class="row" style="margin-top:20px">
 <?php 
// create product button

?>
</div>
<div style="margin-top:20px">
<?php
// display the products if there are any
if($total_rows>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>No</th>";
            echo "<th>Name</th>";
            echo "<th>Gender</th>";
            echo "<th>ID_NO</th>";
            echo "<th>Tel</th>";
            echo "<th>Actions</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td>{$m_id}</td>";
                echo "<td>{$m_no}</td>";
                echo "<td>{$m_name}</td>";
                echo "<td>{$m_gender}</td>";
                echo "<td>{$m_idno}</td>";
                echo "<td>{$m_tel}</td>";
               
               
                echo "<td>";
 
                    // read product button
                    echo "<a href='read_one.php?id={$m_id}' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-list'></span> Saved";
                    echo "</a>";
 
                    // edit product button
                    echo "<a href='savings2.php?id={$m_id}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Savings";
                    echo "</a>";

                    echo "<a href='register.php?id={$m_id}'  class='btn btn-default -object'>";
                        echo "<span class='glyphicon glyphicon-list'></span>Register";
                    echo "</a>";
 
                    // delete product button
                    echo "<a delete-id='{$m_id}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
                    echo "</a>";
 
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
 
    // paging buttons
    include_once 'paging.php';
}

 
// tell the user there are no products
else{
    echo "<div class='alert alert-danger'>No Registered Members.</div>";
}
?>   

</div>
