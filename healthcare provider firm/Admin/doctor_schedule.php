<?php
include '../dbconfig.php';
session_start();
if (isset($_SESSION['username'])) 
{
    $delete = false;
    if(isset($_GET['delete']))
    {
        $sno = $_GET['delete'];

        $SQL = "DELETE FROM doctor_schedule WHERE `doctor_schedule`.`id` = ".$sno."";
        $result = mysqli_query($conn,$SQL);
        if(!$result)
        {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Sorry</strong> record does not deleted.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        else
        {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Congrats!</strong> your record sucessfully Deleted.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
    if(!$_SERVER['REQUEST_METHOD']=='POST')
    {
        die ("Record not Submitted");
    } 
        else
    {
        if(isset($_POST['snoEdit']))
        {
            $sno = $_POST['snoEdit'];
            $hospital_name = $_POST['hospital_nameEdit'];
            $doctor_name = $_POST['doctor_nameEdit'];
            $day_schedule = $_POST['day_scheduleEdit'];
            $time_schedule = $_POST['time_scheduleEdit'];
            $OPD = $_POST['OPDEdit'];
            $room_no = $_POST['room_noEdit'];
            $department = $_POST['departmentEdit'];
        
            $SQL= "UPDATE `doctor_schedule` SET `hospital_name` = '".$hospital_name."',`doctor_name` = '".$doctor_name."',`day_schedule` = '".$day_schedule."',`time_schedule` = '".$time_schedule."',`OPD` = '".$OPD."',`room_no` = '".$room_no."' ,`department_name` = '".$department."' WHERE `id` = ".$sno." ";
            $result = mysqli_query($conn,$SQL);
            if(!$result)
            {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Sorry</strong> record does not updated.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            else
            {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Congrats!</strong> your record sucessfully updated.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        
        }
        elseif(isset($_POST['upload']))
        {
            $hospital_name = $_POST['hospital_name'];
            $doctor_name = $_POST['doctor_name'];
            $day_schedule = $_POST['day_schedule'];
            $time_schedule = $_POST['time_schedule'];
            $OPD = $_POST['OPD'];
            $room_no = $_POST['room_no'];
            $department = $_POST['department'];


            if(!$doctor_name==""  && !$hospital_name == "" && !$department == "" && !$OPD == "" && !$room_no == "" && !$day_schedule == "" && !$time_schedule == "" )
            {
                $SQL= "INSERT INTO `doctor_schedule`(`hospital_name`, `doctor_name`,`day_schedule`, `time_schedule`, `OPD`, `room_no`, `department_name`) VALUES ('".$hospital_name."','".$doctor_name."','".$day_schedule."','".$time_schedule."','".$OPD."','".$room_no."','".$department."'); ";
                $result = mysqli_query($conn,$SQL);
                if(!$result)
                {
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Sorry</strong> record does not uploaded.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
                else
                {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Congrats!</strong> your record sucessfully uploaded.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }
        }  
    }
    
    $SQL= "SELECT * FROM `doctors_record`";
    $result = mysqli_query($conn,$SQL);
    while ($row = mysqli_fetch_assoc($result)) 
    {  
        
       

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare provider Firm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



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
            <img src="../../healthcare provider firm/assets/logo/logo1.gif" alt="Logo" height="180px" width="220px" />
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="department.php">Department</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="doctor_record.php">Doctor's Record</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="doctor_chat.php">Doctor's Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="font-weight:bold; font-size:18px;" aria-current="page" href="doctor_schedule.php">Doctor's Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="gallary.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="lab.php">Lab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="login_data.php">Login Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="notification.php">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="our_hospitals.php">Our Hospitals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="patient_query.php">Patient Query</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="patient_bill.php">Patient Bill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="patient_record.php">Patient Record</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight:bold; font-size:18px;" href="patient_report.php">Patient Report</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>


    <section id="web-content">
        <!--edit modal-->
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="../Admin/doctor_schedule.php" method="post">
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="mb-3">
                        <label class="form-label">Hospital Name</label>
                        <input type="text" class="form-control" id="hospital_nameEdit" name="hospital_nameEdit">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Doctor's Name</label>
                        <input type="text" class="form-control" id="doctor_nameEdit" name="doctor_nameEdit">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Day Schedule</label>
                        <input type="text" class="form-control" id="day_scheduleEdit" name="day_scheduleEdit">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Time Schedule</label>
                        <input type="text" class="form-control" id="time_scheduleEdit" name="time_scheduleEdit">
                    </div>                    
                    <div class="mb-3">
                        <label class="form-label">OPD</label>
                        <input type="text" class="form-control" id="OPDEdit" name="OPDEdit">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Room No</label>
                        <input type="text" class="form-control" id="room_noEdit" name="room_noEdit">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="departmentEdit" name="departmentEdit">
                    </div>
                    <button type="submit" name="upload" class="btn btn-primary">Update</button>
                </form>
        
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
        </div>



        <h1 style="text-align: center;padding-bottom:50px;font-size:80px;font-weight:bolder;">Welcome <?php echo $_SESSION['username'] ?></h1>
        <div class="conatainer-fluid">
        <form action="../Admin/doctor_schedule.php" method="post">
                <div class="mb-4">
                    <label class="form-label" style="font-weight:bolder">Hospital Name</label>
                    <input type="text" class="form-control" name="hospital_name" style="border:1px solid Grey;background-color:#EDEDED">
                </div>
                <div class="mb-4">
                    <label class="form-label" style="font-weight:bolder">Doctor's Name</label>
                    <input type="text" class="form-control" name="doctor_name" style="border:1px solid Grey;background-color:#EDEDED">
                </div>
                <div class="mb-4">
                    <label class="form-label" style="font-weight:bolder">Day Schedule</label>
                    <input type="text" class="form-control" name="day_schedule" style="border:1px solid Grey;background-color:#EDEDED" placeholder="Mon-Fri">
                </div>     
                </div>  <div class="mb-4">
                    <label class="form-label" style="font-weight:bolder">Time Schedule</label>
                    <input type="text" class="form-control" name="time_schedule" style="border:1px solid Grey;background-color:#EDEDED" placeholder="11:00 AM - 12:00 PM">
                </div>  
                <div class="mb-4">
                    <label class="form-label" style="font-weight:bolder">OPD</label>
                    <input type="text" class="form-control" name="OPD" style="border:1px solid Grey;background-color:#EDEDED" placeholder="0">
                </div>      
                <div class="mb-4">
                    <label class="form-label" style="font-weight:bolder">Room No</label>
                    <input type="text" class="form-control" name="room_no" style="border:1px solid Grey;background-color:#EDEDED" placeholder="000">
                </div>  
                <div class="mb-4">
                    <label class="form-label" style="font-weight:bolder">Department Name</label>
                    <input type="text" class="form-control" name="department" style="border:1px solid Grey;background-color:#EDEDED">
                </div>     
                <button type="submit" name="upload" class="btn btn-primary" style="background-color: darkslategrey;">Submit</button>
            </form>
        </div>

        <div class="container table-responsive">
        <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">sno</th>
                    <th scope="col">Hospital Name</th>
                    <th scope="col">Doctor's Name</th>
                    <th scope="col">Day Schedule</th>
                    <th scope="col">Time Schedule</th>
                    <th scope="col">OPD</th>
                    <th scope="col">Room No</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sno=0;
                    $SQL="SELECT * FROM `doctor_schedule`";
                    $result= mysqli_query($conn,$SQL);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $sno=$sno+1;
                ?>   
                            <tr>
                            <td scope="row"><?php echo $sno ?></td>
                            <td><?php echo $row['hospital_name']?></td>
                            <td><?php echo $row['doctor_name']?></td>
                            <td><?php echo $row['day_schedule']?></td>
                            <td><?php echo $row['time_schedule']?></td>
                            <td><?php echo $row['OPD']?></td>
                            <td><?php echo $row['room_no']?></td>
                            <td><?php echo $row['department_name']?></td>
                            <td><button type="button" id="<?php echo $row['id'] ?>"class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#editmodal"> Edit </button> <button type="button" id="del<?php echo $row['id'] ?>"class="btn btn-danger btn-sm delete"> Delete </button></td>
                <?php
                    } 
                ?>
                        </tbody>
                    </table>
        </div>

        <div class=" container md-7">
            <hr>
               <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
                <script>
                    $(document).ready( function () {
                    $('#myTable').DataTable();
                    } );
                </script>

                <script>
                    edits = document.getElementsByClassName('edit');
                    Array.from(edits).forEach((element)=>
                    {
                        element.addEventListener("click",(e)=>
                        {
                            console.log("edit", );
                            tr = e.target.parentNode.parentNode;
                            hospital_name = tr.getElementsByTagName("td")[1].innerText;
                            doctor_name = tr.getElementsByTagName("td")[2].innerText;
                            day_schedule = tr.getElementsByTagName("td")[3].innerText;
                            time_schedule = tr.getElementsByTagName("td")[4].innerText;
                            OPD = tr.getElementsByTagName("td")[5].innerText;
                            room_no = tr.getElementsByTagName("td")[6].innerText;
                            department = tr.getElementsByTagName("td")[7].innerText;

                            console.log(hospital_name,doctor_name,day_schedule,time_schedule,OPD,room_no,department,);
                            hospital_nameEdit.value = hospital_name;
                            doctor_nameEdit.value = doctor_name;
                            day_scheduleEdit.value = day_schedule;
                            time_scheduleEdit.value = time_schedule;
                            OPDEdit.value = OPD;
                            room_noEdit.value = room_no;
                            departmentEdit.value = department;
                            snoEdit.value = e.target.id;
                            console.log(e.target.id);
                        })
                    })

                    deletes = document.getElementsByClassName('delete');
                    Array.from(deletes).forEach((element)=>
                    {
                        element.addEventListener("click",(e)=>
                        {
                            console.log("delete", );
                            tr = e.target.parentNode.parentNode;
                            sno = e.target.id.substr(3,);
                            sno.value = sno;
                            console.log(sno);

                            if(confirm("Press a button"))
                            {
                                console.log("yes");
                                window.location = `../Admin/doctor_schedule.php?delete=${sno}`;
                            }
                            else
                            {
                                console.log("no");
                            }
                        })
                    })
                </script>
        </div>
    </section>

    <section id="footer" style="background-color:black;height:80px">
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
<?php
    }
}
?>