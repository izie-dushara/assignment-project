<?php
	session_start();
	include('database_connection.php');

	if(isset($_POST['login_button'])){
		$firstname = $_POST['txt_firstname'];
		$lastname = $_POST['txt_lastname'];
		$contact = $_POST['txt_contact'];
		$email = $_POST['txt_email'];
		$addressline1 = $_POST['txt_addressline1'];
		$addressline2 = $_POST['txt_addressline2'];
		$postcode = $_POST['txt_postcode'];
		$state = $_POST['state'];
		$password = $_POST['txt_password'];

		// retrieve state records so that the ids can be used to added into seniors' registration records
		$stateRetrieveQuery = "SELECT state_id, state_name FROM state WHERE state_name = '$state'";
		$stateRetrieveResults = mysqli_query($connection, $stateRetrieveQuery);
		$stateRow = mysqli_fetch_assoc($stateRetrieveResults);

		$state_id = $stateRow['state_id']; //retrieve state id
		
		//checks database to see if the email (username) has been taken/already exist
		$searchQuery = "SELECT * FROM senior WHERE senior_email = '$email'";
		$searchRetrieveResults = mysqli_query($connection, $searchQuery);
		$searchRow = mysqli_fetch_assoc($searchRetrieveResults);
		$searchCount = mysqli_num_rows($searchRetrieveResults);

		//mysql query to insert registration record into the database
		$insertQuery = "INSERT INTO `senior`(`senior_firstname`, `senior_lastname`, `senior_contact`, `senior_email`, `senior_addressline1`, `senior_addressline2`, `senior_postcode`, `state_id`, `senior_password`) VALUES ('$firstname','$lastname','$contact','$email','$addressline1','$addressline2','$postcode','$state_id','$password')";

		if ($searchCount == 1){
			if($_SESSION['type'] == "Senior"){ ?>
					<script>
						alert("Record Exists. Kindly login.")
						window.location.replace('login.php')
					</script>
					<?php 
				}elseif($_SESSION['type'] == "Admin"){ ?>
					<script>
						alert("Record Exists. Kindly use another email address or advise login.")
						window.location.replace('register.php')
					</script>
					<?php
				}
		}else{
			if (mysqli_query($connection, $insertQuery)){ 
				if($_SESSION['type'] != "Admin"){ ?>
					<script>
						alert("You've succesfully registered. You may now login to book an appointment.")
						window.location.replace('login.php')
					</script>
					<?php 
				}elseif($_SESSION['type'] == "Admin"){ ?>
					<script>
						alert("Senior account created successfully.")
						window.location.replace('manage_users.php')
					</script>
					<?php
				}
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
		<meta http-equiv="X-UA-Compatible"
			  content="IE=edge">
		<meta name="viewport"
			  content="width=device-width, initial-scale=1.0">

		<?php 
			if(empty($_SESSION['type'])){ ?>
				<title>Register</title> 
			<?php
			}else{ ?>
				<title>Add a Senior Account</title>
			<?php
			}
		?>
		
		<link rel="shortcut icon"
			  href="images/homerepairjpeglogo.jpg"
			  type="image/x-icon">
		<link rel="stylesheet"s
			  href="Pre-Login_Header_Footer_styles.css">
		<link rel="stylesheet"
			  href="login_styles.css">
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
    						<a href="<?php echo strtolower($_SESSION['type'])?>_profile.php">
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
			<div class="vertical_flex register_container">
				<div>
					<img src="images/homerepairlogo.png"
						 alt="Home Repair Logo"
						 title="Logo of Home Repair Department"
						 width="160px" />
				</div>

				<p class="welcome">Registration Form</p>

				<form action="#" method="POST">
					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>First Name</label>
							</div>
							<div>
								<input type="text"
									   name="txt_firstname"
									   required
									   placeholder="Enter your first name">
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
									   placeholder="Enter your last name"
									   style="width: 240px;">
							</div>
						</div>
					</div>

					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>Contact Number</label>
							</div>
							<div class="input_box">
								<input type="tel"
									   name="txt_contact"
									   required
									   placeholder="Ex: xxx-xxx-xxxx">
							</div>
						</div>

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
					</div>

					<div class="input_layer input_container">
						<div class="input_label">
							<label>Address Line 1</label>
						</div>
						<div class="input_box">
							<input type="text"
								   name="txt_addressline1"
								   required
								   placeholder="Enter your address" style="width: 500px;">
						</div>
					</div>

					<div class="input_layer input_container">
						<div class="input_label">
							<label>Address Line 2</label>
						</div>
						<div class="input_box">
							<input type="text"
								   name="txt_addressline2"
								   placeholder="Enter your address" style="width: 500px;">
						</div>
					</div>

					<div class="flex input_container">
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

						<div class="input_layer">
							<div class="input_label">
								<label>Postcode</label>
							</div>
							<div class="input_box">
								<input type="number"
									   name="txt_postcode"
									   required
									   placeholder="70450" style="width: 100px;">
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>State</label>
							</div>
							<div class="input_box">
								<select name="state"
										style="padding:10px; font-size: 100%">
									<option value="Johor">Johor</option>
									<option value="Kedah">Kedah</option>
									<option value="Kelantan">Kelantan</option>
									<option value="Malacca">Malacca</option>
									<option value="Negeri Sembilan">Negeri Sembilan</option>
									<option value="Pahang">Pahang</option>
									<option value="Penang">Penang</option>
									<option value="Perak">Perak</option>
									<option value="Perlis">Perlis</option>
									<option value="Sabah">Sabah</option>
									<option value="Sarawak">Sarawak</option>
									<option value="Selangor">Selangor</option>
									<option value="Terengganu">Terengganu</option>
									<option value="Kuala Lumpur">Kuala Lumpur</option>
									<option value="Labuan">Labuan</option>
									<option value="Putrajaya">Putrajaya</option>
								</select>
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
				</form>
			</div>
		</div>

		<footer>
			<div>
				<div class="footer"
					 align="center">
					<p class="subtitle">Elderly Home's Club</p>
					<p class="main_title">HOME REPAIR DEPARTMENT</p>
					<div>

						<hr width="1700px;">

						<div class="flexbox footer_nav">
							<div class="footer_nav_link">
								<a href="services.html">Services</a>
							</div>
							<div class="footer_nav_link">
								<a href="reviews.html">Reviews</a>
							</div>
							<div class="footer_nav_link">
								<a href="about_us.html"
								   title="Contact Us Here">About Us</a>
							</div>
						</div>

						<div class="footer_description">The best solution for elderlies' home repair problems.
						</div>

						<p align="center">Home Repair Department &copy;2023</p>

					</div>
		</footer>
	</body>

</html>