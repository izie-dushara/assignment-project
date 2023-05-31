<?php 
	session_start();
    include('database_connection.php');

	if(isset($_POST['submit'])){
		$service = $_POST['site'];
		$rating = $_POST['radio-button'];
		$review = $_POST['comments'];
		$insertQuery = "INSERT INTO `review`(`service_id`, `review`, `rating`) VALUES ('$service', '$review', '$rating');";
        if (mysqli_query($connection, $insertQuery)){ ?>
            <script>
                alert("Review Submitted.");
            </script>

            <?php
            }else{ ?>
                <script>
                    alert("Review failed.")
                </script>

                <?php
            }
        mysqli_close($connection);
    	}
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<title>Homepage</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" >
		<link rel="stylesheet" href="Pre-Login_Header_Footer_styles.css">
		<link rel="stylesheet" href="login_styles.css">
		<link rel="stylesheet" href="reviewform.css">
		<script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
		<!-- Add your custom HEAD content here -->

	</head>
	<body>
        <header>
    		<div class="header flexbox">
    			<div class="header_left_section">
    				<img class="home_repair_logo"
    					src="images/homerepairlogo.png"
    						alt="Home Repair Department Logo"
    						title="Logo of Home Repair Department"
    						width="150px"/>
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

		
		<main style="color:black">

			<div class="vertical_flex" 
				style="background-color: rgba(126, 114, 114, 0.171);
					padding-bottom: 70px;">
				<div class="text_align" 
					style="margin-top: 70px;
							margin-bottom: 50px;
							font-size: 130%;
							font-weight: 600;">Our Services</div>

				<div class="flexbox" 
					style="justify-content: space-evenly;
							margin: 0px 100px;">
					<div class="vertical_flex">
						<div>
							<img src="images/cleaning.png"
								alt="cleaning picture"
								title="Cleaning"
								width="100px"/>
						</div>
						<div class="text_align">Cleaning</div>
					</div>

					<div class="vertical_flex">
						<div>
							<img src="images/repairing.png"
								alt="cleaning picture"
								title="Cleaning"
								width="100px"/>
						</div>
						<div class="text_align">Repairing</div>
					</div>

					<div class="vertical_flex">
						<div>
							<img src="images/interior_design.png"
								alt="interior design picture"
								title="Interior Design"
								width="100px"
								height="100px"/>
						</div>
						<div class="text_align">Interior Design</div>
					</div>

					<div class="vertical_flex">
						<div>
							<img src="images/exterior_design.png"
								alt="interior design picture"
								title="Interior Design"
								width="100px"
								
								style="height: 100px; width: 100px;"/>
						</div>
						<div class="text_align">Exterior Design</div>
					</div>

				</div>
			</div>

			<div class="text_align" style="margin: 30px 0px;">
				<p style="background-color: rgb(126, 126, 126)">Why fix it yourself? Leave it to the pros.</p>
				<p style="background-color: rgb(126, 126, 126)">Book now, and we will be there.</p>
			</div>
				
			<div>
				<div style="background-color: rgba(126, 114, 114, 0.171)">
				
      			<p id="description">Tell us about your experience with Home Repair</p>

				<div class="container" >
      				<form id="survey-form" method="POST">
						<div class="labels">
						<label for="dropdown" style = "position:relative;  top:-19px;">Select a Service</label></div>
						<div class="input-tab">
						<select name="site" >Choose a Service
								<option value=1>Gardening</option>
								<option value=2>Basic Housekeeping</option>
								<option value=3>Advanced Housekeeping</option>
								<option value=4>Pest Control</option>
								<option value=5>Laundy & Dry Cleaning</option>
								<option value=6>Paint Job</option>
								<option value=7>Electrical</option>
								<option value=8>Air Conditioner</option>
								<option value=9>Plumbing</option>
								<option value=10>Furniture Repair</option>
								<option value=11>Smart & Smart Home Installation</option>
						</select>
						</div>
						
						<div class="labels">
						<label style = "position:relative;  top:-19px;">Rate our Service</label></div>
						<div class="input-tab">
							<input type="radio" name="radio-button" value="1">1<br>
							<input type="radio" name="radio-button" value="2">2<br>
							<input type="radio" name="radio-button" value="3">3<br>
							<input type="radio" name="radio-button" value="4">4<br>
							<input type="radio" name="radio-button" value="5">5<br>
						</div>
						
						<div class="labels">
						<label for="comments">Tell us about your review</label></div>
						<div class="input-tab">
						<textarea class="input-field" id="comments" name="comments" rows="10" cols="40" placeholder="Your comments..."></textarea></div>
						
						<div class="btn">
						<button id="submit" type="submit" name="submit">Submit</button>
						</div>
						
					</form>
					</div>
			</div>
			
		</main>
		
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