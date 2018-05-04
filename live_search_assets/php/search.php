<?php

	include "../config.php";  //Config include

	$conn_var = mysqli_connect($servername,$username,$password,$db_name); // Connect to Database

	$output = '';  

	//Query to get column_name from the table
	$col_name_query="SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='".$db_name."' AND `TABLE_NAME`='".$table_name."'";
	$col_name_query_result=$conn_var->query($col_name_query);
	$col_name_row_count = $col_name_query_result->num_rows;

	//check whether user types a search string and processing it
	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($conn_var, $_POST["query"]);
		$query="SELECT * FROM ".$table_name." WHERE ";
		$i=0;	
		if(count($search_columns)!=0)      //check whether user has entered value in the config.php for search columns and making the query
		{
			while($col_name_row = $col_name_query_result->fetch_assoc())
			{
				$i=$i+1;
				if(in_array($col_name_row['COLUMN_NAME'],$search_columns))
					$query .= $col_name_row['COLUMN_NAME']." LIKE '%".$search."%' OR ";
			}
			$query=substr($query, 0, -3);
		}
		else
		{
			while($col_name_row = $col_name_query_result->fetch_assoc())
			{
				$i=$i+1;
				$query .= $col_name_row['COLUMN_NAME']." LIKE '%".$search."%'";
				if($col_name_row_count!=$i)
					$query.=" OR ";
			}
		}
	}
	else
	{	
		$query = "SELECT * FROM ".$table_name;    //Initial display of all rows in the table
	}
	$user_query_result=$conn_var->query($query);
	$row_cnt = $user_query_result->num_rows;
	$j=0;
	$k=0;
	$col_name_query_result->data_seek(0);
	$op=array();
	
	//Displaying the output to the user
	
	if($row_cnt>0)  
	{
		//Change the following code if you want customized output display
		$output.="<table id='ls_table'><thead><tr>";
		if($use_sno==true)
			$output.="<th>S.No</th>";
		if(count($output_columns)!=0)
		{
			while($col_name_row = $col_name_query_result->fetch_assoc())
			{
				if(in_array($col_name_row['COLUMN_NAME'],$output_columns))
				{
					if(count($output_columns_name)!=0 && count($output_columns_name)==count($output_columns))
					{
						$output .= "<th>".$output_columns_name[$k]."</th>";
						$k=$k+1;
					}
					else
						$output .= "<th>".$col_name_row['COLUMN_NAME']."</th>";
					array_push($op,$col_name_row['COLUMN_NAME']);
				}
			}
			$output.="</thead><tbody>";
		}
		else
		{
			while($col_name_row = $col_name_query_result->fetch_assoc())
			{
				$output .= "<th>".$col_name_row['COLUMN_NAME']."</th>";
				array_push($op,$col_name_row['COLUMN_NAME']);
			}
			$output.="</thead><tbody>";
		}
		while($row = $user_query_result->fetch_assoc())
		{
			$j=$j+1;
			$output.="<tr>";
			if($use_sno==true)
				$output.="<td>".$j."</td>";
		
			foreach ($op as $value) 
				$output .="<td>".$row[$value]."</td>";
		}
		echo $output;
	}
	else
	{
		echo '<b>No Data Found</b>';
	}
?>
