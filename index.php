<?php
$status="";
require 'connect.php';

if(isset($_GET['usn']))
{ 
    $sql = "SELECT * FROM students WHERE usn='$_GET[usn]'";
    $result = $conn->query($sql);    
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        while($row = $result->fetch_assoc()) {
            $usn = $row["usn"];
            $name = $row["name"];
            $dept_id = $row["dept_id"];
            $sem_id = $row["sem_id"];
            $sub1 = $row["sub1"];
            $sub2 = $row["sub2"];
            $sub3 = $row["sub3"];
            $sub4 = $row["sub4"];
            $sub5 = $row["sub5"];
            $sub6 = $row["sub6"];
            $lab1 = $row["lab1"];
            $lab2 = $row["lab2"];
        }
        $total = $sub1+$sub2+$sub3+$sub4+$sub5+$sub6+$lab1+$lab2;
        if($total>280){
            $status = "Promoted";
        }
        else{
            $status = "Demoted";
        }

    }
}

?>

<style>
    .heading {
        font-size: 22px;
        font-weight: 600;
    }
</style>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--FONTAWESOME CSS-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <title>Results</title>
</head>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

        <?php include 'header.php'; ?>
    <!---result table-->
    <section class="index">
        <div class="container" style="padding-bottom:45px;">
            <div class="row" style="padding-top:25px"></div>
            <div class="row" style="padding-top:25px">
                <div class="col-md-12 res_top" style="padding:20px; border:1px solid #8762a3">
                    <div class="row" style="background-color:#000000 ;">
                        <div class="col-md-6 student_name"
                            style=" background-color:#8762a3;  border-right:0.5px solid #8762a3; color: white; display:flex; align-items:center;">
                            <h3 style="color:black; font-weight:600">Student's Name: <?php echo $name; ?></h3>
                        </div>
                        <div class="col-md-6 student_details">
                            <h4 style="font-weight:600; color:rgba(255,255,255,0.6);">USN: <?php echo $usn; ?></h4>
                            <h4 style="font-weight:600; color:rgba(255,255,255,0.6);">Department: <?php 
                                require 'connect.php';
                                if(isset($_GET['usn']))
                                {    
                                    
                                    $sql = "SELECT * from departments WHERE id='$dept_id'";
                                    $result = $conn->query($sql);    
                                    $count = mysqli_num_rows($result);
                                    if($count == 1)
                                    {
                                        while($row = $result->fetch_assoc()) {
                                            $dept_name=$row["department"];
                                            echo $dept_name;
                                        }
                                    }
                                }
                            ?></h4>
                            <h4 style="font-weight:600; color:rgba(255,255,255,0.6);">Semester: <?php 
                                require 'connect.php';
                                if(isset($_GET['usn']))
                                {    
                                    
                                    $sql = "SELECT * from semesters WHERE id='$sem_id'";
                                    $result = $conn->query($sql);    
                                    $count = mysqli_num_rows($result);
                                    if($count == 1)
                                    {
                                        while($row = $result->fetch_assoc()) {
                                            $dept_name=$row["semester"];
                                            echo $dept_name;
                                        }
                                    }
                                }
                            ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top:50px;">
                <div class="col-md-12" style=" padding-left:0px; padding-right:0px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color: black; color: white;">
                                <th scope="col">Subject</th>
                                <th scope="col">Marks Scored</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <?php 
                                    require 'connect.php';
                                    if(isset($_GET['usn']))
                                    {    
                                        
                                        $sql = "SELECT * from subjects WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
                                        $result = $conn->query($sql);    
                                        $count = mysqli_num_rows($result);
                                        if($count == 1)
                                        {
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["sub1_name"];
                                            }
                                        }
                                    }
                                ?>
                                </th>
                                <td>
                                    <?php echo $sub1;?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <?php 
                                    require 'connect.php';
                                    if(isset($_GET['usn']))
                                    {    
                                        
                                        $sql = "SELECT * from subjects WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
                                        $result = $conn->query($sql);    
                                        $count = mysqli_num_rows($result);
                                        if($count == 1)
                                        {
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["sub2_name"];
                                            }
                                        }
                                    }
                                ?>
                                </th>
                                <td>
                                    <?php echo $sub2;?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <?php 
                                    require 'connect.php';
                                    if(isset($_GET['usn']))
                                    {    
                                        
                                        $sql = "SELECT * from subjects WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
                                        $result = $conn->query($sql);    
                                        $count = mysqli_num_rows($result);
                                        if($count == 1)
                                        {
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["sub3_name"];
                                            }
                                        }
                                    }
                                ?>
                                </th>
                                <td>
                                    <?php echo $sub3;?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <?php 
                                    require 'connect.php';
                                    if(isset($_GET['usn']))
                                    {    
                                        
                                        $sql = "SELECT * from subjects WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
                                        $result = $conn->query($sql);    
                                        $count = mysqli_num_rows($result);
                                        if($count == 1)
                                        {
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["sub4_name"];
                                            }
                                        }
                                    }
                                ?>
                                </th>
                                <td>
                                    <?php echo $sub4;?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <?php 
                                    require 'connect.php';
                                    if(isset($_GET['usn']))
                                    {    
                                        
                                        $sql = "SELECT * from subjects WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
                                        $result = $conn->query($sql);    
                                        $count = mysqli_num_rows($result);
                                        if($count == 1)
                                        {
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["sub5_name"];
                                            }
                                        }
                                    }
                                ?>
                                </th>
                                <td>
                                    <?php echo $sub5;?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <?php 
                                    require 'connect.php';
                                    if(isset($_GET['usn']))
                                    {    
                                        
                                        $sql = "SELECT * from subjects WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
                                        $result = $conn->query($sql);    
                                        $count = mysqli_num_rows($result);
                                        if($count == 1)
                                        {
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["sub6_name"];
                                            }
                                        }
                                    }
                                ?>
                                </th>
                                <td>
                                    <?php echo $sub6;?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <?php 
                                    require 'connect.php';
                                    if(isset($_GET['usn']))
                                    {    
                                        
                                        $sql = "SELECT * from subjects WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
                                        $result = $conn->query($sql);    
                                        $count = mysqli_num_rows($result);
                                        if($count == 1)
                                        {
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["lab1_name"];
                                            }
                                        }
                                    }
                                ?>
                                </th>
                                <td>
                                    <?php echo $lab1;?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <?php 
                                    require 'connect.php';
                                    if(isset($_GET['usn']))
                                    {    
                                        
                                        $sql = "SELECT * from subjects WHERE dept_id='$dept_id' AND sem_id='$sem_id'";
                                        $result = $conn->query($sql);    
                                        $count = mysqli_num_rows($result);
                                        if($count == 1)
                                        {
                                            while($row = $result->fetch_assoc()) {
                                                echo $row["lab2_name"];
                                            }
                                        }
                                    }
                                ?>
                                </th>
                                <td>
                                    <?php echo $lab2;?>
                                </td>
                            </tr>
                            <tr class="table-success" >
                                <th scope="row" >Total</th>
                                <td><?php echo $total; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="padding-top:20px;">
                <div class="col-md-12" >
                    <h3 style="font-weight:600; text-align:right">RESULT : <?php echo $status; ?></h3>
                </div>
            </div>
            <div class="row" style="padding-top:25px"></div>
    </section>
</body>

</html>