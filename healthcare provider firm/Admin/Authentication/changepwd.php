<?php
include '../../dbconfig.php';
session_start();
if(isset($_POST['change-inp']))
{
    $name=mysqli_real_escape_string($conn,$_SESSION['username']);
    $email=mysqli_real_escape_string($conn,$_SESSION['useremail']);
    $opwd=mysqli_real_escape_string($conn,$_POST['opwd']) ;
    $npwd=mysqli_real_escape_string($conn,$_POST['npwd']) ;
    $cpwd=mysqli_real_escape_string($conn,$_POST['cpwd']) ;

    if($opwd!=='' || $npwd!=='' || $cpwd!=='')
    {
        if($npwd===$cpwd)
        {

            $sql_query="select password as opwdhsh from admins where email='".$email."'";
            $result=mysqli_query($conn,$sql_query);
            $row=mysqli_fetch_array($result);

            if(password_verify($opwd,$row['opwdhsh'])==true)
            {
                $cipher_cpwd=password_hash($cpwd,PASSWORD_ARGON2I);
                $sql_query="update admins set password='".$cipher_cpwd."' where email='".$email."'";
                $result=mysqli_query($conn,$sql_query);

                if($result)
                {
                    header('location:../Home.php');
                }
                else
                {
                    echo "Password could not be changed";
                }
            }
            elseif($opwd==$row['opwdhsh'])
            {
                $cipher_cpwd=password_hash($cpwd,PASSWORD_ARGON2I);
                $sql_query="update admins set password='".$cipher_cpwd."' where email='".$email."'";
                $result=mysqli_query($conn,$sql_query);

                if($result)
                {
                    header('location:../Home.php');
                }
                else
                {
?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Password could not be changed</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>    
<?php
                }
            }
            else
            {
?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Incorrect old Password</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>        
<?php
            }
        }

        else
        {
?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>password did not match</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
        }
    }
    else
    {
?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>All Fields are required.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
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

        #web-content
        {
            padding: 0px;
            border: 2px solid black;
            border-radius: 15px;
            height: 50%;
            width: 50%;
            transform: translate(50%,10%);
            text-align: center;
            padding-bottom:15px;

        }
        #title
        {
            
            padding: 10px ;
            font-size: 23px;
            background-color: cornflowerblue;
            color: white;
            border-radius: 13px 13px 0px 0px;
            height: 75px;
        }
        form
        {
            padding: 40px;
        }

        form input
        {
            display: block;
            width: 98%;
            font-size: 15px;
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
        <div id=title>
            <h1>Change Your Password</h1>
        </div>
        <form method="post" action="">

                <input type="password" id="opwd" name="opwd" placeholder="old Password"/>
                <input type="password" id="npwd" name="npwd" placeholder="new Password"/>
                <input type="password" id="cpwd" name="cpwd" placeholder="confirm Password"/>


                <button type="Submit" name="change-inp">Change Password</button>
    
        </form>
    </section>

    <section id="footer" class="fixed-bottom" style="background-color:black;height:80px">
        <div class="footer-down" style="height:50px">
            <div class="footer-line">
                <hr>
            </div>
            <div class="footer-copyright">
                © <?php echo $d = date("Y"); ?> Hospital Provider Firm | All rights reserved.
            </div>
        </div>
    </section>
</body>

</html>