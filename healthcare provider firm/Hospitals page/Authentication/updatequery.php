<?php

include '../../dbconfig.php';

$id= $_GET['id'];

if(isset ($_POST['update']))

{
    $reply=mysqli_real_escape_string($conn,$_POST['reply-inp']);
   

    if($reply!=='')
    {
        $sql_query= "UPDATE doctor_chat SET doctor='" . $reply . "' where id = '".$id."';";
        $result = mysqli_query($conn, $sql_query);
        if($result)
        {
            header('location:../doctor/patient_query.php');
        }
        else
        {
            echo "Record Not Updated";
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>



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

        *
        {
            margin: 0;
            padding: 0;
        }
        #main
        {
            border: 2px solid black;
            border-radius: 15px;
            height: 50%;
            width: 50%;
            transform: translate(50%,10%);
            text-align: center;

        }
        #title
        {
          
            padding: 20px ;
            font-size: 23px;
            background-color: cornflowerblue;
            color: white;
            border-radius: 13px 13px 0px 0px;
            height: 40px;
        }
        form
        {
            padding: 40px;
        }

        form input
        {
            display: block;
            width: 98%;
            font-size: 20px;
            text-align: center;
            padding: 8px;
            margin: 10px;
            border: 1px solid black;
        }
        form button
        {
            font-size: 18px;
           background-color: cornflowerblue;
           color: white;
           padding: 5px 10px;
           margin: 10px;
           border: 1px solid black;
            
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

    <section id="web-content" class="container-fluid">
            <?php
                $sql_query = "select * from doctor_chat where id='" . $id . "';";
                $result = mysqli_query($conn, $sql_query);
                while ($row = mysqli_fetch_array($result)) {
            ?>
            <form method="post" action="">

                <input type="text" id="reply-inp" value="<?php echo $row['doctor']?>" name="reply-inp" placeholder="Reply message" required>
                <br> 
                <button type="submit" name="update" id="update">Update</button>
                <button type="cancel" ><a href="../doctor/patient_query.php" style="text-decoration:none;color:white">Cancel</a></button>
            </form>
            <?php 
                }
            ?>
        </div>
    </section>
</body>
</html>