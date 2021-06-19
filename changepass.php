
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="theme" rel="stylesheet" href="light.css">
    <link rel="shortcut icon" href="favicon-16x16.png" type="image/x-icon">
    <title>NEC - OVP || CHANGE PASSWORD</title>

    <style>
        .chanpass {
            font-size: 20px;
        }
    </style>

</head>

<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $username=$user_data['user_name'];

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$con_pass = $_POST['con_pass'];

        if(!empty($old_pass) && !empty($new_pass) && !empty($con_pass) )
		{
            if($old_pass===$user_data['password'])
            {
                if($con_pass===$new_pass)
                {
                    $query = "update users set password = '$new_pass' WHERE user_name= '$username' ";

			        mysqli_query($con, $query); 
                    
                    echo "<script>window.alert('Your password has been changed');</script>";
                }
                else{
                    echo "<script>window.alert('Missmatch New Password');</script>";
                }
            }
            else{
                echo "<script>window.alert('Incorrect Old Password');</script>";
            }
        }
    }

   
?>



<body>

<div class="container">
        <header>
            <div class="b2">
                <img src="b2.png" alt="nec">
            </div>
            <div class="heading">
                <h1>NARAYANA ENGINEERING COLLEGE</h1>
                <h3>ONLINE VOTING PORTAL</h3>
            </div>

            <label class="switch">
                <input id="toggle" type="checkbox" >
                <span class="slider round"></span>
              </label>
        </header>

        <div class="clearfix"></div>
    </div>



    <div id="nav">
        <div class="container">
            <nav class="navbar">
                <ul>
                    <li><a href="index.php"  >HOME</a></li>
                    <li><a  href="">ABOUT US</a>
                        <ul class="drop">
                            <li><a  href="inthis.php">INSTITUTION HISTORY</a></li>
                            <li><a href="mv.php">MISSION & VISION</a></li>
                            <li><a href="orgchart.php">ORGANISATION CHART</a></li>
                        </ul>
                    </li>
                    <li><a href="votenow.php">VOTE NOW</a></li>
                    <li><a href="myvotings.php">MY VOTINGS</a></li>
                    <li><a href="contactus.php">CONTACT US</a></li>
                    <li style="margin-left: 581px;background-color:#850d0d;"><a href=""><img id="acc" src="acc.png" alt="Acc"><?php echo $user_data['user_name'] ?></a>
                        <ul class="drop">
                            <li><a href="myprofile.php">My Profile</a></li>
                            <li><a class="active" href="changepass.php">Change Password</a></li>
                            <li><a  href="logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div>
        <form class="chanpass" method="POST">

            <br><br><br>
            <table class="chanpassform" align="center" class="table" cellspacing="8px" cellpadding="12px">
                <tr>
                    <th>Enter Old Password&nbsp; : </th>
                    <td><input type="password" name="old_pass" id="old_pass" required></td>
                </tr>
                <tr>
                    <th>Enter New Password&nbsp; : </th>
                    <td><input type="password" name="new_pass" id="new_pass" required></td>
                </tr>
                <tr>
                    <th>Confirm New Password&nbsp; : </th>
                    <td><input type="password" name="con_pass" id="con_pass" required></td>
                </tr>
                <tr>
                    <th colspan="4"><input id="login_btn" type="submit" value="Submit" id="fp_btn"></td>
                </tr>

            </table>
        </form>
    </div>

    <footer>
        <div class="footer">
            <div class="fcontainer">

                <div class="batch">
                    <img src="b2.png">
                </div>

                <div class="follow">
                    <h5>Follow</h5>
                    <a href="https://www.facebook.com/lokx.dvaram" target="_blank">Facebook<img src="fb.png"></a> <br>
                    <a href="https://www.instagram.com/lokx0147/" target="_blank">Instagram<img src="ins.png"></a> <br>
                    <a href="https://twitter.com/lokx0147" target="_blank">Twitter<img src="twitter.png"></a><br>
                </div>

                <div class="contact">
                    <h5>Contact</h5>
                    <a href="mailto:dlokx0147@gmail.com" target="_blank">Mail<img src="mail.png"></a> <br>
                    <a href="tel:888-512-3505" target="_blank">Call <img src="ph.png" alt=""></a><br>
                </div>

                <div class="legal">
                    <h5>Legal</h5>
                    <a href="https://www.legalandgeneral.com/privacy-policy/" target="_blank">Terms<img
                            src="terms.png"></a> <br>
                    <a href="https://www.legalandgeneral.com/privacy-policy/" target="_blank">Privacy<img
                            src="privacy.png"></a> <br>
                </div>

                <div class="visit">
                <h5>Visit <img src="loc.png" alt="loc"></h5>
                <a href="https://www.google.com/maps/place/NARAYANA+ENGINEERING+COLLEGE,+NELLORE./data=!4m5!3m4!1s0x3a4cf3450acca9a1:0xf05f6444b57e81b1!8m2!3d14.4331203!4d79.9948608?authuser=0&hl=en&rclk=1" target="_blank"><pre>Off NH-5, Muthukur Rd,
near Apollo Hospital,
A.K. Nagar,Nellore,
Andhra Pradesh 524004</pre></a>
            </div>

            </div>

            <div class="clearfix"></div>

            <div class="rights">
                <h6> &copy; BATCH B2 - ALL RIGHTS RESERVED</h6>
            </div>

        </div>
    </footer>

    <script src="js.js"></script>

</body>
</html>