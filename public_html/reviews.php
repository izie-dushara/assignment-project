<?php
    session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<title>Reviews</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" >
		<link rel="stylesheet" href="Pre-Login_Header_Footer_styles.css">
		<link rel="stylesheet" href="login_styles.css">
		<link rel="stylesheet" href="reviewform.css">
		<link rel="stylesheet" href="reviewtable.css">
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

        <main>
            <?php 
                include('database_connection.php');

                $retrieveQuery = "SELECT service.service_name, review, rating from review inner join service on service.service_id = review.service_id order by review_id desc";
                $result = mysqli_query($connection, $retrieveQuery);
            ?>
            <div class ="table10" style="margin-top: 50px;">
            <center><h1>Customer Reviews</h1></center>
            <table width="auto" border="1" cellspacing="2" cellpadding="5" style="margin-left: auto; margin-right: auto; margin: 70px auto;">
            <tr>
                <th>Service</th>
                <th>Review</th>
                <th>Rating</th>
            </tr>
            <?php
            while ($row= mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['service_name']; ?></td>
    		        <td><?php echo $row['review']; ?></td>
    		        <td><?php echo $row['rating']; ?></td>
		        </tr>
		        <?php }?> 
		    </table><?php
		    mysqli_close($connection);
		    ?>
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