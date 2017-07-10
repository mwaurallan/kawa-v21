<?php

        class savings{

                // database connection and table name
    private $conn;
    private $table_name = "savings";

    // object properties

    public $s_id;
    public $s_mem_id;
    public $s_date;
    public $s_amount;
    public $s_balance;
    public $s_overpay;
    public $s_t_id;
    
      public function __construct($db){
        $this->conn = $db;



        }

function readOne(){


         $query = "SELECT
                    s_mem_id    
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->s_mem_id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->s_mem_id = $row['s_mem_id'];
 
    }

}


?>

