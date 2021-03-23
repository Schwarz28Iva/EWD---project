<?php
// Initialize the session
session_start();
 

// Include config file
require_once "PHP/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
			//$param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){   
					mysqli_stmt_close($stmt);
					$sql = "SELECT id, username, password FROM users WHERE password = ?";
					
					if($stmt = mysqli_prepare($link, $sql)){
					// Bind variables to the prepared statement as parameters
						mysqli_stmt_bind_param($stmt, "s", $param_password);
            
						// Set parameters
						$param_password = $password;
            
						// Attempt to execute the prepared statement
						if(mysqli_stmt_execute($stmt)){
							// Store result
							mysqli_stmt_store_result($stmt);
                
							// Check if username exists, if yes then verify password
							if(mysqli_stmt_num_rows($stmt) == 1){

                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
						header("location: home.php");}
						else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }

            }
                 else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
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
<link href="css/form.css" rel="stylesheet" type="text/css" />

</head>
<body onload="startTime();myFunctionAlert()">

<div class="topnavlog" id="myTopnavlog">
	<img src="poze/logo.png" style="margin:0px 0px 0px 100px"> 
TheGamersField

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunctionlog()">&#9776;</a>
</div>


<div class="content" style="margin-top: 100px;">
	<p align="center" style="font-family:Impact,Charcoal,sans-serif;font-size:50px;color:white;">Log In</p>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<TABLE>
			<TR><div action="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
               <TD style="text-align:right;padding-right:10px;" width="50%"> <label>Username</label></TD>
               <TD> <input type="text" name="username" value="<?php echo $username; ?>">
                <?php echo "<font color=red size='3px'><br> $username_err </font>"; ?></TD>
            </div> 
			</TR>
			<TR>			
            <div action="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <TD style="text-align:right;padding-right:10px;"><label>Password</label></TD>
                <TD><input type="password" name="password" value="<?php echo $password; ?>">
                <?php echo "<font color=red size='3px'><br> $password_err </font>"; ?></TD>
            </div>
			</TR>
			<TR>
			<TD></TD>
			<TD>
            <div>
                <input type="submit" value="Login">
            </div>
			</TD>
			</TR>
		</TABLE>
        </form>
	<p style="color:white;">Don't have an account? <a href="register.php">Sign up now</a>.</p>
	<a href="home.php"><img style="margin-left:620px;"src="poze/chat.png"></a>
	<br>
	<a href="home.php"><img align="right" src="poze/cry.png"></a>
	<br>
	<br>
	<br>
	<br>
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