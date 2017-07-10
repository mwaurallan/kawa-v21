



<?php

	class members{


	// database connection and table name
    private $conn;
    private $table_name = "members";

    // object properties
    public $m_no;
    public $m_name;
    public $m_idno;
    public $m_tel;
   	public $m_gender;
    
 	  public function __construct($db){
        $this->conn = $db;


	}

			//create members

		function create(){

				//write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    m_no=:m_no,m_name=:m_name,m_gender=:m_gender,m_idno=:m_idno,m_tel=:m_tel";
 
        $stmt = $this->conn->prepare($query);

         // posted valuesm
        
        $this->m_no=htmlspecialchars(strip_tags($this->m_no));
        $this->m_name=htmlspecialchars(strip_tags($this->m_name));
         $this->m_gender=htmlspecialchars(strip_tags($this->m_gender));
        $this->m_idno=htmlspecialchars(strip_tags($this->m_idno));
        $this->m_tel=htmlspecialchars(strip_tags($this->m_tel));

         // bind values 
        $stmt->bindParam(":m_no", $this->m_no);
        $stmt->bindParam(":m_name", $this->m_name);
         $stmt->bindParam(":m_gender", $this->m_gender);
        $stmt->bindParam(":m_idno", $this->m_idno);
        $stmt->bindParam(":m_tel", $this->m_tel);

         if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        
		}
	function readAll($from_record_num, $records_per_page){

    $query = "SELECT
                m_id,m_no,m_name,m_gender,m_idno,m_tel
            FROM
                " . $this->table_name . "
                ORDER BY
              
              m_no ASC  

                     LIMIT
                         {$from_record_num},{$records_per_page}";

                
            
           
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}
public function countAll(){
 
    $query = "SELECT m_id FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
}
public function countAll_BySearch($search_term){
 
    // select query
    $query = "SELECT
                COUNT(*) as total_rows
            FROM
                " . $this->table_name . "                
            WHERE
                m_name LIKE ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
 
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}
public function search($search_term, $from_record_num, $records_per_page){
	
 
    // select query
    $query = "SELECT
                m_id,m_no,m_name,m_gender,m_idno,m_tel
            FROM
                " . $this->table_name . " 
               
            WHERE
               m_name LIKE ? OR m_idno LIKE ?
            ORDER BY
                m_name ASC
            LIMIT
                ?, ?";
//:m_no", $this->m_no);
        //$stmt->bindParam(":m_name", $this->m_name);
        // $stmt->bindParam(":m_gender", $this->m_gender);
       // $stmt->bindParam(":m_idno", $this->m_idno);
       // $stmt->bindParam(":m_tel", $this->m_tel);



 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $search_term = "%{$search_term}%";
    $stmt->bindParam(1, $search_term);
    $stmt->bindParam(2, $search_term);
    $stmt->bindParam(3, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(4, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}
}







?>