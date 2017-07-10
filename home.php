<?php
include_once 'config/core.php';
// core.php holds pagination variables
include_once 'config/database.php';
include_once 'objects/members.php';

$database=new database();
$db=$database->getConnection();


$members=new members($db);
 
$page_title = "Kawa Members";
include_once "header.php";
 
// query products
$stmt = $members->readAll($from_record_num, $records_per_page);
 
// specify the page where paging is used
$page_url = "index.php?";
 
// count total rows - used for pagination
$total_rows=$members->countAll();
 
// read_template.php controls how the product list will be rendered
include_once "mem_template.php";
 
// footer.php holds our javascript and closing html tags
include_once "footer.php";






?>