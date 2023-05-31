<?php
    session_start();
    $id=$_SESSION['id'];
    
	include('database_connection.php');

	$retrieveQuery = "SELECT senior_addressline1, senior_addressline2, senior_postcode, state_id FROM senior WHERE senior_id = '$id';";
	$result = mysqli_query($connection, $retrieveQuery);
	$row = mysqli_fetch_assoc($result);

	$retrieveStateQuery = "SELECT state_id, state_name FROM state WHERE state_id = '$row[state_id]'";
	$executeQuery = mysqli_query($connection, $retrieveStateQuery);
	$stateRecord = mysqli_fetch_assoc($executeQuery);
		
	$state_name = $stateRecord['state_name'];


	if(isset($_POST['login_button'])){
		$service = $_POST['service'];
		$date = $_POST['txt_date'];
		$time_slot = $_POST['time_slot'];
		$notes = $_POST['txt_notes'];
		$addressline1 = $_POST['txt_addressline1'];
		$addressline2 = $_POST['txt_addressline2'];
		$postcode = $_POST['txt_postcode'];
		$state = $_POST['state'];

		echo $state;

		$insertQuery = "INSERT INTO `appointment`(`service_id`, `senior_id`, `appointed_date`, `time_slot_id`, `notes`) VALUES ('$service', $id, '$date','$time_slot','$notes');";
	
		$addressQuery = "UPDATE `senior` SET `senior_addressline1`= '$addressline1',`senior_addressline2`='$addressline2',`senior_postcode`='$postcode',`state_id`=$state WHERE `senior_id` = $id;";
				
		if(mysqli_query($connection, $insertQuery) && mysqli_query($connection, $addressQuery)) { ?>
			<script>
				alert('Appointment Successful. Kindly check your appointments to see if the contractor has approved.');
				window.location.replace("my_appointments.php");
			</script>
			<?php
		}else{ ?>
			<script> 
				alert('Booking Failed, please log in to book again.');
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
		<meta http-equiv="X-UA-Compatible"
			  content="IE=edge">
		<meta name="viewport"
			  content="width=device-width, initial-scale=1.0">
		<title>Booking Form</title>
		<link rel="shortcut icon"
			  href="images/homerepairlogo.png"
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
			<div class="vertical_flex register_container">
				<div>
					<img src="images/homerepairlogo.png"
						 alt="Home Repair Logo"
						 title="Logo of Home Repair Department"
						 width="150px" />
				</div>

				<p class="welcome">Booking Form</p>

				<form action="#" method="POST">
					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>Select Service:</label>
							</div>
							<div class="input_box">
								<select name="service" required placeholder="Select Preferred Service" style="padding:10px;"> 
									<option value=1>Gardening</option>
									<option value=2>Basic Housekeeping</option>
									<option value=3>Advanced Housekeeping</option>
									<option value=4>Pest Control</option>
									<option value=5>Laundry & Dry Cleaning</option>
									<option value=6>Paint Job</option>
									<option value=7>Electrical</option>
									<option value=8>Air Conditioner</option>
									<option value=9>Plumbing</option>
									<option value=10>Furniture Repair</option>
									<option value=11>Safety & Smart Home Installation</option>
								</select>
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>Appointment Date:</label>
							</div>
							<div>
								<input type="date" name="txt_date" required placeholder="DD/MM/YYYY" style="padding-top: 10px; padding-bottom: 10px; width: 240px;">
							</div>
						</div>
					</div>

					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>Available Time Slot:</label>
							</div>
							<div class="input_box">
								<select name="time_slot" style="padding:10px;"> 
									<option value=1>09:30AM - 10:30AM</option>
									<option value=2>11:00AM - 12:00PM</option>
									<option value=3>01:30PM - 02:30PM</option>
									<option value=4>03:00PM - 04:00PM</option>
									<option value=5>04:30PM - 05:30PM</option>
								</select>
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>Notes</label>
							</div>

							<div class="input_box">
								<input type="text" name="txt_notes" placeholder="Additional Notes" style="width: 240px;">
							</div>
						</div>
					</div>

					<div style="padding-left: 20px;"><h3>Confirm Address</div></h3>

					<div class="input_layer input_container">
						<div class="input_label">
							<label>Address Line 1</label>
						</div>
						<div class="input_box">
							<input type="text"
								   name="txt_addressline1"
								   required
								value="<?php echo $row['senior_addressline1'];?>" style="width: 500px;">
						</div>
					</div>

					<div class="input_layer input_container">
						<div class="input_label">
							<label>Address Line 2</label>
						</div>
						<div class="input_box">
							<input type="text"
								   name="txt_addressline2"
								   value="<?php echo $row['senior_addressline2'];?>" style="width: 500px;">
						</div>
					</div>

					<div class="flex input_container">
						<div class="input_layer">
							<div class="input_label">
								<label>Postcode</label>
							</div>
							<div class="input_box">
								<input type="number"
									   name="txt_postcode"
									   required
									   value="<?php echo $row['senior_postcode'];?>" style="width: 100px;">
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>State</label>
							</div>
							<div class="input_box">
								<select name="state"
									style="padding:10px; font-size: 100%">
									<option value=1 <?php if($state_name == "Johor"){echo "selected";} ?>>Johor</option>
									<option value=2 <?php if($state_name == "Kedah"){echo "selected";} ?>>Kedah</option>
									<option value=3 <?php if($state_name == "Kelantan"){echo "selected";} ?>>Kelantan</option>
									<option value=4 <?php if($state_name == "Malacca"){echo "selected";} ?>>Malacca</option>
									<option value=5 <?php if($state_name == "Negeri Sembilan") {echo "selected";} ?>>Negeri Sembilan</option>
									<option value=6 <?php if($state_name == "Pahang"){echo "selected";} ?>>Pahang</option>
									<option value=7 <?php if($state_name == "Penang"){echo "selected";} ?>>Penang</option>
									<option value=8 <?php if($state_name == "Perak"){echo "selected";} ?>>Perak</option>
									<option value=9 <?php if($state_name == "Perlis"){echo "selected";} ?>>Perlis</option>
									<option value=10 <?php if($state_name == "Sabah"){echo "selected";} ?>>Sabah</option>
									<option value=11 <?php if($state_name == "Sarawak"){echo "selected";} ?>>Sarawak</option>
									<option value=12 <?php if($state_name == "Selangor"){echo "selected";} ?>>Selangor</option>
									<option value=13 <?php if($state_name == "Terengganu"){echo "selected";} ?>>Terengganu</option>
									<option value=14 <?php if($state_name == "Kuala Lumpur") {echo "selected";} ?>>Kuala Lumpur</option>
									<option value=15 <?php if($state_name == "Labuan"){echo "selected";} ?>>Labuan</option>
									<option value=16 <?php if($state_name == "Putrajaya"){echo "selected";} ?>>Putrajaya</option>
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
									name="login_button">Book Now</button>
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
    </body>
</html>
