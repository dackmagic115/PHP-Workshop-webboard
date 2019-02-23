<?php include 'template/header.php';?>
<?php if($_SESSION['user_username']){
			header('location: home.php');
			exit();
} ?>

<?php 
	
		$action = $_GET["action"];

			if($action){
				if($action === 'register'){
					    $pass = $_POST['pass'];					
					    $gender = $_POST['gender'];
					  	$haspass = hash('SHA256',$pass);
					  	$sql = "INSERT INTO `table_member` 
					  	(member_username,member_password,member_role,member_name,member_lastname,member_email,member_gender) VALUES 
					  		(:uname, '$haspass','0', :fname,:lname,:email,'$gender')";
					  	$result = $conn->prepare($sql);
					  		$uname = $_POST["uname"];
					  		$fname =$_POST['fname'];
					   		$lname = $_POST['lname'];
					        $email = $_POST['email'];
					  	$result->execute(Array(':uname'=>$uname,':fname'=>$fname,':lname'=>$lname,':email'=>$email));
					  	if($result){
							        echo '<script>alert("ลงทะเบียนเรียบร้อย");</script>';
							        echo '<script>window.location="login.php";</script>';
					  	}else{
					  			    echo '<script>alert("ลงทะเบียนเรียบร้อย");</script>';
							        echo '<script>window.history.back()";</script>';
					  	}	

					  	
				}
			}
			
			 
?>
<div " class=" container">
	<h1>สมัครสมาชิก</h1>
    <form action="register.php?action=register" method="post"><br>
        <input type="text" name="uname" class="form-control" placeholder="Enter Username"><br>
        <input type="password" name="pass" class="form-control" placeholder="Enter password"><br>
        <input type="text" name="fname" class="form-control" placeholder="Enter firstname "><br>
        <input type="text" name="lname" class="form-control" placeholder="Enter lastname "><br>
        <input type="email" name="email" class="form-control" placeholder="Enter email "><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="gender" id="m" value="m" >
            <label class="custom-control-label" for="m">
                Male
            </label>
        </div>
           <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="gender" id="f" value="f" >
            <label class="custom-control-label" for="f">
                female
            </label>
        </div><br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 
</div>
<?php include 'template/footer.php'?>