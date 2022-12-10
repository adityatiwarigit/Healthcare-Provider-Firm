<?php
include '../../dbconfig.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>

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

        #web-content h1
        {
            padding: 40px;
            font-size: 45px;
            font-weight: bolder;
        }

        .data
        {
            padding: 10px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        #pay-btn button
        {
            font-size:25px;
            font-weight: bolder;
            color: white;
            background-color: darkslateblue;
            padding:5px;
            margin: 15px;
            border-color: lightslategray;
        }
        #pay-btn button:hover
        {
            font-size:28px;
            background-color: slateblue;
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

    <section id="web-content">
        <div class="container-fluid" style="border:1px solid black;margin: 10px 40px; background-color:lightblue;">
            <center>
                <h1>Payment Gateway</h1>
            </center>

            <div class="data">
                <h3> Hospital Name:</h3>
                <p><?php echo $_SESSION['hospital_name']?></p>
            </div>
            <div class="data">
                <h3> Department Name:</h3>
                <p><?php echo $_SESSION['department']?></p>
            </div>

            <?php 
            $sql_query="select * from department where department_name='".$_SESSION['department']."';";
            $result = mysqli_query($conn,$sql_query);
            $row = mysqli_fetch_array($result);
            ?>
            <div class="data">
                <h3> Doctor's Charge:</h3>
                <p><?php echo $row['doctor_charge']?></p>
            </div>
            <div class="data">
                <h3>GST:</h3>
                <p><?php echo (($row['doctor_charge']*18)/100) ?></p>
            </div>
            <center>
                <hr style="width: 99%;">
            </center>
            <div class="data">
                <h3> Total:</h3>
                <p><?php echo (($row['doctor_charge']*18)/100 + ($row['doctor_charge'])) ?></p>
            </div>
        </div>
        <div id="pay-btn">
                <center>
                    <button type="submit" name="pay">Pay Amount</button>
                </center>
            </div>
    </section>
</body>
</html>