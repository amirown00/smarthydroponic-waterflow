<?php 


include('db_connect.php');

$amount = $date = $fee = $item = $quantity ='';
$errors = array('amount' => '', 'date' => '','fee' =>'','item'=>'','quantity'=>'');

if(isset($_POST['submit'])){
	
// check nama
if(empty($_POST['amount'])){
	$errors['amount'] = 'Amount is required';
} else{
	$amount = $_POST['amount'];
	
}

// check date
if(empty($_POST['date'])){
	$errors['date'] = ' Date of buy is required';
} else{
	$date = $_POST['date'];

	
}	// check phone number
if(empty($_POST['fee'])){
	$errors['fee'] = 'Postage fee is required';
} else{
	$fee = $_POST['fee'];
	
}

	// check item
if(empty($_POST['item'])){
	$errors['item'] = 'Item amount is required';
} else{
	$item = $_POST['item'];
	
}

	// check quantity
if(empty($_POST['quantity'])){
	$errors['quantity'] = 'Quantity of purchase is required';
} else{
	$quantity = $_POST['quantity'];
	
}


	if(array_filter($errors)){
		//echo 'errors in form';
	} else {
		// escape sql chars
		$amount = mysqli_real_escape_string($conn, $_POST['amount']);
		$date = mysqli_real_escape_string($conn, $_POST['date']);
		$fee = mysqli_real_escape_string($conn, $_POST['fee']);
		$item = mysqli_real_escape_string($conn, $_POST['item']);
		$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

		// create sql
		$sql = "INSERT INTO itemm (amount,date,fee,item,quantity) VALUES('$amount','$date','$fee','$item','$quantity')";

		// save to db and check
		if(mysqli_query($conn, $sql)){
			// success
			header('location: customer.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}
		
	}

} // end POST check

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Signup - Login</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>

			<div class="login">
				<form>
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
