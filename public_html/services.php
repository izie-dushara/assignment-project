<?php 
	session_start();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<title>Services</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" >
		<link rel="stylesheet" href="Pre-Login_Header_Footer_styles.css">
    <link rel="stylesheet" href="login_styles.css">
    <link rel="stylesheet" href="servicesglobal.css">
    <link rel="stylesheet" href="servicesindex.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap"
    />
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
    <center>
        
       

        <?php
            if(empty($_SESSION['type'])){ ?>
                <a href="login.php" style = "position:relative; center;">
                  <button>Book Now</button>
                </a> <?php
            }elseif($_SESSION['type'] = "Senior") {?>
                 <a href="booking.php" style = "position:relative; center;">
                  <button>Book Now</button>
                </a> <?php
            }elseif($_SESSION = "Admin" or $_SESSION = "Contractor") {?>
                <button>Book Now</button> <?php
            }
        ?>
        

            
        
    </center>
    <div class="frame-div" style = "position:relative; left:35px;">
        <img class="image-26-icon" alt="" src="public/image-26@2x.png" /><img
          class="image-27-icon"
          alt=""
          src="public/image-27@2x.png"
        /><b class="home-repair-offers-professiona"
          >Home Repair offers professional gardening, house cleaning, pool
          maintance, pest control, laundry and dry cleaning for older adults and
          their families.</b
        ><b class="at-home-repair-we-clean-up-an"
          >At Home Repair, we clean up any and all debris, leaves, and garbage
          that may be scattered around the yard. We remove these items so that
          your lawn, flower beds, and plants have access to the essentials. All
          plant life needs air, sun, and water to thrive.</b
        ><img class="image-28-icon" alt="" src="public/image-28@2x.png" /><img
          class="image-30-icon"
          alt=""
          src="public/image-30@2x.png"
        /><img class="image-31-icon" alt="" src="public/image-31@2x.png" /><b
          class="home-repair-offers-professiona1"
          >Home Repair offers professional electrians, smart home installation and
          plumber for older adults and their families.</b
        ><img class="image-32-icon" alt="" src="public/image-32@2x.png" /><img
          class="image-33-icon"
          alt=""
          src="public/image-33@2x.png"
        /><b class="at-the-home-repair-our-electr"
          ><p class="at-the-home">
            At the Home Repair, our electrical handyman can complete a variety of
          </p>
          <p class="at-the-home">
            jobs within your home. Our services produce high-quality results from
            all projects,
          </p>
          <p class="at-the-home">
            from installing lighting to generators. Our small jobs cover a
            variety, such as installing
          </p>
          <p class="at-the-home">
            or repairing outlets, switches, and other electrical fixtures. If you
            are in need of a light
          </p>
          <p class="fixture-or-fan">
            fixture or fan installation, we can do that too.
          </p></b
        ><b class="our-craftspeople-are-available"
          ><p class="at-the-home">
            Our craftspeople are available to accomplish any task or repair, as
            stated
          </p>
          <p class="at-the-home">
            in our jobs list below, if you require Home Repairing’s plumbing
            services.
          </p>
          <p class="at-the-home">
            Whether an upgrade, replacement, repair, or installation is required,
            our home
          </p>
          <p class="at-the-home">
            plumbing services are available to assist our valued customers. We can
            do any
          </p>
          <p class="at-the-home">
            project in the house, including bathrooms, kitchens, basements,
            utility closets,
          </p>
          <p class="fixture-or-fan">and water lines.</p></b
        ><img class="image-34-icon" alt="" src="public/image-34@2x.png" /><img
          class="image-35-icon"
          alt=""
          src="public/image-35@2x.png"
        /><b class="home-repair-offers-professiona2"
          >Home Repair offers professional furniture repair and painting for older
          adults and their families.</b
        ><b class="our-craftspeople-at-handyman-c"
          ><p class="at-the-home">
            Our craftspeople at Handyman Connection provide a variety of painting
          </p>
          <p class="at-the-home">
            services to our customers. Whether your required jobs are inside or
            outside
          </p>
          <p class="at-the-home">
            of your home, our handymen will handle the job with their practiced
            expertise
          </p>
          <p class="at-the-home">
            and quality results. Projects to be completed inside the home include
            interior
          </p>
          <p class="fixture-or-fan">
            painting any rooms, hallways, or ceilings.
          </p></b
        ><b class="we-offer-all-type-of-upholster"
          ><p class="at-the-home">
            We offer all type of upholstery services. For any idea for building a
            new one, modifying, repairing or restoration, please pass it to us and we will
            make real and up to your expectation.
          </p>
          <p class="at-the-home">
            
          </p>
          <p class="fixture-or-fan"></p></b
        ><img class="image-36-icon" alt="" src="public/image-36@2x.png" /><img
          class="image-37-icon"
          alt=""
          src="public/image-37@2x.png"
        /><img class="image-38-icon" alt="" src="public/image-38@2x.png" />
        <div class="group-div">
          <div class="rectangle-div"></div>
          <img
            class="pngtreeide-template-logo-real"
            alt=""
            src="public/pngtreeide-template-logo-real-estat-5268084-1@2x.png"
          />
        </div>
        <b class="home-repair-offers-professiona3"
          >Home Repair offers professional painting on exterior of property and
          renovating for older adults and their families.</b
        ><b class="our-work-is-performed-by-exper"
          ><p class="at-the-home">
            Our work is performed by experienced contractors and craftsmen
          </p>
          <p class="at-the-home">
            who will make sure you’re happy with your home remodel or renovation
          </p>
          <p class="fixture-or-fan">
            from start to finish. Call or request an estimate to get started
            today.
          </p></b
        ><b class="youd-be-surprised-at-how-much"
          ><p class="at-the-home">
            You’d be surprised at how much difference a fresh coat of paint can
            make. But
          </p>
          <p class="at-the-home">
            whether you’re purchasing a new house or simply wish to add some color
            to your
          </p>
          <p class="at-the-home">
            old, most house painting projects tend to be pretty big and costly.
            When it comes
          </p>
          <p class="fixture-or-fan">
            to Home Repair painting service, you are getting the best service.
          </p></b
        ><img class="image-39-icon" alt="" src="public/image-39@2x.png" /><img
          class="image-40-icon"
          alt=""
          src="public/image-40@2x.png"
        />
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
