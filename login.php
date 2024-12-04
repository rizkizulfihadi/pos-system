<?php
@ob_start();
session_start();
if (isset($_POST['proses'])) {
	require 'config.php';

	$user = strip_tags($_POST['user']);
	$pass = strip_tags($_POST['pass']);

	$sql = 'select member.*, login.user, login.pass
				from member inner join login on member.id_member = login.id_member
				where user =? and pass = md5(?)';

	$row = $config->prepare($sql);
	$row->execute(array($user, $pass));
	$jum = $row->rowCount();
	if ($jum > 0) {
		$hasil = $row->fetch();
		$_SESSION['admin'] = $hasil;
		echo '<script>alert("Login Sukses");window.location="index.php"</script>';
	} else {
		echo '<script>alert("Login Gagal");history.go(-1);</script>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login | KIMC</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="stisla-admin/modules/bootstrap/css/bootstrap.min.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="stisla-admin/css/style.min.css">

</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand">
							<img src="assets/img/logo-koperasi.png" alt="logo" width="100" class=" rounded-circle mb-3">
							<div>KOPERASI INDONESIA MIGRAN CENTER</div>
						</div>

						<div class="card card-primary">
							<div class="card-header">
								<h4>Login</h4>
							</div>

							<div class="card-body">
								<form method="POST" action="" class="needs-validation" novalidate="">
									<div class="form-group">
										<label for="username">Username</label>
										<input id="username" type="text" class="form-control" name="user" tabindex="1" required autofocus>
										<div class="invalid-feedback">
											Please fill in your Username
										</div>
									</div>

									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label">Password</label>
										</div>
										<input id="password" type="password" class="form-control" name="pass" tabindex="2" required>
									</div>

									<div class="form-group">
										<button type="submit" name="proses" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Login
										</button>
									</div>
								</form>
							</div>
						</div>

						<div class="simple-footer">
							Copyright &copy; Koperasi indonesia Migran Center 2024
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

</body>

</html>