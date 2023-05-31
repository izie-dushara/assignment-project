<?php
	session_start();
	
	if(isset($_POST['edit_button'])){
		$input_status = 'enabled';
	}else{
		$input_status = 'disabled';
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			if($_SESSION['type'] == "Contractor"){ ?>
				<title>My Profile</title> <?php
			}elseif($_SESSION['type'] == "Admin"){ ?>
				<title>Edit Senior Account</title> <?php
			} 
		?>
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
	
		<?php
			if($_SESSION['type'] == "Contractor"){ ?>
				<div class="flex second_nav" >
				    <div class="second_nav_link">
						<a href="con_profile.php">My Profile</a>
					</div>
					<div class="second_nav_link">
						<a href="manage_bookings.php">Bookings</a>
					</div>

					<div class="second_nav_link">
						<a href="manage_appointment.php">Manage Appointments</a>
					</div>

					<div class="second_nav_link">
						<a href="manage_billings.php">Manage Billings</a>
					</div>
				</div>
			<?php
				}elseif($_SESSION['type'] == "Admin"){ ?>
					<div class="flex second_nav" style="margin: 50px;">
						<div class="second_nav_link">
							<a href="admin_profile.php">My Profile</a>
						</div>
						<div class="second_nav_link">
							<a href="manage_users.php">Manage Users</a>
						</div>

						<div class="second_nav_link">
							<a href="manage_payments.php">Manage Payments</a>
						</div>

						<div class="second_nav_link">
							<a href="manage_invoices.php">Manage Invoice</a>
						</div>
					</div>
				<?php
				}
 
			include('database_connection.php');

			if($_SESSION['type'] == "Contractor"){
				$id=$_SESSION['id'];
				$retrieveQuery = "SELECT * FROM contractor WHERE contractor_id = '$id;'";
			}elseif($_SESSION['type'] == "Admin"){
				$id=$_GET['id'];
				$retrieveQuery = "SELECT * FROM contractor WHERE contractor_id= '$id';";
			}
		
			$result = mysqli_query($connection, $retrieveQuery);
			$row = mysqli_fetch_assoc($result);
		?>
			
		<div class="main">
			<div class="vertical_flex register_container">
				<div>
					<img src="images/homerepairlogocropped.png"
						alt="Home Repair Logo"
						title="Logo of Home Repair Department"
						width="160px" />
				</div>

				<p class="welcome">My Profile</p>

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
									<?php echo $input_status ?>
									value="<?php echo $row['contractor_firstname'];?>">
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
									<?php echo $input_status ?>
									value="<?php echo $row['contractor_lastname'];?>">
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
									<?php echo $input_status ?>
									value="<?php echo $row['contractor_contact'];?>">
							</div>
						</div>
						<div class="input_layer">
							<div class="input_label">
								<label>Company Name</label>
							</div>
							<div class="input_box">
								<input type="text"
									name="txt_company"
									required
									<?php echo $input_status ?>
									value="<?php echo $row['contractor_company'];?>">
							</div>
						</div>
					</div>

					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>Email Address</label>
							</div>

							<div class="input_box">
								<input type="email" name="txt_email" required <?php echo '$input_status'?> value= "<?php echo $row['contractor_email'];?>">
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>Password</label>
							</div>

							<div class="input_box">
								<input type="password"
									name="txt_password"
									required
									<?php echo $input_status ?>
									value="<?php echo $row['contractor_password'];?>">
							</div>
						</div>
					</div>


					<div class="flexbox button">
						<div>
							<?php 
								if(isset($_POST['edit_button'])){ ?>
									<button type="submit" name="save_details">
										Save Details
									</button>
									<?php
									}else { ?>
									<button type="submit"
									name="edit_button">
										Edit Details
									</button> 
									<?php
									} 
							?>
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

		<?php

			if(isset($_POST['save_details'])){
				$firstname = $_POST['txt_firstname'];
				$lastname = $_POST['txt_lastname'];
				$contact = $_POST['txt_contact'];
				$company = $_POST['txt_company'];
				$email = $_POST['txt_email'];
				$password = $_POST['txt_password'];
		
				$toupdateQuery = "UPDATE `contractor` SET `contractor_firstname`='$firstname',`contractor_lastname`='$lastname',`contractor_contact`='$contact', `contractor_company`='$company', `contractor_email`='$email',
				`contractor_password`='$password' WHERE `contractor_id` = '$id';";
				
				if(mysqli_query($connection, $toupdateQuery)) {
					if($_SESSION['type'] == "Contractor"){ ?>
						<script>
							alert('Update Successful');
							window.location.replace("con_profile.php");
						</script>
					<?php
					}elseif($_SESSION['type'] == "Admin"){ ?>
						<script>
							alert('Contractor Account Updated Successful');
							window.location.replace("manage_users.php");
						</script>
					<?php
				}else{ ?>
					<script> 
						alert('Update Failed.');
					</script>
					<?php
					}
				}
				mysqli_close($connection);
			}
		?>
	</body>
</html>