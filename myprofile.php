<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEC - OVP || MY PROFILE</title>
    <link id="theme" rel="stylesheet" href="light.css">
    <link rel="shortcut icon" href="../images/favicon-16x16.png" type="image/x-icon">

    <style>

        .hisimg {
            float: left;
            width: 30%;
            text-align: center;
            margin-top: 22px;
        }

        .details {
            width: 340px;
            margin: 0px auto;
        }

        .user {
            font-size: 22px;
            line-height: 60px;
            list-style: none;
            text-align: left;
        }

    </style>

</head>

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
                <input id="toggle" type="checkbox">
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
                    <li style="margin-left: 581px ;background-color:#850d0d;"><a  href=""><img id="acc" src="acc.png" alt="Acc"><?php echo $user_data['user_name'] ?></a>
                        <ul class="drop">
                            <li><a class="active" href="myprofile.php">My Profile</a></li>
                            <li><a href="changepass.php">Change Password</a></li>
                            <li><a href="logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="info">

            <h2>MY PROFILE</h2>
            <hr>
            <br>
            <center><img src="nec1.png" alt="NARAYANA" height="150px"></center>
            <div class="clearfix"></div>
            <br>

            <div class="details">
                <table class="user">
                    <tr><th>User Name </th>   <td>:</td>  <td><?php echo $user_data['user_name']; ?> </td></tr>

                    <tr><th>Email </th>   <td>:</td>  <td><?php echo $user_data['email']; ?> </td></tr>

                    <tr><th>Department </th>  <td>:</td>  <td><?php echo $user_data['dept']; ?> </td></tr>
                </table>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>

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