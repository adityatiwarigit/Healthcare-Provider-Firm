<?php
include '../../dbconfig.php';
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

                    header('Location:../dashboard.php');
                }
                elseif($row['type']=='doctor')
                {
                    $sql_query="select * from doctors_record where doctor_email='".$email."'";
                    $result= mysqli_query($conn,$sql_query);
                    $row=mysqli_fetch_array($result);
    
                    session_start(); 
                    $_SESSION['username']=$row['doctor_name'];
                    $_SESSION['useremail']=$row['doctor_email'];
    
                     header('Location:../dashboard.php');
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

                    header('Location:../dashboard.php');
                }
                elseif($row['type']=='doctor')
                {
                    $sql_query="select * from doctors_record where doctor_email='".$email."'";
                    $result= mysqli_query($conn,$sql_query);
                    $row=mysqli_fetch_array($result);
    
                    session_start(); 
                    $_SESSION['username']=$row['doctor_name'];
                    $_SESSION['useremail']=$row['doctor_email'];
    
                     header('Location:../dashboard.php');
                }
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
        <h1>Login Page</h1>
        </div>
       <form method="post" action="">
            <input type="email" id="email-inp" name="email-inp" placeholder="Enter Your Email"/>
            <input type="password" id="pwd" name="pwd" placeholder="Enter Password"/>

            <button type="Submit" name="login-inp">LOGIN</button>
       </form>
    </section>
</body>
</html>