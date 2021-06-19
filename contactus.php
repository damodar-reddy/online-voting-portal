<?php
session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);
    $username=$user_data['user_name'];    

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$subject = $_POST['subject'];
		$msg = $_POST['msg'];

		if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($msg) )
		{

			$query = "insert into contactus (user_name,name,email,phone,subject,message) values ('$username','$name','$email','$phone','$subject','$msg')";

			mysqli_query($con, $query);

            echo "<script>alert('submitted sucessfully');</script>";
		}else
		{
			echo "<script>alert('Enter your details');</script>";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEC - OVP || CONTACT US</title>
    <link id="theme" rel="stylesheet" href="light.css">
    <link rel="shortcut icon" href="favicon-16x16.png" type="image/x-icon">
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
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="">ABOUT US</a>
                        <ul class="drop">
                            <li><a href="inthis.php">INSTITUTION HISTORY</a></li>
                            <li><a href="mv.php">MISSION & VISION</a></li>
                            <li><a href="orgchart.php">ORGANISATION CHART</a></li>
                        </ul>
                    </li>
                    <li><a href="votenow.php">VOTE NOW</a></li>
                    <li><a  href="myvotings.php">MY VOTINGS</a></li>
                    <li><a  class="active" href="contactus.php">CONTACT US</a></li>
                    <li style="margin-left: 581px;"><a href=""><img id="acc" src="acc.png" alt="Acc"><?php echo $user_data['user_name'] ?></a>
                        <ul class="drop">
                            <li><a href="myprofile.php">My Profile</a></li>
                            <li><a href="changepass.php">Change Password</a></li>
                            <li><a href="logout.php">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="cu">
            <div class="subheading">
                <h3>CONTACT US</h3>
            </div>
            <form class="contus" method="POST" id="contact_form">
                <table class="cutable" cellpadding="6px" cellspacing="5px">
                    <tbody>
                        <tr>
                            <td>name</td>
                            <td><input type="text" name="name" id="name"></td>
                        </tr>
                        <tr>
                            <td>email</td>
                            <td><input type="email" name="email" id="email"></td>
                        </tr>

                        <tr>
                            <td>mobile no</td>
                            <td><input type="tel" name="phone" id="phone"></td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td><input type="text" name="subject" id="subject"></td>
                        </tr>
                        <tr>

                            <th> Message : </th>
                            <td><textarea name="msg" id="msg" cols="27" rows="4" placeholder="Your Concern"
                                    value=""></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <center><input  type="submit" value="Submit" id="contact_btn" ></center>
            </form>

        </div>
         
        <div class="map">
            <h3>GOOGLE MAP</h3>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3863.896635319033!2d79.994861!3d14.433120000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf05f6444b57e81b1!2sNARAYANA%20ENGINEERING%20COLLEGE%2C%20NELLORE.!5e0!3m2!1sen!2sin!4v1621874724904!5m2!1sen!2sin"
                width="700" height="320" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
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