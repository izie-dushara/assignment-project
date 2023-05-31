<?php
    session_start();
    include 'database_connection.php';
    error_reporting(0);
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
        <script>
            function checkPassword(){
                var password = document.getElementById("new").value;
                var confirmPass = document.getElementById("txt_con").value;
                if (password != confirmPass){
                    document.getElementById("new").value = "";
                    document.getElementById("txt_con").value = "";
                    alert("Password not match! Try Again!");
                    return false;
                }
            }
        </script>
        <?php
            if(isset($_POST["reset_password_btn"])){
                $email = $_SESSION["email"];
                $pass = $_POST['new'];
                $conf = $_POST['txt_con'];
                
                $seniorquery = "UPDATE `senior` SET `senior_password` = '$pass' WHERE senior_email = '$email' ";
                $seniorretrieveResults = mysqli_query($connection, $seniorquery);
                $seniorRow = mysqli_fetch_assoc($seniorretrieveResults);
                $seniorcount = mysqli_num_rows($seniorretrieveResults);
                
                echo $seniorcount;
                echo $seniorRow['senior_email'];
                
                $adminquery = "UPDATE `admin` SET `admin_password` = '$pass' WHERE admin_email = '$email' ";
                $adminretrieveResults = mysqli_query($connection, $adminquery);
                $adminRow = mysqli_fetch_assoc($adminretrieveResults);
                $admincount = mysqli_num_rows($adminretrieveResults);
                
                $contractorquery = "UPDATE `contractor` SET `contractor_password` = '$pass' WHERE contractor_email = '$email' ";
                $contractorretrieveResults = mysqli_query($connection, $contractorquery);
                $contractorRow = mysqli_fetch_assoc($contractorretrieveResults);
                $contractorcount = mysqli_num_rows($contractorretrieveResults);
            
                
        if($seniorcount == 2){
            {if(mysqli_query($connection, $seniorquery)){?>
                <script>
                    window.location.replace("Passwordbreak.php");
                </script>
                <?php mysqli_close($connection);?>
            <?php }else{ ?>
                <script>
    				alert("Looks like cannot perform magic to you.")
    			</script>
            <?php }
            }
        
        }elseif($admincount == 2){ 
            {if(mysqli_query($connection, $adminquery)){?>
                <script>
                    window.location.replace("Passwordbreak.php");
                </script>
                <?php mysqli_close($connection);?>
            <?php }else{?>
                <script>
    				alert("Looks like cannot perform magic to you.")
    			</script>
            <?php }
            }
        
        }elseif ($contractorcount == 2){ 
            {if(mysqli_query($connection, $contractorquery)){?>
                <script>
                    window.location.replace("Passwordbreak.php");
                </script>
                <?php mysqli_close($connection);?>
            <?php }else{?>
                <script>
                    alert("Looks like cannot perform magic to you.")
                </script>
            <?php }
            }
        }else{?>
            <script>
                window.location.replace("Passwordbreak.php");
            </script>;
            <?php mysqli_close($connection);?>
    
            <script>
        		alert("Looks like didn't have record, key in other email again or contact admin.")
        	</script>
            <?php }
        }
    
   ?>     
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

				<p class="welcome">Key in the new password!</p>

				<form action="#" method="POST">
					<div class="input_layer input_container">
						
						<div class="input_label">
							<label>New Password</label>
						</div>

						<div class="input_box">
							<input type="password" name="new" required placeholder="Enter new password" style="width: 250px;">
						</div>

					</div>

					<div class="input_layer input_container">

						<div class="input_label">
							<label>Confirm Password</label>
						</div>

						<div>
							<input type="password" name="txt_con" required placeholder="Enter confirm password" style="width: 250px;">
						</div>

					</div>

					<div class="flexbox">
						<div>
							<button type="submit" name="reset_password_btn">Reset</button>
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