<?php
    session_start();
	include('database_connection.php');
    
	if(isset($_POST['login_button'])){
		$appointmentid = $_POST['txt_appointment'];

		$checkAppointmentQuery = "SELECT appointment_id FROM appointment WHERE appointment_id = $appointmentid;";
		$result = mysqli_query($connection, $checkAppointmentQuery);
		$row = mysqli_fetch_assoc($result);
		$appointmentCount = mysqli_num_rows($result);

		if($appointmentCount > 0) {
			$deleteQuery = "DELETE FROM appointment WHERE appointment_id = $appointmentid;";
			if(mysqli_query($connection, $deleteQuery)){ ?>
				<script>
					alert('Appointment Cancelled.');
					window.location.replace("my_appointments.php");
				</script>
			<?php
			}else{?>
				<script> 
				alert('Cancellation Failed.');
			</script>
			<?php
			}

		mysqli_close($connection);
	}}
    
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Cancel Appointment</title>

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

		<div class="main">
			<div class="vertical_flex register_container" style="max-width: 600px;">
				<div>
					<img src="images/homerepairlogocropped.png" 
						alt="Home Repair Logo"
						title="Logo of Home Repair Department"
						width="160px"/>
				</div>

				<p class="welcome">Cancel Appointment</p>

				<form action="#" method="POST">
					<div class="input_layer input_container">
						
						<div class="input_label">
							<label>Appointment ID</label>
						</div>

						<div class="input_box">
							<input type="number" name="txt_appointment" required placeholder="Enter appointment ID" style="width: 250px;">
						</div>

					</div>


					<div class="flexbox">
						<div>
							<button type="reset" name="reset_button">Reset</button>
						</div>
							
						<div>
							<button type="submit" name="login_button">Cancel</button>
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
						<a href="services.html">Services</a>
					</div>
					<div class="footer_nav_link">
						<a href="reviews.html">Reviews</a>
					</div>
					<div class="footer_nav_link">
						<a href="about_us.html" title="Contact Us Here">About Us</a>
					</div>
				</div>

				<div class="footer_description">The best solution for elderlies' home repair problems.</div>

				<p align="center">Home Repair Department &copy;2023</p>

			</div>
		</footer>
	</body>
</html>