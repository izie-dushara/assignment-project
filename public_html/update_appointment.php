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
		<meta http-equiv="X-UA-Compatible"
			  content="IE=edge">
		<meta name="viewport"
			  content="width=device-width, initial-scale=1.0">
		<title>Update Appointment</title>
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
			include('database_connection.php');
			$id = $_GET['id'];

			$retrieveQuery = "SELECT appointment_id, appointment_status FROM appointment WHERE appointment_id = '$id';";
		
			$result = mysqli_query($connection, $retrieveQuery);
			$row = mysqli_fetch_assoc($result);
			$status = $row['appointment_status'];

		?>

		<div class="main">
			<div class="vertical_flex register_container">
				<div>
					<img src="images/homerepairlogocropped.png"
						 alt="Home Repair Logo"
						 title="Logo of Home Repair Department"
						 width="160px" />
				</div>

				<p class="welcome">Update Appointment</p>

				<form action="#" method="POST">
					<div class="vertical_flex input_container">
						<div class="input_layer" style="margin-bottom: 20px;">
							<div class="input_label">
								<label>Appointment ID</label>
							</div>
							<div>
								<input type="number"
									   name="txt_appointment_id"
									   required
										value="<?php echo $row['appointment_id']; ?>">
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>Appointment Status</label>
							</div>
							<div class="input_box">
								<select name="status"
										required
										style="padding:10px; font-size: 100%">
									<option value="PENDING" <?php if($status == "PENDING"){echo "selected";} ?>>PENDING</option>
									<option value="APPROVED" <?php if($status == "APPROVED"){echo "selected";} ?>>APPROVED</option>
									<option value="REJECTED" <?php if($status == "REJECTED"){echo "selected";} ?>>REJECTED</option>
								</select>
							</div>
						</div>
					</div>


					<div class="flexbox button">
						<div>
							<button type="submit" name="update_details">
								Update
							</button>
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
							<a href="aboutus.php" title="Contact Us Here">About Us</a>
						</div>
					</div>

					<div class="footer_description">The best solution for elderlies' home repair problems.
					</div>

					<p align="center">Home Repair Department &copy;2023</p>

				</div>
		</footer>	
		
		<?php

			if(isset($_POST['update_details'])){
				$status = $_POST['status'];

				$toupdateQuery = "UPDATE `appointment` SET `appointment_status`='$status' WHERE `appointment_id` = $id;";
				
				if(mysqli_query($connection, $toupdateQuery)) { ?>
					<script>
						alert('Update Successful');
						window.location.replace("manage_appointment.php");
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