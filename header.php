<div>
	<img id="logo" src="images/logo.png" onclick="window.location = 'index.php'" />
</div>

<div id="helloMsg">
	<?php if(isset($_SESSION['user'])) { ?>
	Logged as <a href="account.php"><?php echo $_SESSION['user']->getFirstName()." ".$_SESSION['user']->getLastName(); ?></a><br/>
	            <a href="account.php"><?php echo $_SESSION['user']->getEmail(); ?></a>
<?php } ?>
</div>
<div class="menu">   

	<link rel='stylesheet' href='css/menu.css'>
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js'></script>
	<script src='js/jquery.color-RGBa-patch.js'></script>
	<script src='js/menu.js'></script>       
	
    <ul class="group" id="menu1">
		<?php if(!isset($_SESSION['user'])) { ?>
		
			<li class="current_menu_item"><a href="index.php">Home</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Create account</a></li>
			
	    <?php }else {
					if($_SESSION['user']->getIsAdmin() == 0) { ?>
						
						<li class="current_menu_item"><a href="index.php">Home</a></li>
						<li><a href="account.php">My account</a></li>
						<li><a href="logbook.php">My logbook</a></li>
						<li><a href="planeRental.php">Plane rental</a></li>
						<li><a href="logout.php">Logout</a></li>
						
		<?php		}else { ?>

						<li class="current_menu_item"><a href="index.php">Home</a></li>
						<li><a href="account.php">My account</a></li>
						<li><a href="logbook.php">Logbooks</a></li>
						<li><a href="planeRental.php">Plane rental</a></li>
						<li><a href="manageMembers.php">Manage members</a></li>
						<li><a href="managePlane.php">Manage planes</a></li>
						<li><a href="logout.php">Logout</a></li>
		
		<?php		 }
				} ?>
    </ul>
        
</div>

<div id="caroussel" style="margin-top: -15px;">
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images">
<span><img src="data1/images/news1.jpg" alt="news1" title="news1" id="wows0"/></span>
<span><img src="data1/images/news2.jpg" alt="news2" title="news2" id="wows1"/></span>
<span><img src="data1/images/news3.jpg" alt="news3" title="news3" id="wows2"/></span>
</div>
<div class="ws_bullets">
<a title="news1"><img src="data1/tooltips/news1.jpg" alt="news1"/>1</a>
<a title="news2"><img src="data1/tooltips/news2.jpg" alt="news2"/>2</a>
<a title="news3"><img src="data1/tooltips/news3.jpg" alt="news3"/>3</a>
</div>
	</div>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
</div>

