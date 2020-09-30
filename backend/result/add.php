<?php
    require '../session.php';
?>
<?php
    $msg= "";
    if( isset($_POST['usn']) ){
        $sql = "INSERT INTO students (usn, name, dept_id, sem_id, sub1, sub2, sub3, sub4, sub5, sub6,lab1,lab2)
            VALUES ('$_POST[usn]', '$_POST[name]', '$_POST[dept]', '$_POST[sem]'
            , '$_POST[sub1]', '$_POST[sub2]', '$_POST[sub3]','$_POST[sub4]',
            '$_POST[sub5]','$_POST[sub6]','$_POST[lab1]','$_POST[lab2]' )";
            if ($conn->query($sql) === TRUE) {
                sleep(2);
                $msg="Student's Result added successully";
            } 
            else {
                $msg="Couldn't add student's result";
                echo("Error description: " . mysqli_error($conn));
            }        
    } 
?>

<style>
    .heading {
        font-size: 22px;
    }

    .row {
        padding-top: 20px;
        padding-bottom: 20px;
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

    <title>Results</title>
</head>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <?php include '../header.php' ?>

    <div class="container" style="margin-top:50px;">
        <p class="heading" style="margin:0 auto;"><?php echo $msg; ?></p>
        <p class="heading">Add Result</p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label for="usn">USN</label>
                    <input type="text" class="form-control" id="usn" placeholder="Enter USN" name="usn">
                </div>
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="dept">Department</label>
                    <select id="dept" class="form-control" name="dept">
                        <?php 
                                require'../connect.php';
                                $sql = "SELECT id , department FROM departments";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                            ?>
                        <option value="<?php echo $row["id"];?>">
                            <?php echo $row["department"];?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sem">Semester</label>
                    <select id="sem" class="form-control" name="sem">
                        <?php 
                                require'../connect.php';
                                $sql = "SELECT id , semester FROM semesters";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                ?>

                        <option value="<?php echo $row["id"];?>">
                            <?php echo $row["semester"];?>
                        </option>
                        <?php } 
                            ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="subjects">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">SUBMIT</button>
                </div>
            </div>
        </form>

        <script>
            $(document).ready(function () {
                $("#subjects").load("subjects.php?dept=1&sem=1");

                $("#dept").change(function () { 
                    var dept_id = this.value;
                    var sem_id = $("#sem").val();
                    $.ajax({
                        url: "subjects.php",
                        type: "GET",
                        data: {
                            dept: dept_id,
                            sem: sem_id
                        },
                        cache: false,
                        success: function (res) {
                            $("#subjects").html(res);
                        }
                    })
                })
                
                $("#sem").change(function (){
                    var sem_id = this.value;
                    var dept_id = $("#dept").val();
                    $.ajax({
                        url: "subjects.php",
                        type: "GET",
                        data: {
                            dept:dept_id,
                            sem: sem_id
                        },
                        cache: false,
                        success: function (res){
                            $("#subjects").html(res);
                        }
                    })
                })

            });                 
        </script>
</body>

</html>