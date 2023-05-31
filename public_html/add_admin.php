<?php
	session_start();
	include('database_connection.php');

	if(isset($_POST['login_button'])){
		$firstname = $_POST['txt_firstname'];
		$lastname = $_POST['txt_lastname'];
		$email = $_POST['txt_email'];
		$password = $_POST['txt_password'];

		//checks database to see if the email (username) has been taken/already exist
		$searchQuery = "SELECT * FROM senior WHERE senior_email = '$email';";
		$searchRetrieveResults = mysqli_query($connection, $searchQuery);
		$searchRow = mysqli_fetch_assoc($searchRetrieveResults);
		$seniorCount = mysqli_num_rows($searchRetrieveResults);

		$adminQuery = "SELECT * FROM admin WHERE admin_email = '$email';";
		$adminRetrieveResults = mysqli_query($connection, $adminQuery);
		$adminRow = mysqli_fetch_assoc($adminRetrieveResults);
		$adminCount = mysqli_num_rows($adminRetrieveResults);

		$contractorQuery = "SELECT * FROM contractor WHERE contractor_email = '$email';";
		$contractorRetrieveResults = mysqli_query($connection, $contractorQuery);
		$contractorRow = mysqli_fetch_assoc($contractorRetrieveResults);
		$contractorCount = mysqli_num_rows($contractorRetrieveResults);

		//mysql query to insert registration record into the database
		$insertQuery = "INSERT INTO `admin`(`admin_firstname`, `admin_lastname`,`admin_email`, `admin_password`) VALUES ('$firstname','$lastname','$email', '$password');";

		if ($seniorCount >= 1 or $adminCount >= 1 or $contractorCount >= 1){ ?>
			<script>
				alert("Record Exists. Kindly use another email address or advise login.")
			</script>
			<?php 
		}else{
			if (mysqli_query($connection, $insertQuery)){ ?>
				<script>
					alert("Admin account created successfully.")
					window.location.replace('manage_users.php')
				</script>
				<?php
			}else{ ?>
				<script>
					alert("Registration failed. Kindly register again.")
				</script>
				
				<?php
				}
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
		<title>Add Admin Account</title>
		<link rel="shortcut icon" href="images/homerepairjpeglogo.jpg" type="image/x-icon">
		<link rel="stylesheet" href="Pre-Login_Header_Footer_styles.css">
		<link rel="stylesheet" href="login_styles.css">
	</head>
	<body>
    	<header>
    		<div class="header flexbox">
    			<div class="header_left_section">
    				<img class="home_repair_logo"
    					src="images/homerepairlogocropped.png"
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
    					<a href="about_us.php">About Us</a>
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
	
		<div class="flex second_nav" style="margin: 50px;">
			<div class="second_nav_link">
				<a href="admin_profile.php">My Profile</a>
			</div>
			<div class="second_nav_link">
				<a href="manage_users.php">Manage Users</a>
			</div>

			<div class="second_nav_link">
				<a href="manage_invoices.php">Manage Invoice</a>
			</div>
		</div>

		<div class="main">
			<div class="vertical_flex register_container">
				<div>
					<img src="images/homerepairlogocropped.png"
						 alt="Home Repair Logo"
						 title="Logo of Home Repair Department"
						 width="160px" />
				</div>

				<p class="welcome">Admin Registration Form</p>

				<form action="#" method="POST">
				<div style="width: 525px;">
					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>First Name</label>
							</div>
							<div>
								<input type="text"
									   name="txt_firstname"
									   required
									   placeholder="Enter first name">
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>Last Name</label>
							</div>
							<div>
								<input type="text"
									   name="txt_lastname"
									   required
									   placeholder="Enter last name"
									   style="width: 240px;">
							</div>
						</div>
					</div>

					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>Email Address</label>
							</div>

							<div class="input_box">
								<input type="email"
									   name="txt_email"
									   required
									   placeholder="Enter email address"
									   style="width: 240px;">
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>Password</label>
							</div>

							<div class="input_box">
								<input type="password"
									   name="txt_password"
									   id="txt_password"
									   required
									   placeholder="Enter password">
							</div>
						</div>
					</div>
							

					<div class="flexbox button">
						<div>
							<button type="reset"
									name="reset_button">Reset</button>
						</div>

						<div>
							<button type="submit"
									name="login_button">Register</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>

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
						<a href="about_us.php" title="Contact Us Here">About Us</a>
					</div>
				</div>

				<div class="footer_description">The best solution for elderlies' home repair problems.
				</div>

				<p align="center">Home Repair Department &copy;2023</p>

			</div>
		</footer>
	</body>
</html>