<?php

include '../../dbconfig.php';

session_start();
if (isset($_GET['logout'])) {
    session_destroy();

    header('Location:../../index.php');
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

        <?php if (!isset($_SESSION['username'])) { ?>
            <div id="dropdown">
                <button>LOGIN</button>
                <div id="dropdown-content">
                    <a href="../UI Development/Authpentication/login.php">Log into Existing Account</a>
                    <a href="../UI Development/Authpentication/register.php">Create a new Account</a>
                </div>
            </div>
        <?php } else { ?>
            <div id="dropdown">
                <button><?php echo $_SESSION['username'] ?></button>
                <div id="dropdown-content">
                    <a href="../Authentication/changepassword.php">Change Password</a>
                    <a href=" overall_billing.php?logout=true">Log Out</a>
                </div>
            </div>
        <?php }
        ?>
    </section>


    <section id="logo">
        <div class="left-align">
            <img src="../../../healthcare provider firm/assets/logo/logo1.gif" alt="Logo" height="180px" width="220px" />
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
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../../labs.php">Tests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="../patient/report.php">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="doctor_chat.php">Consult with your Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="font-weight:bold; font-size:18px;" aria-current="page" href="overall_billing.php">Overall Billing</a>
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
                <?php
                $sql_query = "select * from patient_bill where email= '" . $_SESSION['useremail'] . "'";
                $result = mysqli_query($conn, $sql_query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <center>
                        <h1 style="font-weight: bold;font-size:50px;padding-top:50px;padding-bottom:50px"><?php echo $row['hospital_name']; ?></h1>
                    </center>
                    <center>
                        <div id="right-align">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Net Ammount</th>
                                        <th scope="col">View Bill</th>
                                        <th scope="col">Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_query = "select * from patient_bill where email= '" . $_SESSION['useremail'] . "'";
                                    $result = mysqli_query($conn, $sql_query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id']?></th>
                                            <td><?php echo $row['date']?></td>
                                            <td><?php echo $row['net_ammount']?></td>
                                            <td><a href="../../assets/patient_bill/<?php echo $row['bill_link'] ?>">click here</a></td>
                                            <td><a href="../../assets/patient_bill/<?php echo $row['bill_link'] ?>" download="../../assets/patient_bill/<?php echo $row['bill_link'] ?>">Download</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </center>
            </div>
            <?php
                    }
            ?>
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