<?php

/**
 * @Author: sarah
 * @Date:   2020-03-03 16:23:45
 * @Last Modified by:   sarah
 * @Last Modified time: 2020-03-04 20:28:17
 */
	require('dbinfo.inc');
	require('front.php');
	$title = "Insert Into the Autos Table";
	require('nav.php');
?>

<?php 
	
	session_start();
	$error;
	if(isset($_POST["Submit"])) {
		
		if(empty($_POST["name"])) {
			echo "A name is required. <br />";
		} else {
			$name = $_POST["name"];
			if(!preg_match('/[a-zA-Z0-9\s]+$/', $name)) {
				$error = "Cannot contain special characters.";
			}
		}

		if(empty($_POST["make"])) {
			echo "A vehicle make is required. <br />";
		} else {
			$make = $_POST["make"];
			if(!preg_match('/[a-zA-Z0-9\s]+$/', $make)) {
				echo "Cannot contain special characters.";
			}
		}

		if(empty($_POST["model"])) {
			echo "A vehicle model is required. <br />";
		} else {
			$model = $_POST["model"];
			if(!preg_match('/[a-zA-Z0-9\s]+$/', $model)) {
				echo "Cannot contain special characters.";
			}}
	}
?>

<form method="POST">
			<div class="inputRow">
				<label class="myLabel" for="name"> Name: </label>
				<input class="myInput" type="text" name="name" id="name">
			</div>

			<div class="inputRow">
				<label class="myLabel" for="make"> Make: </label>
				<input class="myInput" type="text" name="make" id="make">
			</div>

			<div class="inputRow">
				<label class="myLabel" for="model"> Model: </label>
				<input class="myInput" type="text" name="model" id="model">
			</div>

			<div class="inputRow">
				<label class="myLabel" for="desc"> Description: </label>
				<input class="myInput" type="text" name="desc" id="desc" placeholder=" optional">
			</div>

			<div class="inputRow">
				<label class="myLabel" for="price"> Price: </label>
				<input class="myInput" type="number" name="price" id="price" placeholder=" optional">
			</div>

			<div class="inputRow">
				<input type="submit" name="Submit" value="Submit">
			</div>
</form>



<?php
	require('back.php');
?>