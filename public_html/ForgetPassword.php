<?php
    session_start();
    include('database_connection.php');
    if(isset($_POST['btn_reset_button'])){
        $email = $_POST['txt_username'];
    
        $seniorRetrieveQuery = "SELECT senior_id, senior_email, senior_lastname, senior_password, senior_type FROM senior WHERE senior_email = '$email'";
        $seniorRetrieveResults = mysqli_query($connection, $seniorRetrieveQuery);
        $seniorrow = mysqli_fetch_assoc($seniorRetrieveResults);
        $seniorcount = mysqli_num_rows($seniorRetrieveResults);
    
    
        $contractorRetrieveQuery = "SELECT contractor_id, contractor_email, contractor_lastname, contractor_password, contractor_type FROM contractor WHERE contractor_email = '$email';";
    	$contractorRetrieveResults = mysqli_query($connection, $contractorRetrieveQuery);
    	$contractorRow = mysqli_fetch_assoc($contractorRetrieveResults);
        $contractorCount = mysqli_num_rows($contractorRetrieveResults);
    
        $adminRetrieveQuery = "SELECT admin_id, admin_email, admin_lastname, admin_password, admin_type FROM admin WHERE admin_email = '$email';";
        $adminRetrieveResults = mysqli_query($connection, $adminRetrieveQuery);
        $adminRow = mysqli_fetch_assoc($adminRetrieveResults);
        $adminCount = mysqli_num_rows($adminRetrieveResults);
    
    
        if ($seniorcount == 1){
            {if($email == $seniorrow['senior_email']){ ?>
                <script>
    			    window.location.replace("ForgetPasswordChange.php");
    		    </script>
                <?php header("ForgetPasswordChange.php");
                $_SESSION['id'] = $seniorrow['senior_id'];
                $_SESSION['name'] = $seniorrow['senior_lastname'];
                $_SESSION['type'] = $seniorrow['senior_type'];
                $_SESSION['email'] = $seniorrow['senior_email'];
                mysqli_close($connection);
    
            }else{ ?>
                <script>
                    alert("Email not found.")
                </script>
                <?php
                }
            }
        }elseif ($contractorCount == 1){
            {if($email == $contractorRow['contractor_email']){ ?>
                <script>
    			    window.location.replace("ForgetPasswordChange.php");
    		    </script>
                <?php header("ForgetPasswordChange.php");
                $_SESSION['id'] = $contractorRow['contractor_id'];
                $_SESSION['name'] = $contractorRow['contractor_lastname'];
                $_SESSION['type'] = $contractorRow['contractor_type'];
                $_SESSION['email'] = $contractorRow['contractor_email'];
                mysqli_close($connection);
    
            }else{ ?>
                <script>
                    alert("Email not found.")
                </script>
                <?php
                }
            }
        }elseif ($adminCount == 1){
    
            {if($email == $adminRow['admin_email']){ ?>
                <script>
    			    window.location.replace("ForgetPasswordChange.php");
    		    </script>
                <?php header("ForgetPasswordChange.php");
                $_SESSION['id'] = $adminRow['admin_id'];
                $_SESSION['name'] = $adminRow['admin_lastname'];
                $_SESSION['type'] = $adminRow['admin_type'];
                $_SESSION['email'] = $adminRow['admin_email'];
                mysqli_close($connection);
    
            }else{ ?>
                <script>
                    alert("Email not found.")
                </script>
                <?php
                }
            }
        }else{
            header("Refresh: 2, url=register.php");
            mysqli_close($connection); ?>
            
            <script>
                alert("Record doesn't exist. Kindly register for an account.")
            </script>
            
            <?php
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Login</title>
    	<link rel="shortcut icon" href="images/homerepairjpeglogo.jpg" type="image/x-icon">
    	<link rel="stylesheet" href="Pre-Login_Header_Footer_styles.css">
    	<link rel="stylesheet" href="login_styles.css">
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
    					<a href="about_us.php">About Us</a>
    				</div>
    			</div>
    
    			<div class="flexbox header_right_section">
    
    			
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
    
    				
    			</div>
	    	</div>
	    </header>

		<div class="main">
			<div class="vertical_flex register_container" style="max-width: 600px;">
				<div>
					<img src="images/homerepairlogo.png" 
						alt="Home Repair Logo"
						title="Logo of Home Repair Department"
						width="160px"/>
				</div>

				<p class="welcome">Enter Email to reset password</p>

				<form action="#" method="POST">
					<div class="input_layer input_container">
						
						<div class="input_label">
							<label>Email Address</label>
						</div>

						<div class="input_box">
							<input type="text" name="txt_username" required placeholder="Enter your email address" style="width: 250px;">
						</div>

					</div>

					<div class="flexbox1">
						<div>
							<button type="submit" name="btn_reset_button">Reset Now!</button>
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

			<div class="footer_description">The best solution for elderlies' home repair problems.
			</div>

			<p align="center">Home Repair Department &copy;2023</p>

		</div>
	</footer>
</body>
</html>