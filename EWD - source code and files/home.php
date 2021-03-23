<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/navigation_bar.css" rel="stylesheet" type="text/css" />
<link href="css/body.css" rel="stylesheet" type="text/css" />
<link href="css/slideshow.css" rel="stylesheet" type="text/css" />
<link href="css/login_bar.css" rel="stylesheet" type="text/css" />
<link href="css/news.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/digital_clock.css" rel="stylesheet" type="text/css" />

</head>
<body onload="startTime();myFunctionAlert()">


<div class="topnavlog" id="myTopnavlog">
	<img src="poze/logo.png" style="margin:0px 0px 0px 100px"> 
TheGamersField
  <div class="dropdownlog">
  <?php
  if(isset($_SESSION["loggedin"]) !== true){
	//if(isset($_SESSION["id"])){?>
	  <button class="dropbtnlog">My Account
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-contentlog">
      <a href="login.php">Log In</a>
  <a href="register.php">Sign In</a>
  </div>
	<?php } else {?>
	<button class="dropbtnlog">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! :)
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-contentlog">
      <a href="logout.php">Log Out</a>
  </div>
	<?php } ?>
  </div> 
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunctionlog()">&#9776;</a>
</div>



<div class="slideshow-container">
  <div class="mySlides fade">
    <a href="https://playoverwatch.com/en-us/" target="_blank"><img src="poze/slideshow1.jpg" style="width:100%"></a>
    <div class="text" style="top:10px;right:10px;text-align:right;font-size:40px;">Get prepared for <br> the summer <br> season!</div>
  </div>

  <div class="mySlides fade">
    <a href="https://playhearthstone.com/en-us/" target="_blank"><img src="poze/slideshow2.jpg" style="width:100%"></a>
    <div class="text" style="text-align:center;bottom:20px;font-size:40px;">Pricier every day</div>
  </div>

  <div class="mySlides fade">
    <a href="https://worldofwarcraft.com/en-us/" target="_blank"><img src="poze/slideshow3.jpg" style="width:100%">
    <div class="text" style="text-align:left;left:20px;top:20px;">Brave <br> the beyond</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
</div>


<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <a href="games.php">Games</a>
  <a href="shop.php">Shop</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>




<TABLE border=1px style="float:left; left:40px; position:relative;">
	<TR>
		<TD id="news" align=center>NEWS
		</TD>
	</TR>
	<TR>
		<TD>
		<div id="clockdate">
			<div class="clockdate-wrapper">
				<div id="clock"></div>
					<div id="date"></div>
			</div>
		</div>
		</TD>
	</TR>
	<TR>
		<TD>
		<div id="containerhome">
			<div id="outerdivhome">      
				<iframe id="innerdiv" src="https://www.newshub.co.nz/home/entertainment/gaming.html" scrolling="no" frameborder="0"></iframe>
			</div>
		</div>
		</TD>
	</TR>
</TABLE>


<iframe id="muzica" width="420" height="315" src="https://www.youtube.com/embed/0nlJuwO0GDs?start=16" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


<div style="font-size:30px;" class="content" align="center">
	<b>Hello there!</b>
<br>
<br><img src="poze/logo.png" style="margin:0px 0px 0px 100px"><titlefooter>TheGamersField</titlefooter> is a community made by gamers for gamers.
<br>
<br>Here we have the latest news in video gaming such as tournaments, pathces and game releases.
<br>
<br>Our members enjoy quick and free access to information about the lore and meta of their favourite games,
so if you are a competitive player you might find our website useful.
<br>
<br>Shopping enthusiasts and collectors are encouraged to browse our shop where they can find a wide variety of items from many different games.
<br>
<br>
<img src="poze/logo.png" style="margin:0px 0px 0px 100px"><titlefooter>TheGamersField</titlefooter> community welcomes new members with arms wide open. Join us!:)
<br>
<br>
<img src="poze/esport.png">
</div>


<div class="footer"><pfooter>
<TABLE align="center" width="65%"> 
<TR> 
	<TD height=50px width=50px><img src="poze/logo.png">
	<TD valign="bottom" width="57%"><titlefooter>TheGamersField</titlefooter>
	<TD>
	<TD align="right"><b><font size="+2">Have a question?</font></b>
<TR> 
	<TD>
	<TD>
	<TD height=30px width=30px><img src="poze/icon_map_marker.png">
	<TD> Everywhere, but especially, close to you.
<TR> 
	<TD>
	<TD>
	<TD height=30px width=30px><img src="poze/icon_team.png">
	<TD>You want to be a part of the team?
	<br>Go ahead, contact us!</br>
<TR> 
	<TD>
	<TD>
	<TD height=30px width=30px><img src="poze/icon_contact.png">
	<TD><A HREF = "mailto:indreivalentinaandreea@gmail.com" style="color:white">indreivalentinaandreea@gmail.com</A>
</TABLE>
</pfooter></div>

<script src="javascript/topnavlog_responsive.js"></script>
<script src="javascript/topnav_responsive.js"></script>
<script src="javascript/slideshow.js"></script>
<script src="javascript/digital_clock.js"></script>
<script src="javascript/alert.js"></script>
</body>
</html>