<?php
include('../proses.php');

$db = new Connect_db();
if (isset($_POST["signup"])) {
	$username = $_POST["username"];
	$no_wa = $_POST["no_wa"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$db->signUp($username,$no_wa,$email,$password);
}
if (isset($_POST["signin"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$db->signIn($username, $password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/login.css">
    <title>Halaman Login</title>
</head>
<body>
<h2>Halaman Login</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="post">
			<h1>Buat Akun</h1>
			<input type="text" placeholder="Username" name="username" autocomplete="off" required/>
			<input type="text" placeholder="No Whatsapp" name="no_wa" autocomplete="off"required />
			<input type="email" placeholder="Email" name="email" autocomplete="off" required/>
			<input type="password" placeholder="Password" name="password" autocomplete="off" required/>
			<button type="submit" name="signup">Daftar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>Sign in</h1>
			
			<input type="username" placeholder="Username" name="username" autocomplete="off" required/>
			<input type="password" placeholder="Password" name="password" autocomplete="off" required/>
			
			<button type="submit" name="signin">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>punya akun ?</h1>
				<p></p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Selamat Datang</h1>
				<p>Untuk bisa dapatkan tiket, silahkan daftar terlebih dahulu</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


<script src="../js/login.js"></script>    
</body>
</html>