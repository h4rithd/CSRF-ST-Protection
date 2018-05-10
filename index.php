<!--===============================================================================================-->	
<?php 
    //Create session in  browser
    session_start();

    //Setting and storing session ID
    $sessionID = session_id(); 

    //Terminate cookie after 1 hour 
    setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true);
    

?>
<!--===============================================================================================-->	
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SSS Assignment 1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<script> 
	var csrf_token;

	function loadDOC(method,url,htmlTag)
	{
	    var xhttp = new XMLHttpRequest(); 
	    xhttp.onreadystatechange = function() 
	    {
		if(this.readyState==4 && this.status==200)
		{
		    console.log("CSRF token scuessfully fetched : "+this.responseText);
		    document.getElementById(htmlTag).value = this.responseText;		   
		}
	    };
	    xhttp.open(method,url,true);
	    xhttp.send();
	}
	</script>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form  method="POST" action="server.php" class="login100-form validate-form">
					<span class="login100-form-title">
						Assignment 1
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: abc@abc.com">
						<input class="input100" type="text" name="user_name"  placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="user_pswd" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="spacing"><input type="hidden" id="csToken" name="CSR"/></div>
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
<?php 
	if(isset($_COOKIE['session_id']))
	{ 
		echo '<script> var token = loadDOC("POST","server.php","csToken");  </script>'; 
	}
?>
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
