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
		<title>My Profile</title>
		<title>My Profile</title>
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
	
		<div class="flex second_nav" style="margin: 50px;">
			<div class="second_nav_link">
				<a href="admin_profile.php">My Profile</a>
			</div>
			<div class="second_nav_link">
				<a href="manage_users.php">Manage Users</a>
			</div>
		</div>

		<?php 
			include('database_connection.php');

			//retrieve admin record

			$id=$_SESSION['id'];
			$retrieveQuery = "SELECT * FROM admin WHERE admin_id = '$id';";

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
									   value="<?php echo $row['admin_firstname'];?>">
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
									   value="<?php echo $row['admin_lastname'];?>">
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
									   <?php echo $input_status ?>
									   value="<?php echo $row['admin_email']; ?>">
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
									   <?php echo $input_status ?>
									   value="<?php echo $row['admin_password']; ?>">
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
				$email = $_POST['txt_email'];
				$password = $_POST['txt_password'];
		
				$toupdateQuery = "UPDATE `admin` SET `admin_firstname`='$firstname',`admin_lastname`='$lastname', `admin_email`='$email', `admin_password`='$password' WHERE `admin_id` = $id;";
				
				if(mysqli_query($connection, $toupdateQuery)) { ?>
					<script>
						alert('Update Successful');
						window.location.replace("admin_profile.php");
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
		?>
	</body>
</html>