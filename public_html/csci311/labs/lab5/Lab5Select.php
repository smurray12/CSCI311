<?php
/*
 * @Author: Sarah Murray
 * @Csci id: murraysa
 * @Date:   2020-03-03 16:23:46
 * @Last Modified by:   sarah
 * @Last Modified time: 2020-03-07 17:38:29
 */
	require('dbinfo.inc');
	require('front.php');
	$title = "Select Auto";
	$page = "Select";
	require('nav.php');

?>
	<h2> Using PHP to access MySQL database</h2>
	
	<table class="table table-striped table-bordered table-dark table-hover">
		<thead>
		<tr>
			<th scope="col">Name</th>
			<th scope="col">Price</th>
			<th scope="col">Model</th>
			<th scope="col">Make</th>
			<th scope="col">Description</th>
		</tr>
		</thead>
		
		<tbody>
			<tr>

<?php

	try {
		$dbh = new PDO("mysql:host=$host; dbname=$database", $user, $password);
		$result = $dbh->query('SELECT * FROM Autos');
	
		foreach($result as $row) {
			$nameVal = $row['auto_name'];
			$price = $row['price'];
			$modelVal = $row['model'];
			$makeVal = $row['make'];
			$desc = $row['description'];
			
			echo "<td>" .$nameVal. "</td><td>" .$price. "</td><td>" .$modelVal. "</td><td>" .$makeVal. "</td><td>" .$desc. "</td></tr>" ;
		}

		$dbh = null;
	} catch(PDOException $e) {
		print "Error!" . $e->getMessage()."<br/>";
	}
?>
		</tbody>
		</table>

<?php
	require('back.php');
?>



