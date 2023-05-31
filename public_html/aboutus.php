<?php 
	session_start();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<title>About Us</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" >
		<link rel="stylesheet" href="Pre-Login_Header_Footer_styles.css">
		<link rel="stylesheet" href="login_styles.css">
		<link rel="stylesheet" href="aboutus.css">
        <link rel="stylesheet" href="aboutusglobal.css">
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
        <div class="group-div" style = "position:relative; left:35px;">


</script>    
     <p class="since-1991-home"><br><br><br><br><br><br><br>
	 <div class="w3-content w3-display-container">
			<center>
			<img class="mySlides" src="images/img1.png" style="width:1000px">
			<img class="mySlides" src="images/img2.png" style="width:1000px">
			<img class="mySlides" src="images/img3.png" style="width:1000px">
		   </div>
		   <script>
		   var myIndex = 0;
		   carousel();
		   function carousel() {
		     var i;
		     var x = document.getElementsByClassName("mySlides");
		     for (i = 0; i < x.length; i++) {
		       x[i].style.display = "none";  
		     }
		     myIndex++;
		     if (myIndex > x.length) {myIndex = 1}
		     x[myIndex-1].style.display = "block";
		     setTimeout(carousel, 2000); // Change image every 2 seconds
		   }
		   </script>
		   <br><br><br>
	 <p>
		<center>
	 Home retail for elderly people is an increasingly important industry as the population ages.<p>
	 With many elderly people choosing to age in place rather than move to a care facility, there is a growing need for products that can help seniors live independently and safely in their homes.<p>
	 Home retail for elderly people typically includes a wide range of products, from mobility aids and medical supplies to household items designed for ease of use and safety.<p>
	 These products can help seniors maintain their independence and improve their quality of life, while also providing peace of mind for their families and caregivers.<p>
	 Additionally, many home retail companies for elderly people offer installation services and personalized consultations to ensure that seniors have the right products to meet their unique needs.<p>
	 As the demand for home retail for elderly people continues to grow, it is essential for companies to provide high-quality, affordable, and accessible products and services to meet the needs of this important and growing demographic.<p>
	 Our beliefs truly set Home Repair apart as a provider of home repair services because they are rooted in a long-standing commitment to thepeople we serve.
      <div class="our-founders-div">ABOUT US</div>
          <div class="content-div">
            <div class="button-secondary-div">
              <div class="background-div1"></div>
              <div class="text-div">Learn More</div>
            </div>
            <div class="subtitle-div">
              <p class="since-1991-home"></p>
        </div>
      </div>
      <div class="group-div2">
        <div class="rectangle-div4"></div>
        <div class="all-work-guaranteed-in-writing">
          <p class="since-1991-home">All Work</p>
          <p class="since-1991-home">Guaranteed in</p>
          <p class="our-mission-is">Writing</p>
        </div>
        <div class="insured-div">Insured</div>
        <div class="advanced-technology-div">
          <p class="since-1991-home">Advanced</p>
          <p class="our-mission-is">Technology</p>
        </div>
        <div class="craftsmen-are-background-check">
          <p class="since-1991-home">Craftsmen are</p>
          <p class="since-1991-home">Background</p>
          <p class="our-mission-is">Checked</p>
        </div>
        <div class="group-div3">
          <img class="image-4-icon" alt="" src="public/image-4@2x.png" /><img
            class="image-5-icon"
            alt=""
            src="public/image-4@2x.png"
          /><img class="image-6-icon" alt="" src="public/image-4@2x.png" /><img
            class="image-7-icon"
            alt=""
            src="public/image-4@2x.png"
          />
        </div>
        <div class="why-choose-home-repair">Why Choose Home Repair?</div>
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