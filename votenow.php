<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEC - OVP || Vote Now</title>
    <link id="theme" rel="stylesheet" href="light.css">
    <link rel="shortcut icon" href="favicon-16x16.png" type="image/x-icon">
</head>
<?php
session_start();
    include("connection.php");
    include("functions.php");

    $sub_display=1;

	$user_data = check_login($con);
    $election="select * from election where id = '1' limit 1";
    $result = mysqli_query($con, $election);
    if($result && mysqli_num_rows($result) > 0)
		{
			$type= mysqli_fetch_assoc($result)['type'];
        }
    $voted=vote($user_data,$con);
    $name=$user_data['user_name'];
    $mail=$user_data['email'];

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
      
		if(!empty($_POST['candidate_selected']))
		{
            $candidate_selected = $_POST['candidate_selected'];
            $myvotings=votings($con,$name);
            if ($myvotings) {
                $query = "insert into $name (election) values ('$type')";
                
                mysqli_query($con, $query);
            }
            else{
                $query = "create table $name(
                    id bigint AUTO_INCREMENT,
                    election varchar(20),
                    date timestamp,
                    PRIMARY KEY (id)); ";
                
                mysqli_query($con, $query);
                $query = "insert into $name (election) values ('$type')";
                
                mysqli_query($con, $query);
            }

			$query = "insert into votings (user_name,email) values ('$name','$mail')";

			mysqli_query($con, $query);
            $query = "select * from candidates where id = '$candidate_selected'";
			$result = mysqli_query($con, $query);

			if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
                    $count=$user_data['count'];
                    $count=$count+1;
                }
            $query = "update candidates set count='$count' where id='$candidate_selected'";
			mysqli_query($con, $query);

			header("Location: votenow.php");
		}else
		{
			echo "<script>window.alert('Select Candidate');</script>";
		}
	}
    if($voted){
        echo "<style>footer{position: absolute;}</style>";
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
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="">ABOUT US</a>
                        <ul class="drop">
                            <li><a href="inthis.php">INSTITUTION HISTORY</a></li>
                            <li><a href="mv.php">MISSION & VISION</a></li>
                            <li><a href="orgchart.php">ORGANISATION CHART</a></li>
                        </ul>
                    </li>
                    <li><a class="active" href="votenow.php">VOTE NOW</a></li>
                    <li><a  href="myvotings.php">MY VOTINGS</a></li>
                    <li><a   href="contactus.php">CONTACT US</a></li>
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
        
        <?php

            if(!$voted){
                echo '<div class="form" id="can_list" >
                <form name="catagory_form" id="catagory_form" method="post">
                    You are voting for - '. strtoupper($type) . ' ELECTION <br> <br>
                    <div id="candidates">
                        <div class="can">';
                                if(strtolower($type)=="college"){
                                    
                                    $candidates = mysqli_query($con,"select * from candidates");
    
                                    while($row = mysqli_fetch_array($candidates))
                                        {
                                            echo "  <br> <input type='radio' name='candidate_selected' value=" . $row['id'] . " > &nbsp;" . $row['candidate_name'];
                                        }
                                    }
                                elseif(strtolower($type)=="branch"){
                                    $depart=$user_data['dept'];
                                    $candidates = mysqli_query($con,"select * from candidates where dept='$depart'");
                                    if($candidates &&  mysqli_num_rows($candidates) > 1 ){
                                        while($row = mysqli_fetch_array($candidates))
                                        {
                                            echo "  <br> <input type='radio' name='candidate_selected' value=" . $row['id'] . " > &nbsp;" . $row['candidate_name'];
                                        }
                                    }
                                    elseif($candidates &&  mysqli_num_rows($candidates) == 1 ){
                                        $row = mysqli_fetch_array($candidates);
                                        $sub_display=0;
                                        echo "<center>".$row['candidate_name']." <br> <br>  IS SELECTED AS LEADER FOR YOUR BRANCH ANONYMOUSLY</center> " ;
                                    }
                                    else{
                                        $sub_display=0;
                                    echo "NO CANDIDATE APPLIED FOR YOUR BRANCH";
                                    }
                                }
            
                    ?>
                    </div>
        
                        <div class="votenow-img">
                            <img id="vnimg" src="vn.png" alt="logo">
                        </div>
                        <div class="clearfix"></div>
                        <?php
                        if($sub_display)
                        {
                           echo '<input type="submit" value="Submit" id="candidate_btn">';
                        }

                    echo '</div>
                </form>
            </div>';
            }
            else{
            echo "<div id=voted>
                <center>
                    <h2>Your VOTE has been RECORDED</h2>
                </center>
            </div>";
            }
        ?>
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