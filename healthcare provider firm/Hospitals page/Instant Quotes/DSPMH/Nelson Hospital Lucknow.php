<?php
include '../../../dbconfig.php';

if(isset($_POST['submit']))
{
   $doctor = mysqli_real_escape_string($conn,$_POST['doctor']);
   $email = mysqli_real_escape_string($conn,$_POST['email-inp']);
   $query = mysqli_real_escape_string($conn,$_POST['query-inp']);
   $hospital = 'Nelson Hospital Lucknow';

   if($doctor!=="" && $email!=="" && $query!=="")
   {
        $sql_query= "insert into patientquery(doctor,customer_email,query,hospital_name) values('".$doctor."','".$email."','".$query."','".$hospital."');";
        $result= mysqli_query($conn,$sql_query);
        if($result)
        {
            header('Location:consultwithdoctor.php');
        }
        else
        {
            echo "Technical Issue Found";
        }
   }
   else
   {
        echo "All Fields are Mendatory";
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

        #card1 {
            background: rgb(0, 212, 255);
            background: linear-gradient(90deg, rgba(0, 212, 255, 1) 0%, rgba(255, 255, 255, 1) 0%, rgba(212, 235, 243, 1) 100%, rgba(255, 255, 255, 1) 100%);

        }

        form {
            padding: 40px;
            text-align: center;
        }

        form input {
            display: block;
            width: 98%;
            font-size: 25px;
            text-align: center;
            background: rgb(0, 212, 255);
            background: linear-gradient(90deg, rgba(0, 212, 255, 1) 0%, rgba(255, 255, 255, 1) 0%, rgba(212, 235, 243, 1) 100%, rgba(255, 255, 255, 1) 100%);
            padding: 8px;
            margin: 10px;
            border: 1px solid black;
        }

        form button {
            align-items: center;
            font-size: 24px;
            background-color: cornflowerblue;
            color: white;
            padding: 5px;
            margin: 10px;
            border: 1px solid black;

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
            <img src="../../../assets/logo/logo1.gif" alt="Logo" height="180px" width="220px" />
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
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../../homepage/Nelson Hospital Lucknow.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../../Department/Nelson Hospital Lucknow.php">Our Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../../Doctor Schedule/Nelson Hospital Lucknow.php">Doctors Schedule</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" style="font-weight:bold; font-size:18px;" aria-current="page" href="../Instant Quotes/DSPMH/Nelson Hospital Lucknow.php">Consult with Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../../About page/Nelson Hospital Lucknow.php">About us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="font-weight:bold; font-size:18px;" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            View Dashboard
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="../../Authentication/registration.php">Apply for Dashboard</a></li>
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
        <div class="container-fluid">
            <center>
                <h1 style="font-weight: bold;font-size:50px;padding-top:50px;padding-bottom:50px">Nelson Hospital Lucknow</h1>
            </center>
            <form method="post" action="">
                <label style="font-size: 30px;font-weight:600;padding-bottom:20px">Select Doctor:-  </label>
                <select name="doctor" id="doctor">
                <?php
                    $sql_query = "select id,doctor_name from doctor_schedule where hospital_name='Nelson Hospital Lucknow';";
                    $result = mysqli_query($conn, $sql_query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row['doctor_name']?>"><?php echo $row['doctor_name']?></option>
                <?php
                    }
                ?>
                </select>
                <input type="email" name="email-inp" placeholder="Enter Your Email"/>
                <input type="text" name="query-inp" placeholder="Ask your query"/>
                <button type="submit" name="submit" id="submit">Submit</button>
            </form>
        </div>
        <div>
        <h3 style="font-weight: bold;font-size:30px;padding-top:50px;padding-bottom:50px">User's Query </h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Doctor</th>
                        <th scope="col">Email</th>
                        <th scope="col">Query</th>
                        <th scope="col">Answer</th>
                    </tr>
                </thead>
                <?php
                    $sql_query = "select id,doctor,customer_email,query,answer from patientquery where hospital_name = 'Nelson Hospital Lucknow';";
                    $result = mysqli_query($conn, $sql_query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo $row['doctor']?></th>
                        <td><?php echo $row['customer_email']?></td>
                        <td><?php echo $row['query']?></td>
                        <?php if ($row['answer']!=="") {
                        ?>
                       <td><?php echo $row['answer']?></td>
                       <?php
                       } 
                       else {
                       ?>
                        <td>Wait for Doctor's reply.</td>
                        <?php
                       }
                       ?>
                    </tr>
                   
                </tbody>
                <?php
                    }
                ?>
            </table>
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