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
<link href="css/flier.css" rel="stylesheet" type="text/css" />

</head>
<body onload="startTime();myFunctionAlert()">

<div class="flier"><img src="poze/Yuumi.png"></div>

<div class="topnavlog" id="myTopnavlog">
	<img src="poze/logo.png" style="margin:0px 0px 0px 100px"> 
TheGamersField
  <div class="dropdownlog">
  <?php
  if(isset($_SESSION["loggedin"]) !== true){
	?>
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
  <a href="home.php">Home</a>
  <a href="games.php" class="active">Games</a>
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
		<div id="containergames">
			<div id="outerdivgames">      
				<iframe id="innerdiv" src="https://www.newshub.co.nz/home/entertainment/gaming.html" scrolling="no" frameborder="0"></iframe>
			</div>
		</div>
		</TD>
	</TR>
</TABLE>


<iframe id="muzica" width="420" height="315" src="https://www.youtube.com/embed/aR-KAldshAE?start=14" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

<div class="content">

	<TABLE border align="center" width="85%"> 
		<TR> 
			<TD rowspan="2" height=300px width=200px><img src="poze/lol.jpg"></td>
			<TD align="center" style="font-family:Impact,Charcoal,sans-serif;text-transform:uppercase;font-size:50px;border:none;">League of Legends</td>
		</TR>
		<TR>
			<TD style="padding:20px;text-align:justify;text-indent:30px;border:none;">Whether you're playing Solo or Co-op with friends, League of Legends is a highly competitive, fast paced action-strategy game designed for those who crave a hard fought victory. League of Legends is a team-based strategy game where two teams of five powerful champions face off to destroy the other’s base. Choose from over 140 champions to make epic plays, secure kills, and take down towers as you battle your way to victory.</td>
		</tr>
	</table>
	<br>
	<TABLE border align="center" width="85%"> 
		<TR> 
			<TD rowspan="2" height=300px width=200px><img src="poze/overwatch.jpg"></td>
			<TD align="center" style="font-family:Impact,Charcoal,sans-serif;text-transform:uppercase;font-size:50px;border:none;">Overwatch</td>
		</TR>
		<TR>
			<TD style="padding:20px;text-align:justify;text-indent:30px;border:none;">Overwatch is a team-based multiplayer first-person shooter developed and published by Blizzard Entertainment. Described as a "hero shooter", Overwatch assigns players into two teams of six, with each player selecting from a roster of over 30 characters, known as "heroes", each with a unique style of play that is divided into three general roles that fit their purpose. Players on a team work together to secure and defend control points on a map or escort a payload across the map in a limited amount of time. Players gain cosmetic rewards that do not affect gameplay, such as character skins and victory poses, as they play the game. </td>
		</tr>
	</table>	
	<br>
	<TABLE border align="center" width="85%"> 
		<TR> 
			<TD rowspan="2" height=300px width=200px><img src="poze/hots.jpg"></td>
			<TD align="center" style="font-family:Impact,Charcoal,sans-serif;text-transform:uppercase;font-size:50px;border:none;">Heroes of the Storm</td>
		</TR>
		<TR>
			<TD style="padding:20px;text-align:justify;text-indent:30px;border:none;">Heroes of the Storm is a crossover multiplayer online battle arena video game developed and published by Blizzard Entertainment and released on June 2, 2015. The game features various characters from Blizzard's franchises as playable heroes, as well as different battlegrounds based on Warcraft, Diablo, StarCraft, and Overwatch universes. Blizzard does not call the game a "multiplayer online battle arena" or an "action real-time strategy" because they feel it is something different with a broader playstyle; they refer to it as an online "hero brawler".</td>
		</tr>
	</table>	
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