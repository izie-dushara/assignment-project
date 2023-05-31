<?php
	session_start();
	$id= $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>View Billings</title>
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
	
	    <div class="flex second_nav" >
		    <div class="second_nav_link">
				<a href="con_profile.php">My Profile</a>
			</div>
			<div class="second_nav_link">
				<a href="manage_bookings.php">Bookings</a>
			</div>

			<div class="second_nav_link">
				<a href="manage_appointments.php">Manage Appointments</a>
			</div>

			<div class="second_nav_link">
				<a href="manage_billings.php">Manage Billings</a>
			</div>
		</div>

		<div style="text-align: center"><h1>Invoice Manager</h1></div>

		<?php
			include('database_connection.php');
			$paymentQuery = "SELECT invoice.invoice_id, invoice.invoice_date, invoice.invoice_description, invoice.invoice_total FROM invoice WHERE contractor_id = $id ORDER BY invoice_id DESC;";
			$result = mysqli_query($connection, $paymentQuery); ?>

					<table width="auto" border="1" cellspacing="2" cellpadding="5" style="margin-left: auto; margin-right: auto; margin: 70px auto;">
						<tr>
							<th>ID</th>
							<th>Invoice Date</th>
							<th>Invoice Details</th>
							<th>Total Amount</th>
						</tr>
						<?php 
						while ($row = mysqli_fetch_assoc($result)){ ?>
							<tr>
								<td>
									<a href="my_bills.php?id=<?php echo $row['invoice_id'];?>">
										<?php echo $row['invoice_id'];?>
									</a>
								</td>	
								<td><?php echo $row['invoice_date'];?></td>	
								<td><?php echo $row['invoice_description'];?></td>
								<td><?php echo $row['invoice_total'];?></td>
							</tr>
						<?php } ?>	
					</table> 
					<?php

			mysqli_close($connection);	
	
		?>

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
				$description = $_POST['txt_description'];
				$total = $_POST['txt_total'];
		
				$toupdateQuery = "UPDATE `invoice` SET `invoice_description`='$description',`invoice_total`='$total' WHERE `invoice_id` = $id;";
				
				if(mysqli_query($connection, $toupdateQuery)) { ?>
					<script>
						alert('Update Successful');
						window.location.replace("con_profile.php");
					</script>

					<?php
				}else{ ?>
					<script> 
						alert('Update Failed.');
					</script>
					<?php
				}
			mysqli_close($connection);}
			
		?>
	</body>
</html>