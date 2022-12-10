<?php
include '../../dbconfig.php';
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

        #card1 {
            background: rgb(0, 212, 255);
            background: linear-gradient(90deg, rgba(0, 212, 255, 1) 0%, rgba(255, 255, 255, 1) 0%, rgba(212, 235, 243, 1) 100%, rgba(255, 255, 255, 1) 100%);

        }

        .form1,
        .form2 {
            padding: 40px;
            align-items: center;
            text-align: center;
        }

        .form1 input {
            display: block;
            width: 100%;
            font-size: 23px;
            text-align: center;
            padding: 10px;
            margin: 10px;
            border: 2px solid black;
        }

        .form1 button {
            font-size: 18px;
            font-weight: bolder;
            align-items: center;
            background-color: lightslategray;
            color: black;
            padding: 5px 10px;
            margin: 10px;
            border: 1px solid blue;

        }

        .form2 button {
            font-size: 30px;
            font-weight: bolder;
            align-items: center;
            background-color: transparent;
            color: black;
            padding: 5px 10px;
            margin: 10px;
            border: 2px solid Black;

        }

        .form2 button:hover {
            font-size: 33px;
            background-color: lightslategray;
            border: 3px solid black;
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
            background: linear-gradient(90deg, rgba(0, 212, 255, 1) 0%, rgba(255, 255, 255, 1) 0%, rgba(212, 235, 243, 1) 100%, rgba(255, 255, 255, 1) 100%);
            padding: 0px 45px;
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
    </section>


    <section id="logo">
        <div class="left-align">
            <img src="../../assets/logo/logo1.gif" alt="Logo" height="180px" width="220px" />
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
            <a class="navbar-brand" style="font-weight:bold; font-size:22px;" href="../../index.php">HealthCare Provider</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../homepage/Surya Hospital Lucknow.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../Department/Surya Hospital Lucknow.php">Our Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../Doctor Schedule/Surya Hospital Lucknow.php">Doctors Schedule</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../Instant Quotes/DSPMH/Surya Hospital Lucknow.php">Consult with Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="font-weight:bold; font-size:18px;" aria-current="page" href="Surya Hospital Lucknow.php">About us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="font-weight:bold; font-size:18px;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            View Dashboard
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="../Authentication/registration.php">Apply for Dashboard</a></li>
                            <li><a class="dropdown-item" href="../Authentication/login.php">Login to Dashboard</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </section>

    <section id="web-content">
        <div id="upper-web-content">
            <div class="container-fluid" style="padding:5px; margin: 2px;padding-bottom: 0px;margin-bottom: 0px;">
                <div id=left-align>
                    <img src="../../assets/images/Surya Hospital Lucknow/logo/surya.jpg" class="img-fluid" alt="about img" height="500px" width="550px" />
                </div>
                <div id="right-align">
                    <h1>Shekhar Hospital<br>(private) Lucknow</h1>
                    <p>The Best Hospital in lucknow with that is available for 24 hours<br>It Contains more then 100 beds and Most of the tests available in hospital</p>
                    <p>Doctors are 15+ at day shift and night shift with 50+members in staff present.<br>The Hospital is well Cleaned and privide the better treatment to the patient.<br>Contains many departments as well as better in emergency department </p>
                </div>
            </div>
        </div>
        <div id="middle-web-content">
            <p>It is available for 24 hours at emergency and OPD time is 10:00 AM to 2:00 PM that have 2 OPD and 2 Emergency Department.The charge of OPD is 1000 RS per doctor,There is no extra Charge you have to pay. </p>
            <p>The Best department of our hospitals are Opthalmology, Orthopedics, Otolaryngology, Paediatrics, Plastic Surgury as well as Medicine ward and general checkup also available. Our hospital is best in headache, fever, stomach pain, body weakness tratements and the OPD is open from Monday to Thursday.</p>
        </div>
        <div id="middle-web-content">
            <h1>
                <center>Our Portfolio</center>
            </h1>

            <div class="card mb-3">
                <img src="../../assets/images/Surya Hospital Lucknow/logo/surya.jpg" class="card-img-top img-fluid" alt="..." height="600px">
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php
                $sql_query = "select id,hospital_name,image,image_title,description from gallary where hospital_name = 'Surya Hospital Lucknow';";
                $result = mysqli_query($conn, $sql_query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="col" style="padding: 15px 0px">
                        <div class="card">
                            <img src="../../assets/images/Surya Hospital Lucknow/images/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body" style="padding-top:15px;">
                                <h5 class="card-title" style="font-weight: bold; font-size:30px"><?php echo $row['image_title'] ?></h5>
                                <p class="card-text" style="font-weight: medium; font-size:20px;letter-spacing:1px;"><?php echo $row['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="card mb-3">
                <img src="../../assets/images/Surya Hospital Lucknow/logo/surya.jpg" class="card-img-top img-fluid" alt="..." height="700px">
            </div>
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