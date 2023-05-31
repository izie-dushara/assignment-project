<?php
	session_start();
?>

</p><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Manage Users</title>
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
	
		<div class="flex second_nav" style="margin: 50px;">
			<div class="second_nav_link">
				<a href="admin_profile.php">My Profile</a>
			</div>
			<div class="second_nav_link">
				<a href="manage_users.php">Manage Users</a>
			</div>
		</div>

		<div style="text-align: center"><h1>User Record Manager</h1></div>

		<form action="#" method="GET">
			<div class="flex input container" style="justify-content: center;">
				<div class="input_layer" style="align-items: center; margin: 70px;">
					<div class="input_label">
						<label>Type of User:</label>
					</div>
					<div class="flex input_box" style="justify-content: center">
						<select name="sort_user" style="padding:10px; font-size: 100%">
							<option value="none">None</option>
							<option value="Admin">Admin</option>
							<option value="Contractor">Contractor</option>
							<option value="Senior">Senior</option>
						</select>
						<button type="submit" name="user_sort" style="padding: 0px; margin: 0px -1.5px; border: 0.1px solid rgba(118,118,118,255); border-radius: 0px;">
							<img src="images/search.png"
								width="40px";/>
						</button>
					</div>
				</div>


				<div class="input_layer" style="align-items: center; margin: 70px;">
					<div class="input_label">
						<label>Senior Search:</label>
					</div>
					<div class="flex input_box" style="justify-content: center">
						<input type="text"
							name="txt_keyword"
							placeholder="Input Keyword" style="border: 0.3px solid rgba(118,118,118,255);">
						<button type="submit" name="keyword_sort" style="padding: 0px; margin: 0px -1.5px; border: 0.3px solid rgba(118,118,118,255); border-radius: 0px;">
							<img src="images/search.png"
								width="40px";/>
						</button>
					</div>
				</div>


				<div class="input_layer" style="align-items: center; margin: 70px;">
					<div class="input_label">
						<label>Create User:</label>
					</div>
					<div class="flex input_box" style="justify-content: center">
						<select name="add_user" style="padding:10px; font-size: 100%">
							<option value="none">None</option>
							<option value="Admin">Admin</option>
							<option value="Contractor">Contractor</option>
							<option value="Senior">Senior</option>
						</select>
						<button type="submit" name="create_user" style="padding: 0px; margin: 0px -1.5px; border: 0.3px solid rgba(118,118,118,255); border-radius: 0px;">
							<img src="images/add.png"
								width="40px";/>
						</button>
					</div>
				</div>
			</div>
		</form>

		<?php
			include('database_connection.php');
			if(isset($_GET["user_sort"])){
				$sort_user = $_GET['sort_user'];
				if($sort_user == "Senior"){
					$seniorQuery = "SELECT senior.senior_id, senior.senior_firstname, senior.senior_lastname, senior.senior_contact, senior.senior_email, senior_addressline1, senior_addressline2, senior_postcode, state.state_name, senior.senior_registrationdate FROM senior INNER JOIN state ON senior.state_id = state.state_id ORDER BY senior_id DESC;";
					$result = mysqli_query($connection, $seniorQuery);?>

					<h2 style="text-align: center;">Senior List</h2>
					<table width="auto" border="1" cellspacing="2" cellpadding="5" style="margin-left: auto; margin-right: auto; margin: 70px auto;">
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Address Line 1</th>
							<th>Address Line 2</th>
							<th>Postcode</th>
							<th>State</th>
							<th>Registration Date</th>
						</tr>
						<?php 
						while ($row = mysqli_fetch_assoc($result)){ ?>
							<tr>
								<td>
									<a href="my_profile.php?id=<?php echo $row['senior_id'];?>">
										<?php echo $row['senior_id'];?>
									</a>
								</td>	
								<td><?php echo $row['senior_firstname'];?></td>	
								<td><?php echo $row['senior_lastname'];?>
								</td>
								<td><?php echo $row['senior_contact'];?></td>
								<td><?php echo $row['senior_email'];?></td>
								<td><?php echo $row['senior_addressline1'];?></td>
								<td><?php echo $row['senior_addressline2'];?></td>
								<td><?php echo $row['senior_postcode'];?></td>
								<td><?php echo $row['state_name'];?></td>
								<td><?php echo $row['senior_registrationdate'];?></td>
							</tr>
						<?php } ?>	
					</table> <?php

				}elseif($sort_user == "Admin"){
					$adminQuery = "SELECT admin_id, admin_firstname, admin_lastname, admin_email, admin_registrationdate FROM admin ORDER BY admin_id DESC;";
					$result = mysqli_query($connection, $adminQuery); ?>

					<h2 style="text-align: center;">Admin List</h2>
					<table width="auto" border="1" cellspacing="2" cellpadding="5" style="margin-left: auto; margin-right: auto; margin: 70px auto;">
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Registration Date</th>
						</tr>
						<?php 
						while ($row = mysqli_fetch_assoc($result)){ ?>
							<tr>
								<td><?php echo $row['admin_id'];?></td>	
								<td><?php echo $row['admin_firstname'];?></td>	
								<td><?php echo $row['admin_lastname'];?></td>
								<td><?php echo $row['admin_email'];?></td>
								<td><?php echo $row['admin_registrationdate'];?></td>
							</tr>
						<?php } ?>	
							</table> <?php
				}elseif($sort_user == "Contractor"){
					$contractorQuery = "SELECT contractor_id, contractor_firstname, contractor_lastname, contractor_contact, contractor_email, contractor_company, contractor_registrationdate FROM contractor ORDER BY contractor_id DESC;";
					$result = mysqli_query($connection, $contractorQuery);?>

					<h2 style="text-align: center;">Contractor List</h2>
					<table width="auto" border="1" cellspacing="2" cellpadding="5" style="margin-left: auto; margin-right: auto; margin: 70px auto;">
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Company</th>
							<th>Registration Date</th>
						</tr>
						<?php 
						while ($row = mysqli_fetch_assoc($result)){ ?>
							<tr>
								<td>
									<a href="con_profile.php?id=<?php echo $row['contractor_id'];?>">
										<?php echo $row['contractor_id'];?>
									</a>
								</td>	
								<td><?php echo $row['contractor_firstname'];?></td>	
								<td><?php echo $row['contractor_lastname'];?>
								</td>
								<td><?php echo $row['contractor_contact'];?></td>
								<td><?php echo $row['contractor_email'];?></td>
								<td><?php echo $row['contractor_company'];?></td>
								<td><?php echo $row['contractor_registrationdate'];?></td>
							</tr>
						<?php } ?>	
							</table> <?php
				}
				
			mysqli_close($connection);}
			

			if(isset($_GET['keyword_sort'])){
				$keyword = $_GET['txt_keyword'];
				$keyword = '%' . $keyword . '%';

				$searchQuery = "SELECT senior.senior_id, senior.senior_firstname, senior.senior_lastname, senior.senior_contact, senior.senior_email, senior_addressline1, senior_addressline2, senior_postcode, state.state_name, senior.senior_registrationdate FROM senior INNER JOIN state ON senior.state_id = state.state_id WHERE senior_email like '%$keyword%';";
				$result = mysqli_query($connection, $searchQuery);?>

				<h2 style="text-align: center;">Senior List</h2>
					<table width="auto" border="1" cellspacing="2" cellpadding="5" style="margin-left: auto; margin-right: auto; margin: 70px auto;">
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Contact</th>
							<th>Email</th>
							<th>Address Line 1</th>
							<th>Address Line 2</th>
							<th>Postcode</th>
							<th>State</th>
							<th>Registration Date</th>
						</tr>
						<?php 
						while ($row = mysqli_fetch_assoc($result)){ ?>
							<tr>
								<td>
									<a href="edit_senior.php?id=<?php echo $row['senior_id'];?>">
										<?php echo $row['senior_id'];?>
									</a>
								</td>	
								<td><?php echo $row['senior_firstname'];?></td>	
								<td><?php echo $row['senior_lastname'];?>
								</td>
								<td><?php echo $row['senior_contact'];?></td>
								<td><?php echo $row['senior_email'];?></td>
								<td><?php echo $row['senior_addressline1'];?></td>
								<td><?php echo $row['senior_addressline2'];?></td>
								<td><?php echo $row['senior_postcode'];?></td>
								<td><?php echo $row['state_name'];?></td>
								<td><?php echo $row['senior_registrationdate'];?></td>
							</tr>
						<?php } ?>	
					</table> <?php
				mysqli_close($connection);}
			

			if(isset($_GET['create_user'])){
				$add_user = $_GET['add_user'];
				if($add_user == "Admin"){ ?>
					<script>
						window.location.replace('add_admin.php');
					</script> <?php
				}elseif($add_user == "Contractor"){ ?>
					<script>
						window.location.replace('add_contractor.php');
					</script> <?php
				}elseif($add_user == "Senior"){ ?>
					<script>
						window.location.replace('register.php');
					</script> <?php
					}
			}
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
	</body>
</html>