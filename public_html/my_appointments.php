<?php
    session_start();
	include('database_connection.php');
    $id= $_SESSION['id'];
    
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>My Appointments</title>

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

		<div class="flex second_nav" >
			<div class="second_nav_link">
				<a href="my_profile.php">Profile</a>
			</div>
			<div class="second_nav_link">
				<a href="my_appointments.php">Appointments</a>
			</div>

			<div class="second_nav_link">
				<a href="my_bills.php">Billings</a>
			</div>

		</div>

		<form action="#" method="POST">
			<div	div class="flex second_nav" >
				<button type="submit" name="cancel_button">Cancel Appointment</button>
			</div>
		</form>
		<?php 

			if(isset($_POST['cancel_button'])){ ?>
				<script>
					window.location.replace("cancel.php");
				</script> <<?php

			}

			$retrieveQuery = "SELECT appointment_id, service_name, appointed_date, time_slot, appointment_status, notes 
				FROM appointment 
					INNER JOIN service
					ON appointment.service_id = service.service_id
					
					
					INNER JOIN time_slot
					ON appointment.time_slot_id = time_slot.time_slot_id
					
					
			WHERE senior_id = $id ORDER BY appointment_id DESC;";

			$result = mysqli_query($connection, $retrieveQuery); ?>

			<h2 style="text-align: center;">Appointments</h2>
			<table width="auto" border="1" cellspacing="2" cellpadding="5" style="margin-left: auto; margin-right: auto; margin: 70px auto;">
				<tr>
					<th>Appointment ID</th>
					<th>Service</th>
					<th>Appointment Date</th>
					<th>Time Slot</th>
					<th>Appointment Status</th>
					<th>Notes</th>
				</tr>
					<?php 
					while ($row = mysqli_fetch_assoc($result)){ ?>
						<tr>
							<td><?php echo $row['appointment_id'];?></td>	
							<td><?php echo $row['service_name'];?></td>	
							<td><?php echo $row['appointed_date'];?></td>	
							<td><?php echo $row['time_slot'];?>
							</td>
							<td><?php echo $row['appointment_status'];?></td>
							<td><?php echo $row['notes'];?></td>
						</tr>
					<?php } ?>	
				</table> 

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

				<div class="footer_description">The best solution for elderlies' home repair problems.</div>

				<p align="center">Home Repair Department &copy;2023</p>

			</div>
		</footer>
	</body>
</html>