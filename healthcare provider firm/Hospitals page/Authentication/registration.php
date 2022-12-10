<?php
include '../../dbconfig.php';
if(isset($_POST['register-inp']))
{
    $name=mysqli_real_escape_string($conn,$_POST['name-inp']);
    $conatct= mysqli_real_escape_string($conn,$_POST['contact-inp']);
    $age= mysqli_real_escape_string($conn,$_POST['age-inp']);
    $aadhar= mysqli_real_escape_string($conn,$_POST['aadhar-inp']);
    $email= mysqli_real_escape_string($conn,$_POST['email-inp']);
    $guardian_name= mysqli_real_escape_string($conn,$_POST['guardian-inp']);
    $guardian_contact= mysqli_real_escape_string($conn,$_POST['guardian_contact-inp']);
    $address= mysqli_real_escape_string($conn,$_POST['address-inp']);
    $dob= mysqli_real_escape_string($conn,$_POST['dob-inp']);
    $gender= mysqli_real_escape_string($conn,$_POST['gender']);
    $hospital_name= mysqli_real_escape_string($conn,$_POST['hospital-inp']);
    $department= mysqli_real_escape_string($conn,$_POST['department-inp']);





    if($name!=='' && $email!==''&& $contact!=='' && $age!==''&& $aadhar!=='' && $guardian_name!==''&& $guardian_contact!=='' && $address!==''&& $dob!=='' && $gender!==''&& $hospital_name!=='')
    {
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['contact'] = $contact;
        $_SESSION['age'] = $age;
        $_SESSION['aadhar'] = $aadhar;
        $_SESSION['email'] = $email;
        $_SESSION['guardian_name'] = $guardian_name;
        $_SESSION['guardian_contact'] = $guardian_contact;
        $_SESSION['address'] = $address;
        $_SESSION['dob'] = $dob;
        $_SESSION['gender'] = $gender;
        $_SESSION['hospital_name'] = $hospital_name;
        $_SESSION['department'] = $department;



        header('location:../Authentication/paymenygateway.php');

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

    <section id=main>
        <div id=title>
        <h1>Book Your Appointment</h1>
        </div>
       <form method="post" action="">

            <input type="text" id="name-inp" name="name-inp" placeholder="Enter Your username"/>
            <input type="text" id="contact-inp" name="contact-inp" placeholder="Enter Your Contact No."/>
            <input type="text" id="age-inp" name="age-inp" placeholder="Enter Your Age"/>
            <input type="text" id="aadhar-inp" name="aadhar-inp" placeholder="Enter Your Aadhar No"/>
            <input type="email" id="email-inp" name="email-inp" placeholder="Enter Your Email"/>
            <input type="text" id="guardian-inp" name="guardian-inp" placeholder="Enter Your Guardian Name"/>
            <input type="text" id="guardian_contact-inp" name="guardian_contact-inp" placeholder="Enter Your Guardian Contact No."/>
            <input type="text" id="address-inp" name="address-inp" placeholder="Enter Your Complete Address"/>
            <label>Date of Birth</label>
                <input type="date" id="dob-inp" name="dob-inp"required>
                <br>

                <label>Gender</label>
                <br><br>
                <label>Male</label>
                <input type="radio" name="gender" value="male"/>
                
                <label>Female</label>
                <input type="radio" name="gender" value="male"/>
                
                <label>Others</label>
                <input type="radio" name="gender" value="other"/>

                <label>Select Your Hospital</label>
                <br><br>
                <select name="hospital-inp" id="hospital-inp" >
                    <?php
                        $sql_query = "SELECT name FROM `ourhospitals`;";
                        $result = mysqli_query($conn, $sql_query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
                    <?php
                        }
                    ?>
                </select>
                <br>
                <br>

                <label>Select Your Department</label>
                <br><br>
                <select name="department-inp" id="department-inp" >
                    <?php
                        $sql_query = "SELECT department_name FROM `department`;";
                        $result = mysqli_query($conn, $sql_query);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['department_name']?>"><?php echo $row['department_name']?></option>
                    <?php
                        }
                    ?>
                </select>
                <br><br>

            <button type="Submit" name="register-inp">Next </button>
  
       </form>
    </section>
</body>
</html>