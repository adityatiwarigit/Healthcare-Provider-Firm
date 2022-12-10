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

            $sql_query="select password as opwdhsh from login_data where email='".$email."'";
            $result=mysqli_query($conn,$sql_query);
            $row=mysqli_fetch_array($result);

            if(password_verify($opwd,$row['opwdhsh'])==true)
            {
                $cipher_cpwd=password_hash($cpwd,PASSWORD_ARGON2I);
                $sql_query="update login_data set password='".$cipher_cpwd."' where email='".$email."'";
                $result=mysqli_query($conn,$sql_query);

                if($result)
                {
                    header('location:login.php');
                }
                else
                {
                    echo "Password could not be changed";
                }
            }
            elseif($opwd==$row['opwdhsh'])
            {
                $cipher_cpwd=password_hash($cpwd,PASSWORD_ARGON2I);
                $sql_query="update login_data set password='".$cipher_cpwd."' where email='".$email."'";
                $result=mysqli_query($conn,$sql_query);

                if($result)
                {
                    header('location:login.php');
                }
                else
                {
                    echo "Password could not be changed";
                }
            }
            else
            {
                echo "Incorrect old Password";
            }
        }
        
        
        else
        {
            echo "password did not match";
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
    <title>LOGIN</title>
    <style>
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
            transform: translate(50%,50%);
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
            font-size: 15px;
            text-align: center;
            padding: 8px;
            margin: 10px;
            border: 1px solid black;
        }
        form button
        {
            font-size: 14px;
           background-color: cornflowerblue;
           color: white;
           padding: 5px;
           margin: 10px;
           border: 1px solid black;
            
        }
    </style>
</head>
<body>
    <section id=main>
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
</body>
</html>