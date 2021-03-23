<?php
// Include config file
require_once "PHP/config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $firstname = $lastname = $gender ="";
$username_err = $password_err = $confirm_password_err = $firstname_err = $lastname_err = $gender_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
	//Validate first name
	if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter a firstname.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE firstname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_firstname);
            
            // Set parameters
            $param_firstname = trim($_POST["firstname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                //if(mysqli_stmt_num_rows($stmt) == 1){
                   // $firstname_err = "This username is already taken.";
                //} else{
                $firstname = trim($_POST["firstname"]);
                //}
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    //Validate lastname
    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Please enter a lastname.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE lastname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_lastname);
            
            // Set parameters
            $param_lastname = trim($_POST["lastname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                $lastname = trim($_POST["lastname"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    //Validate gender
    if(empty(trim($_POST["gender"]))){
        $gender_err = "Please choose a gender.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE gender = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_gender);
            
            // Set parameters
            $param_gender = trim($_POST["gender"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                $gender = trim($_POST["gender"]);

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($firstname_err) && empty($lastname_err) &&empty($gender_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password,firstname,lastname,gender) VALUES (?, ?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_firstname, $param_lastname, $param_gender);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_gender = $gender;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
				
				
            } else{
                echo "Something went wrong. Please try again later.";
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
	<p align="center" style="font-family:Impact,Charcoal,sans-serif;font-size:50px;color:white;">Sign In</p>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<TABLE> 
	<TR >Please fill this form to create an account.</TR>
         <TR><div action="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
				<TD style="text-align:right; padding-right: 10px;" width="50%"><label>Username </label></TD>
                <TD><input type="text" name="username" value="<?php echo $username; ?>">
                <?php echo "<font color=red size='3px'><br> $username_err </font>"; ?></TD>
            </div>
		</TR>    
			
			<TR><div action="<?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                <TD style="text-align:right;padding-right:10px;"><label>First Name </label></TD>
                <TD><input type="text" name="firstname" value="<?php echo $firstname; ?>">
                <?php echo "<font color=red size='3px'><br> $firstname_err</font>"; ?></TD>
            </div></TR>
			
            <TR><div action="<?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                <TD style="text-align:right;padding-right:10px;"><label>Last Name </label></TD>
                <TD><input type="text" name="lastname" value="<?php echo $lastname; ?>">
                <?php echo "<font color=red size='3px'><br> $lastname_err </font>"; ?></TD>
            </div></TR>

            <tr><td style="text-align:right;padding-right:10px;">Gender </TD>
                <TD>    <input type="radio" name="gender" value="M" required>Male
                    <input type="radio" name="gender" value="F" required>Female
                </td>
            </tr>

            <TR><div action="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <TD style="text-align:right;padding-right:10px;"><label>Password </label></TD>
                <TD><input type="password" name="password" value="<?php echo $password; ?>">
                <?php echo "<font color=red size='3px'><br> $password_err </font>"; ?></TD>
            </div></TR>
            <TR><div action="<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <TD style="text-align:right;padding-right:10px;"><label>Confirm Password </label></TD>
                <TD><input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                <?php echo "<font color=red size='3px'><br> $confirm_password_err </font>"; ?></TD>
            </div></TR>
            <TR>
			<TD></TD>
			<TD><div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div></TD></TR>
	</TABLE>
	</form>
	<p style="color:white;">Already have an account? <a href="login.php">Login here</a>.</p>
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