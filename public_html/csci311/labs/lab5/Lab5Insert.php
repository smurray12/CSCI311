<?php
/*
 * @Author: Sarah Murray
 * @Csci id: murraysa
 * @Date:   2020-03-03 16:23:46
 * @Last Modified by:   sarah
 * @Last Modified time: 2020-03-07 16:55:44
 */
	require('dbinfo.inc');
	require('front.php');
	$title = "Insert Into the Autos Table";
	require('nav.php');
?>

<?php 
	
	$name = $make = $model = $price = $desc = $status = "";
	$date = date("Y-m-d");
	$error = array("name" => "", "make" => "", "model" => "", "price" => "");

	/**** Form Validation ****/
	if(isset($_POST["Submit"])) {
		
		if(empty($_POST["name"])) {
			$error["name"] = "A vehicle name is required. <br />";
		} else {
			$name = strip_tags($_POST["name"]);
			if(!preg_match('/^[a-zA-Z0-9\s]{1,30}$/', $name)) {
				$error["name"] = "Please enter a valid name. Maximum 30 characters.";
			} 
		}

		if(empty($_POST["make"])) {
			$error["make"] = "A vehicle make is required. <br />";
		} else {
			$make = $_POST["make"];
			if(!preg_match('/^[a-zA-Z\s]{1,20}$/', $make)) {
				$error["make"] = "Please enter a valid vehicle make. Maximum 20 characters.";
			} 	
		}

		if(empty($_POST["model"])) {
			$error["model"] = "A vehicle model is required. <br />";
		} else {
			$model = $_POST["model"];
			if(!preg_match('/^[a-zA-Z0-9\s-]{1,20}/', $model)) {
				$error["model"] = "Please enter a valid vehicle make. Maximum 20 characters.";
			}	
		}

		$desc = $_POST["desc"];

		if($_POST["desc"]) {
			$desc = $_POST["desc"];
			$desc = strip_tags($desc);
		}

		if(empty($_POST["price"])) {
			$error["price"] = "A vehicle price is required. <br />";
		} else {
			$price = trim($_POST["price"]);
			if(!preg_match('/^\d{0,7}(\.\d{1,2})?$/', $price)) {
				$error["price"] = "Please enter a valid number. E.g. 10000.00";
			} 
		}
	
    /*** Submit to db ***/
	if (array_filter($error)) {
		$status = "Could not submit form. Please fix errors.";
	} else {
		try {
			$dbh = new PDO("mysql:host=$host; dbname=$database", $user, $password);
			
			$sql = "INSERT INTO Autos (auto_name, date_added, make, model, description, price) VALUES ('$name', '$date', '$make', '$model', '$desc', '$price')";
			$stmt = $dbh->prepare($sql);
			$stmt->execute([':auto_name' => $name, ':date_added' => $date, ':make' => $make, ':model' => $model, ':description' => $desc]);

			$name = "";
			$make = "";
			$model = "";
			$description = "";
			$price = "";
			$dbh = null;
			$status = "Success! The form has been submitted.";
		} catch(PDOException $e) {
			print "Error!" . $e->getMessage()."<br/>";
			
		}
	}
}		

?>

<form method="POST">
	<div class="inputRow">
		<label class="myLabel" for="name"> Name: </label>
		<input class="myInput" type="text" name="name" id="name" required placeholder="Enter vehicle name" value="<?php echo $name ?>">
	</div>

	<div class="text-danger"> <?php echo $error["name"]; ?> </div>

	<div class="inputRow">
		<label class="myLabel" for="make"> Make: </label>
		<input class="myInput" type="text" name="make" id="make" required placeholder="Enter vehicle make" value="<?php echo $make ?>">
	</div>

	<div class="text-danger"> <?php echo $error["make"]; ?> </div>

	<div class="inputRow">
		<label class="myLabel" for="model"> Model: </label>
		<input class="myInput" type="text" name="model" id="model" required placeholder="Enter vehicle model" value="<?php echo $model ?>">
	</div>

	<div class="text-danger"> <?php echo $error["model"]; ?> </div>

	<div class="inputRow">
		<label class="myLabel" for="desc"> Description: </label>
		<input class="myInput" type="text" name="desc" id="desc" placeholder=" Enter vehicle description (optional)" value="<?php echo $desc ?>">
	</div>

	<div class="inputRow">
		<label class="myLabel" for="price"> Price: </label>
		<input class="myInput" type="number" name="price" id="price" required min=0 max=9999999 step=0.01 placeholder="Enter vehicle price" value="<?php echo $price ?>">
	</div>

	<div class="text-danger"> <?php echo $error["price"]; ?> </div>

	<div class="inputRow">
		<input type="submit" name="Submit" value="Submit">
	</div>

	<div class="formStatus"> <?php echo $status; ?></div>
</form>

<?php
	require('back.php');
?>