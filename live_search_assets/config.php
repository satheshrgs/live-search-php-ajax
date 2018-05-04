<?php

$servername="SERVER_NAME";       //servername
$username="USER_NAME";	           //username
$password="PASSWORD";				   //password
$db_name="DATABASE_NAME";             //database name
$table_name="TABLE_NAME"; //table name

//Enter the name of the columns to be searched (or) Leave as it is for searching all columns
//Separate columns by comma's enclosed within quotes Ex.==> $search_columns=array('eid','ename'); 
$search_columns=array(); 

//Enter the name of the columns to be displayed (or) Leave as it is for displaying all columns
//Separate columns by comma's enclosed within quotes Ex.==> $output_columns=array('eid','ename'); 
$output_columns=array();

$output_columns_name=array();  //Name of the output columns Ex.==>$output_columns_name=array('Employee ID','Employee Name'); or leave it empty for using the db columns name

$use_sno=true; //Displays the serial number. Make it to false if you dont need serial numbers 



?>