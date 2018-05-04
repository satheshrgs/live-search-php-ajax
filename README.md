# live-search-php-ajax
Contains simple search form which searches and displays the rows from the database.

Written in simple PHP and ajax suitable for smaller applications
# How to use?
* Copy the following line to the page you are working on


`<input type="text" id="ls_search_text" placeholder="Type any keyword to search"/>`
* Copy the folder `live_search_assets` to your project folder.
* Include the following lines in the page where you want the search bar


`<script src="live_search_assets/js/ls.js"></script>`


`<link href="live_search_assets/css/ls.css" rel="stylesheet" />`
* Edit the `config.php` file in the live-search-assets folder according to your needs.
## config.php usage
<table width='100%'>
<thead>
<tr>
<th>Name</th>
<th>Type</th>
<th>Required</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>servername</td>
<td>String</td>
<td>Yes</td>
<td>Database host. Ex.localhost.</td>
</tr>
<tr>
<td>username</td>
<td>String</td>
<td>Yes</td>
<td>MySQL database username.</td>
</tr>
<tr>
<td>password</td>
<td>String</td>
<td>Yes</td>
<td>MySQL database password.</td>
</tr>
<tr>
<td>db_name</td>
<td>String</td>
<td>Yes</td>
<td>MySQL database name.</td>
</tr>
<tr>
<td>table_name</td>
<td>String</td>
<td>Yes</td>
<td>MySQL database tablename.</td>
</tr>
<tr>
<td>search_columns</td>
<td>array</td>
<td>optional</td>
<td>Enter the name of the columns to be searched (or) Leave as it is for searching all columns.Separate columns by comma's enclosed within quotes Ex.==> $search_columns=array('eid','ename')</td>
</tr>
<tr>
<td>output_columns</td>
<td>array</td>
<td>optional</td>
<td>Enter the name of the columns to be displayed (or) Leave as it is for displaying all columns.Separate columns by comma's enclosed within quotes Ex.==> $output_columns=array('eid','ename') </td>
</tr>
<tr>
<td>output_columns_name</td>
<td>array</td>
<td>optional</td>
<td>Name of the output columns Ex.==>$output_columns_name=array('Employee ID','Employee Name'); or leave it empty for using the db columns name</td>
</tr>
<tr>
<td>use_sno</td>
<td>Boolean</td>
<td>Yes</td>
<td>Displays the serial number. Make it to false if you dont need serial numbers </td>
</tr>
</tbody>
</table>


## Browser Support
* IE 8+ 
* Chrome
* Firefox 
* Opera 
* Safari

## License

[MIT License](https://github.com/satheshrgs/live-search-php-ajax/blob/master/LICENSE)
