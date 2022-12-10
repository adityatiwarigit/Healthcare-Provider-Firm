<?php
include 'dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare provider Firm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <style>
        * {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin: 0;
            padding: 0;
        }

        body {
            background: rgb(0, 205, 246);
            background: linear-gradient(90deg, rgba(0, 205, 246, 1) 0%, rgba(255, 255, 255, 1) 0%, rgba(230, 252, 251, 1) 0%, rgba(151, 215, 237, 1) 100%)
        }

        #header {
            background-color: black;
            text-align: right;
        }

        #header>a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            margin-right: 30px;
        }

        #dropdown {
            display: inline-block;
            position: relative;
        }

        #dropdown button {
            border: none;
            background-color: red;
            color: white;
            font-size: 20px;
            padding: 5px 25px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        #header #dropdown-content {
            position: absolute;
            visibility: collapse;
            right: 0;
            z-index: 1000;
        }

        #header #dropdown-content a {
            display: block;
            white-space: nowrap;
            text-decoration: none;
            color: black;
            background-color: rgb(219, 219, 219);
            padding: 10px 20px;
        }

        #dropdown:hover button {
            background-color: darkred;
        }

        #dropdown:hover #dropdown-content {
            visibility: visible;
        }

        #header #dropdown-content>a:hover {
            background-color: #999;

        }

        #logo {
            height: 180px;
            display: flex;
            white-space: nowrap;
            justify-content: space-between;
            background-color: #1167b1;
        }

        .left-align {
            padding: 0px;
        }

        .right-align {
            margin-right: 100px;
        }

        .right-align>h1 {
            color: white;
            margin-top: 30px;
            font-size: 55px;
            font-weight: bold;
        }

        .right-align p {
            color: white;
            font-size: 25px;
        }

        #web-content {
            padding: 30px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            background: rgb(0, 212, 255);
            background: linear-gradient(90deg, rgba(0, 212, 255, 1) 0%, rgba(255, 255, 255, 1) 0%, rgba(212, 235, 243, 1) 100%, rgba(255, 255, 255, 1) 100%);
        }

        #upper-web-content {
            display: flex;
            flex-direction: column;
            position: relative;
            height: 600px;
            background: rgb(0, 212, 255);
            background: linear-gradient(90deg, rgba(0, 212, 255, 1) 0%, rgba(255, 255, 255, 1) 0%, rgba(212, 235, 243, 1) 100%, rgba(255, 255, 255, 1) 100%);
            }

        #left-align {
            display: flex;
            flex-direction: column;
            position: absolute;
            padding: 45px;
        }

        #right-align {
            position: absolute;
            right: 100px;
            top: 44px;
        }

        #right-align>h1 {
            font-size: 65px;
            font-weight: bold;
            color: #160f05;
        }

        #right-align>p {
            padding-top: 25px;
            color: #160f05;
            text-align: left;
            font-size: 18px;
            letter-spacing: 1.5px;
            line-height: 35px;
        }

        #middle-web-content {
            display: flex;
            flex-direction: column;
            position: relative;
            background: rgb(0, 212, 255);
            background: linear-gradient(90deg, rgba(0, 212, 255, 1) 0%, rgba(255, 255, 255, 1) 0%, rgba(212, 235, 243, 1) 100%, rgba(255, 255, 255, 1) 100%);            padding: 0px 45px;
        }

        #middle-web-content>p {
            color: #160f05;
            text-align: left;
            font-size: 18px;
            letter-spacing: 1.5px;
            line-height: 35px;
        }

        #middle-web-content>h1 {
            font-size: 65px;
            font-weight: bold;
            color: #160f05;
        }


        #footer-content {

            display: flex;
            background-color: black;
            color: white;
            width: 100%;
            height: 10px;
            justify-content: center;
            align-items: center;
        }

        .footer-down {
            background-color: black;
        }

        .footer-line {
            background-color: black;
            color: white;
        }

        .footer-copyright {
            display: flex;
            flex-direction: column;
            font-weight: 400;
            font-size: 14px;
            margin-top: 15px;
            text-align: center;
            letter-spacing: .05em;
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>

    <section id="header">
        <a href="legal/privacy.html">Privacy Policy</a>
        <a href="legal/tnc.html">Terms and Condition</a>

        <?php if (!isset($_SESSION['username'])) { ?>
            <div id="dropdown">
                <button>LOGIN</button>
                <div id="dropdown-content">
                    <a href="../healthcare provider firm/Hospitals page/Authentication/login.php">Log into Existing Account</a>
                    <a href="../healthcare provider firm/Hospitals page/Authentication/registration.php">Create a new Account</a>
                </div>
            </div>
        <?php } else { ?>
            <div id="dropdown">
                <button><?php echo $_SESSION['username'] ?></button>
                <div id="dropdown-content">
                    <a href="../UI Development/Authpentication/changepwd.php">Change Password</a>
                    <a href=" ui.php?logout=true">Log Out</a>
                </div>
            </div>
        <?php }
        ?>
    </section>


    <section id="logo">
        <div class="left-align">
            <img src="../healthcare provider firm/assets/logo/logo1.gif" alt="Logo" height="180px" width="220px" />
        </div>

        <div class="right-align">
            <h1>
                <marquee>Healthcare Provider Firm</marquee>
            </h1>
            <marquee>
                <p>The fastest way of search best Hospitals with Experienced Doctor.</p>
            </marquee>
        </div>
    </section>

    <section id="menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#e3fcfc;">
            <a class="navbar-brand" style="font-weight:bold; font-size:22px;" href="#">HealthCare Provider</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="hospitals.php">Our Hospitals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="labs.php">Labs & Diognosis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="font-weight:bold; font-size:18px;" href="about.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="contact.php">Contact us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <section id="web-content">
    <div id="upper-web-content">
            <div class="container-fluid" style="padding:5px; margin: 2px;padding-bottom: 0px;margin-bottom: 0px;">
                <div id=left-align>
                    <img src="../healthcare provider firm/assets/logo/logo1.gif" alt="about img" class="img-fluid" height="500px" width="550px" />
                </div>
                <div id="right-align">
                    <h1>Healthcare Provider<br> Firm</h1>
                    <p>The Best guide for your Hospital here you can select <br> hospitals in your city as per your choice.</p>
                    <p>You Can visit top hospitals as per your choice by just single click.<br> We provides labs for test also just search it and click on the <br>link for booking Appintment. </p>
                    <p>Our team is always available for you.</p>
                </div>
            </div>
        </div>
        <div id="middle-web-content">
            <p>The Healthcare Provider Firm Contains more the 50% Hospitalsin each city in the Lowest prize you can easily book Appointment and can consult with our Specialist as well as your selected doctors also.</p>            </p>
            <p>We provide a Dashboard to patient where each and Every Report of Patient is available and can download it.It is only for Logged in User and several labs for different kind of tests.</p>
        </div>
    </section>

    <section id="footer" style="background-color:black;height:100px">
        <div class="footer-down" style="height:55px">
            <div class="footer-line">
                <hr>
            </div>
            <div class="footer-copyright">
                © 2022 Hospital Provider Firm | All rights reserved.
            </div>
        </div>
    </section>
</body>

</html>