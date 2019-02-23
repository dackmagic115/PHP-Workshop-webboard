<?php include 'template/header.php';?>
<?php if($_SESSION['user_username']){
			header('location: home.php');
			exit();
} ?>
<?php 
		$action = $_GET["action"];

			if($action){
				if($action === 'login'){
						$uname = $_POST['uname'];
						$pwd = $_POST['pwd'];
						$haspass = hash('SHA256',$pwd);
						$sql = "SELECT * FROM table_member WHERE member_username= :uname AND member_password = :pwd ";
						$query = $conn->prepare($sql);
						$query->execute(Array(':uname'=>$uname,':pwd'=>$haspass));
						$result = $query->fetch();
						if($result){
							echo 'pass';
							print_r($result);
							$_SESSION['user_id'] = $result['member_id'] ;
							$_SESSION['user_username'] = $result['member_username'] ;
							echo '<script>window.location="home.php"</script>';
						}else{
							echo 'fail';
						}
						exit();
				}
			}



?>
	<div class="container">
		<div style="width: 300px;margin: 0 auto;" align="center">
		<h1>Login page</h1>
		<form action="login.php?action=login" method="POST">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="uname" id="username" class="form-control">
			</div>
				<div class="form-group">
				<label for="password">password</label>
				<input type="text" name="pwd" id="password" class="form-control">
			</div>
		
				<button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
		
		</form>
		</div>
	</div>

<?php include 'template/footer.php'?>