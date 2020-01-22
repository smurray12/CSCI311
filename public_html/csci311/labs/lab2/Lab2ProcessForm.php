<?php
	//variables to hold values from form
	$userName;
	$valueA;
	$valueB;
	$answer;
	$colour;
	$errorVal;
	
	if(isset($_POST)){
		$userName = $_POST['aName'];
		$valueA=$_POST['numberA'];
		$valueB=$_POST['numberB'];
		$colour=$_POST['colour'];
		
		if(trim($userName) === '' || trim($valueA)==='' || trim($valueB)==='' 
		|| trim($colour)===''){
			
			$errorVal = "Sorry, all values must be filled in";	
		}else{
			if($valueA > $valueB){
				$answer = "First value is bigger";
			}else if($valueB > $valueA){
				$answer = "Second value is bigger";
			}else{
				$answer = "Impossible!!";
			}
		}
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head> 
<meta charset="utf-8"/>
<title>Lab 2: Doing Stuff with Forms!</title> 
</head>
<body  <?php echo "style='background-color:$colour'";?> >
	<?php
		if(isset($error)){
			echo "<p>".$error."</p>\n";

			echo "<a href='Lab2Form.html'>Back</a>\n";
		}else{
	?>
	<h1>Hi <?php echo $userName;?>! Math is fun!</h1>
	<p style="font-size:Large;text-align:center">Here is the result of 
	some very very hard math!</p>
	<p> <?php echo $answer ?></p>
	<p> First Value: <?php echo $valueA ?></p>
	<p> Second Value: <?php echo $valueB ?></p>
		<a href="./Lab2Form.html"><- Back</a>
	<?php
		}
	?>
</body></html>