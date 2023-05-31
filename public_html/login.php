<?php
    session_start();
	include('database_connection.php');
	
	

	if(isset($_POST['login_button'])){
		$email = $_POST['txt_username'];
		$password = $_POST['txt_password'];

		//search and retrieve senior's record from database to check if record exists and if so if it matches
		$seniorRetrieveQuery = "SELECT senior_id, senior_email, senior_lastname, senior_password, senior_type FROM senior WHERE senior_email = '$email'";
		$seniorRetrieveResults = mysqli_query($connection, $seniorRetrieveQuery);
		$seniorRow = mysqli_fetch_assoc($seniorRetrieveResults);
		$seniorCount = mysqli_num_rows($seniorRetrieveResults);

		//search and retrieve contractor's record from database to check if record exists and if so if it matches
		$contractorRetrieveQuery = "SELECT contractor_id, contractor_email, contractor_lastname, contractor_password, contractor_type FROM contractor WHERE contractor_email = '$email';";
		$contractorRetrieveResults = mysqli_query($connection, $contractorRetrieveQuery);
		$contractorRow = mysqli_fetch_assoc($contractorRetrieveResults);
		$contractorCount = mysqli_num_rows($contractorRetrieveResults);

		//search and retrieve admin's record from database to check if record exists and if so if it matches
		$adminRetrieveQuery = "SELECT admin_id, admin_email, admin_lastname, admin_password, admin_type FROM admin WHERE admin_email = '$email';";
		$adminRetrieveResults = mysqli_query($connection, $adminRetrieveQuery);
		$adminRow = mysqli_fetch_assoc($adminRetrieveResults);
		$adminCount = mysqli_num_rows($adminRetrieveResults);

		/*If one record exist (each user type) then
	    	If password fields match then
	    	    redirect to logged in index
	    	Else
	    	    says password incorrect
	       else says account doesn't exist.*/

		if($seniorCount == 1){
			{if($password == $seniorRow['senior_password']){  ?>
			    <script>
			        alert('Login Successful');
			        window.location.replace("index.php");
			    </script>
                <?php
				$_SESSION['id'] = $seniorRow['senior_id'];
				$_SESSION['name'] = $seniorRow['senior_lastname'];
				$_SESSION['type'] = $seniorRow['senior_type'];
				
			}else{ ?>
				<script>
					alert("Password is incorrect.")
				</script>

				<?php
		    	}
			}
			
		}elseif($contractorCount == 1){
			
			{if($password == $contractorRow['contractor_password']){ ?>
			    <script>
			        alert('Login Successful');
			        window.location.replace("index.php");
			    </script>
			    
                <?php
				$_SESSION['id'] = $contractorRow['contractor_id'];
				$_SESSION['name'] = $contractorRow['contractor_lastname'];
				$_SESSION['type'] = $contractorRow['contractor_type'];

			}else{ ?>
				<script>
					alert("Password is incorrect.")
				</script>
				
				<?php
				}
			}

		}elseif($adminCount == 1){
			
			{if($password == $adminRow['admin_password']){ ?>
			    <script>
			        alert('Login Successful');
			        window.location.replace("index.php");
			    </script>
			    
                <?php
				$_SESSION['id'] = $adminRow['admin_id'];
				$_SESSION['name'] = $adminRow['admin_lastname'];
				$_SESSION['type'] = $adminRow['admin_type'];


			}else{ ?>
				<script>
					alert("Password is incorrect.")
				</script>
				
				<?php
				}
			}

		}else{ ?>
    		<script>
    			alert("Record doesn't exist. Kindly register for an account.");
    			window.location.replace("register.php");
    		</script>
    		
    		<?php
			}
		
	mysqli_close($connection);
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Login</title>
    	<link rel="shortcut icon" href="images/homerepairjpeglogo.jpg" type="image/x-icon">
    	<link rel="stylesheet" href="Pre-Login_Header_Footer_styles.css">
    	<link rel="stylesheet" href="login_styles.css">
    </head>
    <body>
        <header>
    		<div class="header flexbox">
    			<div class="header_left_section">
    				<img class="home_repair_logo"
    					src="images/homerepairlogo.png"
    						alt="Home Repair Department Logo"
    						title="Logo of Home Repair Department"
    						width="160px"/>
    			</div>
    
    			<div class="flex header_middle_section">
    				<div class="nav_link_component">
    					<a href="index.php">Home</a>
    				</div>
    
    				<span>|</span>
    
    				<div class="nav_link_component">
    					<a href="services.php">Services</a>
    				</div>
    
    				<span>|</span>
    
    				<div class="nav_link_component">
    					<a href="reviews.php">Reviews</a>
    				</div>
    
    				<span>|</span>
    
    				<div class="nav_link_component" style="width: 100px">
    					<a href="aboutus.php">About Us</a>
    				</div>
    			</div>
    
    			<div class="flexbox header_right_section">
    
    				<?php
    				if (!empty($_SESSION['id'])){ ?>
    					<div class="login_component" style="width: 160px">
    						Welcome, <?php echo $_SESSION['type']?>
    					</div>
    
    					<div class="login_component">
    						<button class="button">
    							<a href="logout.php">Logout</a>
    						</button>
    					</div>
    
    					<div class="login_component">
    						<a href="
								<?php 
									if($_SESSION['type'] == "Senior"){
										echo 'my';
									}elseif($_SESSION['type'] == "Admin"){
										echo 'admin';
									}elseif($_SESSION['type'] == "Contractor"){
										echo 'con';
									} ?>_profile.php">
    							<img class="profile_logo"
    								src="images/human.png"
    								alt="User Logo"
    								title="Login to Access These Features"
    								width="70px" />
    						</a>
    					</div>
    
    				<?php
    				}else {?>
    					<div class="login_component" style="width: auto">
    						<button class="button">
    							<a href="login.php">Login/Register</a>
    						</button>
    					</div>
    
    					<div class="login_component">
    						<img class="profile_logo"
    							src="images/human.png"
    							alt="User Logo"
    							title="Login to Access These Features"
    							width="70px" />
    					</div>
    
    				<?php 
    					} ?>
    			</div>
	    	</div>
	    </header>


    	<div class="main">
    		<div class="vertical_flex register_container" style="max-width: 600px;">
    			<div>
    				<img src="images/homerepairlogo.png" 
    					alt="Home Repair Logo"
    					title="Logo of Home Repair Department"
    					width="160px"/>
    			</div>
    
    			<p class="welcome">Welcome User!</p>
    
    			<form action="#" method="POST">
    				<div class="input_layer input_container">
    					
    					<div class="input_label">
    						<label>Email Address</label>
    					</div>
    
    					<div class="input_box">
    						<input type="text" name="txt_username" required placeholder="Enter your email address" style="width: 250px;">
    					</div>
    
    				</div>
    
    				<div class="input_layer input_container">
    
    					<div class="input_label">
    						<label>Password</label>
    					</div>
    
    					<div>
    						<input type="password" name="txt_password" required placeholder="Enter your password" style="width: 250px;">
    					</div>
    
    				</div>
    
    				<div class="forgot">
    					<a class="link" href="ForgetPassword.php">Forgot Password?</a>
    				</div>
    
    				<div class="flexbox">
    					<div>
    						<button type="reset" name="reset_button">Reset</button>
    					</div>
    						
    					<div>
    						<button type="submit" name="login_button">Login</button>
    					</div>
    				</div>
    
    				<div class="flexbox register">
    					<div style="margin-right: 10px;">
    						Not a user yet?  
    					</div>
    						
    					<div>
    						<a class="link" href="register.php">Register Here</a>
    					</div>
    					
    				</div>
    			</form>
    		</div>
    	</div>
<!--            <button onclick="delete()">Delete items</button>-->

<!--<script>-->
<!--function delete(){-->
<!--    sessionStorage.clear()-->
<!--}-->
<!--</script>-->

    	<footer>
    		<div>
    			<div class="footer" align="center">
    				<p class="subtitle">Elderly Home's Club</p>
    				<p class="main_title">HOME REPAIR DEPARTMENT</p>
    			<div>
    
    			<hr width="1700px;">
    			
    			<div class="flexbox footer_nav">
    				<div class="footer_nav_link">
    					<a href="services.php">Services</a>
    				</div>
    				<div class="footer_nav_link">
    					<a href="reviews.php">Reviews</a>
    				</div>
    				<div class="footer_nav_link">
    					<a href="aboutus.php" title="Contact Us Here">About Us</a>
    				</div>
    			</div>
    
    			<div class="footer_description">The best solution for elderlies' home repair problems.
    			</div>
    
    			<p align="center">Home Repair Department &copy;2023</p>
    
    		</div>
    	</footer>
    </body>
</html>