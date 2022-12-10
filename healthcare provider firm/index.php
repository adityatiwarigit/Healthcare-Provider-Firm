<?php
include 'dbconfig.php';
if(isset($_POST['login-inp']))
{
    $email= mysqli_real_escape_string($conn,$_POST['email-inp']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd']) ;

    if($email!==''||$pwd!=='')
    {
        $sql_query="select count(*) as usercount from login_data where email='".$email."';";
        $result= mysqli_query($conn,$sql_query);
        $row=mysqli_fetch_array($result); 
        $count=$row['usercount'];

        if($count>0)
        {
            $sql_query="select email as useremail, password as pwdhsh,type as type,hospital_name as hospital_name from login_data where email='".$email."';";
            $result= mysqli_query($conn,$sql_query);
            $row=mysqli_fetch_array($result); 

            if(password_verify($pwd,$row['pwdhsh'])==true)
            {
                if($row['type']== 'patient')
                {
                    $sql_query="select * from patient_record where email='".$email."'";
                    $result= mysqli_query($conn,$sql_query);
                    $row=mysqli_fetch_array($result);

                    session_start(); 
                    $_SESSION['username']=$row['username'];
                    $_SESSION['useremail']=$row['email'];

                    header('Location:../healthcare provider firm/Hospitals page/dashboard.php');
                }
                elseif($row['type']=='doctor')
                {
                    $sql_query="select * from doctors_record where doctor_email='".$email."'";
                    $result= mysqli_query($conn,$sql_query);
                    $row=mysqli_fetch_array($result);
    
                    session_start(); 
                    $_SESSION['username']=$row['doctor_name'];
                    $_SESSION['useremail']=$row['doctor_email'];
    
                     header('Location:../healthcare provider firm/Hospitals page/dashboard.php');
                }
            }
            elseif ($pwd==$row['pwdhsh']) {
                 if($row['type']== 'patient')
                {
                    $sql_query="select * from patient_record where email='".$email."'";
                    $result= mysqli_query($conn,$sql_query);
                    $row=mysqli_fetch_array($result);

                    session_start(); 
                    $_SESSION['username']=$row['username'];
                    $_SESSION['useremail']=$row['email'];

                    header('Location:../healthcare provider firm/Hospitals page/dashboard.php');
                }
                elseif($row['type']=='doctor')
                {
                    $sql_query="select * from doctors_record where email='".$email."'";
                    $result= mysqli_query($conn,$sql_query);
                    $row=mysqli_fetch_array($result);
    
                    session_start(); 
                    $_SESSION['username']=$row['doctor_name'];
                    $_SESSION['useremail']=$row['doctor_email'];
    
                     header('Location:../healthcare provider firm/Hospitals page/dashboard.php');
                }
            }
            else
            {
                echo "password not exist";
            }

            
        }
        
        else
        {
            echo "Username or Password does not exist";
        }
    }
    else
    {
        echo "All fields are mendatory";
    }
}
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
        #card1
        {
            background: rgb(0, 212, 255);
            background: linear-gradient(90deg, rgba(0, 212, 255, 1) 0%, rgba(255, 255, 255, 1) 0%, rgba(212, 235, 243, 1) 100%, rgba(255, 255, 255, 1) 100%);
       
        }

        .form1 {
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
                        <a class="nav-link active" style="font-weight:bold; font-size:18px;" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="hospitals.php">Our Hospitals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="labs.php">Labs & Diognosis</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="font-weight:bold; font-size:18px;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Instant Quotes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">Consult with Doctor</a></li>
                            <li><a class="dropdown-item" href="#">Suggestion for best Doctor</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="about.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="contact.php">Contact us</a>
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
        <div class="container-fluid">
            <center>
                <h1 style="font-weight: bold;font-size:50px;padding-top:50px;padding-bottom:50px">Welcome to the Healthcare Provider Firm</h1>
            </center>
            <div class="container-fluid">
                <img src="../healthcare provider firm/assets/images/pic1.webp"  height="500px" width="103%" alt="pic1">
            </div>
            <center>
                <h1 style="font-weight: bold;font-size:50px;padding-top:50px;padding-bottom:50px">Find Best Hospitals in Your city with experienced doctors</h1>
            </center>
            <center>
                <p style="font-size:25px;padding-bottom:50px;letter-spacing:1.5px">Here We provide the Hospitals with Various Facilities.<br>You can Book appointments on any specific Hospitals as well as the best Doctors and specialist.</p>
            </center>
            <div class="container-fluid">
                <center>
                    <h2>Visit Top Government Hospitals </h2>
                </center>
                <div class="container-fluid" style="padding-bottom: 100px;">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100">
                                <img src="../healthcare provider firm/assets/images/Top Government Hospitals/KEMH.jpg" class="card-img-top" alt="KEMH">
                                <div class="card-body"id="card1">
                                    <h5 class="card-title"style="font-weight:bolder;">King Edward Memorial Hospital,Mumbai</h5>
                                    <p class="card-text">KEM Hospital Mumbai has been designated as one of the 8 Centers of Excellence for Rare Disease in India by the Ministry of Health and Family Welfare,  Government of India under the provisions of the National Policy for Rare Diseases 2021</p>
                                    <a href="#" class="btn btn-primary">Show more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="../healthcare provider firm/assets/images/Top Government Hospitals/AIIMSD.jpg" class="card-img-top" alt="...">
                                <div class="card-body"id="card1">
                                    <h5 class="card-title"style="font-weight:bolder;">AIIMS Delhi</h5>
                                    <p class="card-text">Twenty-five clinical departments including four super specialty centers manage practically all types of disease conditions with support from pre- and Para-clinical departments.</p>
                                    <a href="#" class="btn btn-primary">Show more</a>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100"id="card1">
                                <img src="../healthcare provider firm/assets/images/Top Government Hospitals/CMCV.JPG" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"style="font-weight:bolder;">CMC Vellore</h5>
                                    <p class="card-text">Christian Medical College Vellore offers a huge range of different medical specialities, with advanced diagnostic and therapeutic services, alongside primary and secondary level care for local communities.</p>
                                    <a href="#" class="btn btn-primary">Show more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" style="padding-bottom: 50px;">
                <center>
                    <h2>Visit Top Private Hospitals </h2>
                </center>
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100">
                                <img src="../healthcare provider firm/assets/images/Top Private Hospitals/apolloChennai.jpg" class="card-img-top" alt="apollochennai">
                                <div class="card-body"id="card1">
                                    <h5 class="card-title"style="font-weight:bolder;">Apollo Hospital</h5>
                                    <p class="card-text">Apollo Chennai is one of the best hospitals for specialized care in India.
                                        It is the first Indian Hospital with ISO 9001 and ISO 14001 to introduce techniques in coronary angioplasty, stereotactic radiotherapy, and radio surgery (for brain tumors).</p>
                                    <a href="#" class="btn btn-primary">Show more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="../healthcare provider firm/assets/images/Top Private Hospitals/fortishospital.jpg" class="card-img-top" alt="fortisharyana.">
                                <div class="card-body"id="card1">
                                    <h5 class="card-title"style="font-weight:bolder;">Fortis Hospitals</h5>
                                    <p class="card-text">Fortis Hospital & Kidney Institute (FHKI), Kolkata, was recognised as the ‘Best Hospital to Work For’ by the Association of Healthcare Providers – India (AHPI). This is the third consecutive year when FHKI has won the honour..</p>
                                    <a href="#" class="btn btn-primary">Show more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="../healthcare provider firm/assets/images/Top Private Hospitals/nanawatiHospital.jpg" class="card-img-top" alt="...">
                                <div class="card-body"id="card1">
                                    <h5 class="card-title"style="font-weight:bolder;">Nanavati Hospital</h5>
                                    <p class="card-text">Largest private sector hospital in Mumbai, India 350-bed capacity | 75 critical care beds | 11 state-of-the-art modular operation theatres 1500 healthcare providers | 150 globally renowned super specialties | 350 medical experts Liver Transplants | Kidney Transplants | Bone Marrow Transplants | Robust program for Heart Transplant</p>
                                    <a href="#" class="btn btn-primary">Show more</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <center>
                <h1 style="font-weight: bold;font-size:50px;padding-top:50px;padding-bottom:50px">Login Here and Visit Your Dashboard</h1>
            </center>
            <div class="container-fluid">
                <form class="form1" method="post" action="">
                    <input type="email" id="email-inp" name="email-inp" placeholder="Enter Your Email" />
                    <input type="password" id="pwd" name="pwd" placeholder="Enter Password" />
                    <button type="Submit" name="login-inp">LOGIN</button>
                </form>
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