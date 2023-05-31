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
			if($_SESSION['type'] == "Senior"){ ?>
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
		if($_SESSION['type'] == "Senior"){ ?>
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

			if($_SESSION['type'] == "Senior"){
				$id=$_SESSION['id'];
				$retrieveQuery = "SELECT * FROM senior WHERE senior_id = '$id';";
			}elseif($_SESSION['type'] == "Admin"){
				$id=$_GET['id'];
				$retrieveQuery = "SELECT * FROM senior WHERE senior_id = '$id';";
			}
		
			$result = mysqli_query($connection, $retrieveQuery);
			$row = mysqli_fetch_assoc($result);
			
		
			// retrieve state records so that the ids can be used to added into seniors' registration records
			$retrieveStateQuery = "SELECT state_id, state_name FROM state WHERE state_id = '$row[state_id]'";
			$executeQuery = mysqli_query($connection, $retrieveStateQuery);
			$stateRecord = mysqli_fetch_assoc($executeQuery);
		
			$state_name = $stateRecord['state_name']; //retrieve state name
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
									value="<?php echo $row['senior_firstname']; ?>">
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
									value="<?php echo $row['senior_lastname']; ?>"
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
									<?php echo $input_status ?>
									value="<?php echo $row['senior_contact']; ?>">
							</div>
						</div>

						<div class="input_layer">
							<div class="input_label">
								<label>Email Address</label>
							</div>

							<div class="input_box">
								<input style="width: 240px;" type="email" name="txt_email" required <?php echo '$input_status'?> value= "<?php echo $row['senior_email'];?>">
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
								<?php echo $input_status ?>
								value="<?php echo $row['senior_addressline1']; ?>"
								style="width: 500px;">
						</div>
					</div>

					<div class="input_layer input_container">
						<div class="input_label">
							<label>Address Line 2</label>
						</div>
						<div class="input_box">
							<input type="text"
								name="txt_addressline2"
								<?php echo $input_status ?>
								value="<?php echo $row['senior_addressline2']; ?>"
								style="width: 500px;">
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
									required
									<?php echo $input_status ?>
									value="<?php echo $row['senior_password']; ?>">
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
									<?php echo $input_status ?>
									value="<?php echo $row['senior_postcode']; ?>"
									style="width: 100px;">
							</div>
						</div>

						<div class="input_layer">
							<div class="inputs_label">
								<label>State</label>
							</div>
							<div class="input_box">
								<?php if(isset($_POST['edit_button'])){ ?>
									<select name="state"
										style="padding:10px; font-size: 100%">
										<option value="Johor" <?php if($state_name == "Johor"){echo "selected";} ?>>Johor</option>
										<option value="Kedah" <?php if($state_name == "Kedah"){echo "selected";} ?>>Kedah</option>
										<option value="Kelantan" <?php if($state_name == "Kelantan"){echo "selected";} ?>>Kelantan</option>
										<option value="Malacca" <?php if($state_name == "Malacca"){echo "selected";} ?>>Malacca</option>
										<option value="Negeri Sembilan" <?php if($state_name == "Negeri Sembilan") {echo "selected";} ?>>Negeri Sembilan</option>
										<option value="Pahang" <?php if($state_name == "Pahang"){echo "selected";} ?>>Pahang</option>
										<option value="Penang" <?php if($state_name == "Penang"){echo "selected";} ?>>Penang</option>
										<option value="Perak" <?php if($state_name == "Perak"){echo "selected";} ?>>Perak</option>
										<option value="Perlis" <?php if($state_name == "Perlis"){echo "selected";} ?>>Perlis</option>
										<option value="Sabah" <?php if($state_name == "Sabah"){echo "selected";} ?>>Sabah</option>
										<option value="Sarawak" <?php if($state_name == "Sarawak"){echo "selected";} ?>>Sarawak</option>
										<option value="Selangor" <?php if($state_name == "Selangor"){echo "selected";} ?>>Selangor</option>
										<option value="Terengganu" <?php if($state_name == "Terengganu"){echo "selected";} ?>>Terengganu</option>
										<option value="Kuala Lumpur" <?php if($state_name == "Kuala Lumpur") {echo "selected";} ?>>Kuala Lumpur</option>
										<option value="Labuan" <?php if($state_name == "Labuan"){echo "selected";} ?>>Labuan</option>
										<option value="Putrajaya" <?php if($state_name == "Putrajaya"){echo "selected";} ?>>Putrajaya</option>
									</select>
									<?php
								}else { ?>
									<select name="state"
											required
											<?php echo $input_status ?>
											style="padding:10px; font-size: 100%">
										<option value="<?php echo $state_name; ?>"><?php echo $state_name; ?></option>
									</select>
									<?php
								} ?>

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

			if(isset($_POST['save_details'])){
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

				// echo $state_id;

				// echo'<br>';
				// echo $password . 'HI';
		
				$toupdateQuery = "UPDATE `senior` SET `senior_firstname`='$firstname',`senior_lastname`='$lastname',`senior_contact`='$contact',`senior_email`='$email',`senior_addressline1`='$addressline1',`senior_addressline2`='$addressline2',`senior_postcode`='$postcode',
				`senior_password`='$password',
				`state_id`='$state_id' WHERE `senior_id` = $id;";
				
				if(mysqli_query($connection, $toupdateQuery)) { 
					if($_SESSION['type'] == "Senior"){ ?>
						<script>
							alert('Update Successful');
							window.location.replace("my_profile.php");
						</script>
					<?php
					}elseif($_SESSION['type'] == "Admin"){ ?>
						<script>
							alert('Senior Account Updated Successful');
							window.location.replace("manage_users.php");
						</script>
					<?php
					}
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