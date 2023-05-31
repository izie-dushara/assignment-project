<?php
	session_start();
	include('database_connection.php');
	
	$id=$_SESSION['id'];

	if(isset($_POST['login_button'])){
		$description = $_POST['txt_description'];
		$total = $_POST['txt_total'];
		$appointment = $_POST['txt_appointment'];

		//checks database to see if the appointment already exists
		$searchQuery = "SELECT * FROM invoice WHERE appointment_id = '$appointment'";
		$searchRetrieveResults = mysqli_query($connection, $searchQuery);
		$searchRow = mysqli_fetch_assoc($searchRetrieveResults);
		$searchCount = mysqli_num_rows($searchRetrieveResults);

		//mysql query to create invoice record into the database
		$insertQuery = "INSERT INTO `invoice`(`invoice_description`, `invoice_total`, `appointment_id`, `contractor_id`) VALUES ('$description','$total', '$appointment', $id);";

		if ($searchCount >= 1){ ?>
			<script>
				alert("Appointment Invoice Exists. Kindly use another Appointment ID.")
			</script>
			<?php 
		}else{
			if (mysqli_query($connection, $insertQuery)){ ?>
					<script>
						alert("Invoice created successfully.")
						window.location.replace('con_profile.php')
					</script>
					<?php
			}else{ ?>
				<script>
					alert("Invoice creation failed. Kindly try again.")
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
        <title>Manage Billings</title>
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
							<a href="manage_invoices.php">Manage Invoice</a>
						</div>
					</div>
				<?php
				}
				?>
				
		<div class="main">

			<div class="vertical_flex register_container">
				<div>
					<img src="images/homerepairlogocropped.png"
						alt="Home Repair Logo"
						title="Logo of Home Repair Department"
						width="160px" />
				</div>

				<p class="welcome">Create New Invoice</p>

				<form action="#" method="POST">
				<div style="width: 525px;">
					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>Invoice Description</label>
							</div>
							<div>
								<input type="text"
									name="txt_description"
									required
									placeholder="Details and Charges">
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>Total Amount</label>
							</div>
							<div>
								<input type="number"
									name="txt_total"
									required
									placeholder="Total Summary"
									>
							</div>
						</div>
					</div>

					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>Appointment ID</label>
							</div>
							<div class="input_box">
								<input type="number"
									name="txt_appointment"
									required
									placeholder="Ex: 1">
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
									name="login_button">Create Invoice</button>
						</div>
						
					
					    <div>
					        <a href="view_billings.php">	
                            <button type="button"
                                    name="link_button">View All Billings</button>
                            </a>
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