<?php
//session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'kawa');

class DB_con
{
	function __construct()
	{
		$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
		mysql_select_db(DB_NAME, $conn);
	}
	public function insert($s_mem_id,$s_date,$s_amount,$s_balance,$s_overpay,$s_t_id,$s_fine)
	{
	$ret=mysql_query("insert into savings(s_mem_id,s_date,s_amount,s_balance,s_overpay,s_t_id,s_fine) 
		values('$s_mem_id','$s_date','$s_amount','$s_balance','$s_overpay','$s_t_id','$s_fine')");
	return $ret;
	}
	public function select(){

		$ret2=mysql_query("SELECT * FROM members ORDER BY m_name ASC");
		return $ret2;
	}

	public function selects()
	{

		$svg2=mysql_query('SELECT m_no,m_name,s_date,s_amount FROM members M1
				INNER JOIN SAVINGS S2 ON M1.m_id = S2.S_mem_id where m_name="$name2" ');
		return $svg2;
	}

	public function countm(){

		$count2=mysql_query('SELECT COUNT(*) as total FROM members');

		return $count2;

	}
	public function mem_list(){

		$meml=mysql_query("SELECT * FROM members ORDER BY m_name ASC")or die(mysql_error());

		return $meml;

	}

}
?>