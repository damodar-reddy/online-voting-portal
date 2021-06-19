<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $query = "select * from candidates ";
	$cname = mysqli_query($con,$query);
    $query = "select * from notifications";
	$notifications = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEC - OVP || Home</title>
    <link id="theme" rel="stylesheet" href="light.css">
    <link rel="shortcut icon" href="favicon-16x16.png" type="image/x-icon">
</head>

<body onload="showSlides()">

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
                    <li><a href="index.php"  class="active">HOME</a></li>
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


    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="bgi" style="background-image: url(necn2.jpg);"><h1></h1></div>
        </div>
          
        <div class="mySlides fade">
            <div class="bgi" style="background-image: url(necn3.jpg);"><h1></h1></div>
        </div>

        <div class="mySlides fade">
            <div class="bgi" style="background-image: url(necn1.jpg);"><h1></h1></div>
        </div>
          
    </div>


    <div class="container">

        <div class="online-vote">
            <marquee behavior="scroll" direction="left" scrollamount="10">
             <p>
                 An <b>online voting portal</b> is a software platform that allows us to securely conduct
                 elections. It is a high-quality online voting system which provides ballot security, accessibility, and the overall
                 requirements of a voting event.
             </p>
            </marquee>
        </div>

         <div class="info">
            <h2>Welcome to Narayana Engineering College, Nellore</h2>
            <p>
                NARAYANA EDUCATIONAL INSTITUTIONS are one of the best education providers in India from the pre-primary
                to
                professional post graduation, have been successful in an uninterrupted and dedicated task. We proudly
                accept
                that ocean of parents dreams came into reality by our uncompromising education system, which is taken up
                for
                the cause of educating young minds. PADDY TOWN – NELLORE The historic town of Nellore in India's
                southernmost state, Andhra Pradesh, has long been known for its magnificent Paddy fields and ancient
                temple.
                This town is now also known as the city of Education, where there are no of educational institutions,
                renowned hospital and medical college. This town has produced many scholars, doctors, leaders and etc.
                Most
                of the students in Andhra Pradesh prefer to study in Nellore, because it now became a place to studies.
            </p>
        </div>

        <br>

        <div class="candidates">
            <h3>Candidate Details</h3>
            <ul>

                <?php
                while($row = mysqli_fetch_array($cname))
                {
                echo "<li><a href= '" . $row['details'] . "' target=_blank >". $row['candidate_name'] . "</a></li>";
                }
                ?>
                
            </ul>
        </div>

        <div class="rules">
            <h3>Rules and Regulations</h3>
            <p>
                <ol>

                    <li>Every individual must cast their vote.</li>
                    <li>Everyone should upload a photo with ID card for verification.</li>
                    <li>One individual can vote only once.</li>
                    <li>Voting should be done between 9 AM - 5 PM.</li>
                    <li>Voted casted before or after the allocated time will not be considered</li>
                </ol>
            </p>
        </div>

        <div class="notification">
            <h3>Notification Details</h3>
            <marquee behavior="scroll" direction="up" scrollamount="5" onMouseOver="this.stop()" onMouseOut="this.start()">
                <ul>
                    <?php
                        while($row = mysqli_fetch_array($notifications))
                        {
                        echo "<li><a href= '" . $row['details'] . "' target=_blank >" . $row['notification'] . "</a></li>";
                        }
                    ?>
                </ul>
            </marquee>
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