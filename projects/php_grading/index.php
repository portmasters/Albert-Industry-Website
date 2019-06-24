<?php 		
		ob_start();
		session_start();
		include "validation/serverTest.php";
		
		$user="";
		$password="";
		if (isset($_SESSION["username"])){
			header("Location:website_pages/courseDashBoard.php");
			exit();
		}

		//Login Feature
		if(isset($_POST['submit']))
		{
			$anyError = false;
			if(!$anyError)
			{
				$user = $_POST['username'];
				$password = $_POST["password"];
					
				$sql = "SELECT username,password,id,admin FROM student_account where username='$user'";
				$res=$conn->query($sql);
				$row = $res->fetch_assoc();
				$count = $res->num_rows;
				
				if($count==1&&$row['password']==$password)
				{
					$selectedID=$row['id'];
					$admin = $row['admin'];
					$_SESSION['username']= $user;
					$_SESSION['password']= $password;
					$_SESSION['student_id']= $selectedID;	
					$_SESSION['admin']=$admin;
					header("Location:website_pages/courseDashBoard.php");	
					exit();
				}
				else
				{
				header("Location:index.php");
				}		
			}
		}
		/*
			$anyError = false;
			if(!$anyError)
			{
				$user = $_POST['username'];
				$password = $_POST["password"];
				
				$sql = "SELECT username,password,id FROM student_account where username=?";
				
				$res=$conn->prepare($sql);
				$res->bind_param("s",$user);
				$res->execute();
				
				
				if($res->execute())
				{
					$res->bind_result($uUser,$pUser,$sUser);
					if($pUser==$password)
					{
						$_SESSION['username']= $user;
						$_SESSION['password']= $password;
						$_SESSION['student_id']= $selectedID;						
						header("Location: courseDashBoard.php");	
						exit();
					}
					else
						header("Location: realIndex.php");
				}
				else
				header("Location: realIndex.php");
				
			}*/
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>StudentGo</title>
	<meta charset="utf-8">
	<meta name="description" content="School project made in 2017">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="stylesheet/templateStyleSheet.css" rel="stylesheet" type="text/css">
	<link href="stylesheet/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<header>
		<a href="http://www.albertindustry.com/projects/php_grading/index.php"><img src="images/studentS.png" alt="studentS" style="width:100px;height:100px;"/></a>
		<a href="http://www.albertindustry.com/projects/php_grading/index.php"><h1> Welcome to Student Go</h1></a>
	</header>
	
	<div class="wrapper">
		<div class="content">
			<div id="headbar"></div>
			<div id="leftBox">
				<h3>Login to Student Go</h3>
				<div id="loginBox">
					<form method="post">
						Username<br>
						<input placeholder="Username" name="username" size=30><br>
						Password<br>
						<input placeholder="Password" type="password" name="password" size=30><br>
						<input name="submit" type="submit" value="Sign in">
					</form>
					<a href="website_pages/ForgotAccount.php">Forgot password?</a>
				</div>
			</div>
			<div id="rightBox">
				<h3>About Student Go</h3>
				<div id="aboutBox">
					<h4 style="margin:0;">Access</h4>
					<p>To access <span style="color:teal;">Student Go</span> please sign in with your username and password.
					Don't have an account? Register by <a href="website_pages/registrationBootstrap.php">clicking here.</a></p>
					
					PLEASE NOTE THAT ACCOUNTS WILL BE DELETED DAILY AS THIS IS ONLY FOR DEMOSTRATION PURPOSES
					<br><br>
					<h4 style="margin:0;">Who We Are</h4>
					This website is about helping students keep track of their work, notes, files, and calculate their grading.
					<br><br>
					<h4 style="margin:0;">Please keep in note</h4>
					- Accounts will be deleted on a daily as this is only for demostration purpose.<br>
					- Any uploaded file is privately used by the uploader only. We may check the uploads for any malicious content occasionally.<br>
					- All record of your courses is privately viewed by you only.<br>
					- No illegal content may be uploaded to this website.
					
					<br><br>
					Forgot your username? <a href="website_pages/ForgotAccount.php">click here.</a> to recover it.
					
					<br><br>
					If you are experiencing any trouble with one of our services please email us at example@abc.com
					
					
				</div>
			</div> 	
		</div>
		<?php include "template/templateFoot.php";?>
	</div>
</body>
</html>
