<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "shop");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
}

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
  <a href="home.php">Home</a>
  <a href="games.php">Games</a>
  <a href="shop.php" class="active">Shop</a>
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


<iframe id="muzica" width="420" height="315" src="https://www.youtube.com/embed/UOxkGD8qRB4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


<div class="content">
	<br />
	<?php
	if(isset($_SESSION["loggedin"]) !== true){
    ?>
	<p style="color:white;" align="center">An account is required in order to order from our shop.</p>
	<?php } else {?>
			<br />
			<table border="1" style="color:black;background-color:#DCDCDC; border-color:#DCDCDC;">
				<TR>
					<td colspan="5" align="center" style="color:black; font-size: 25px;font-weight: bold;"> Order Details</td>
				</TR>
					<tr style="background-color:#F1EFEF;">
						<td width="40%"><b>Item Name</b></th>
						<td width="10%"><b>Quantity</b></th>
						<td width="20%"><b>Price</b></th>
						<td width="15%"><b>Total</b></th>
						<td width="5%"><b>Action</b></th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="shop.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span  style="color:#ff6666;">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right"></td>
						<td align="right">Total $ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
			</table>
		<?php } ?>
		<br>
		<br>
		<div class="container" >
			<?php
				$query = "SELECT * FROM shop ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div style="float:left;">
				<form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="margin:10px; width:270px;border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; color:black;" align="center">
						<img width="230px" height="160px" src="MySQL/PozeShop/<?php echo $row["image"]; ?>"  /><br />

						<h4><?php echo $row["name"]; ?></h4>

						<?php echo $row["game"]; ?>

						<h4>$ <?php echo $row["price"]; ?></h4>
						<?php
	if(isset($_SESSION["loggedin"]) == true){
	?>
						<input type="text" style="width:40px;" name="quantity" value="1"  /> 
				<?php } ?>
						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
		<?php
		if(isset($_SESSION["loggedin"]) == true){
		?>
						<input type="submit" name="add_to_cart" style="margin-top:5px;" value="Add to Cart" />
					<?php } ?>	
					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			
	</div>
	<div style="clear:both;"></div>
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