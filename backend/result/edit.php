<?php
    require '../session.php';
    require '../connect.php';

    $usn = "";
    $name = "";
    $dept_id = "";
    $sem_id = "";
    $sub1 = "";
    $sub2 = "";
    $sub3 = "";
    $sub4 = "";
    $sub5 = "";
    $sub6 = "";
    $lab1 = "";
    $lab2 = "";

    if( isset($_POST['edit_id']) ){        
        $sql = "SELECT * FROM students WHERE id = '$_POST[edit_id]'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count==1)
        {
			while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $usn = $row['usn'];
                $name = $row['name'];
                $dept_id = $row['dept_id'];
                $sem_id = $row['sem_id'];
            }
        }
    } 
?>

<!-- updating table -->
<?php 
$message =" ";
    
    if(isset($_POST['usn'])) { 
        // $sql = "UPDATE students SET usn = '$_POST[usn]',name= '$_POST[name]',dept_id= '$_POST[dept_id]',sem_id= '$_POST[sem_id]',sub1= '$_POST[sub1]',sub2= '$_POST[sub2]',sub3= '$_POST[sub3]',sub4= '$_POST[sub4]',sub5= '$_POST[sub5]',sub6= '$_POST[sub6]',lab1= '$_POST[lab1]',lab2= '$_POST[lab2]' WHERE id='$id";
        $sql = "UPDATE students SET usn = '$_POST[usn]', name= '$_POST[name]',dept_id= '$_POST[dept]',sem_id= '$_POST[sem]',sub1= '$_POST[sub1]',sub2= '$_POST[sub2]',sub3= '$_POST[sub3]',sub4= '$_POST[sub4]',sub5= '$_POST[sub5]',sub6= '$_POST[sub6]',lab1= '$_POST[lab1]',lab2= '$_POST[lab2]' WHERE id='$_POST[id]'";
        if ($conn->query($sql) === TRUE) 
        {
            $message= <<<EOT
            <div class="alert alert-success" role="alert">Record updated successfully!!!</div>
            EOT;
            
            header("location:http://localhost/resultify/backend/result/manage.php ");
        }
        else
        {
            $message= <<<EOT
            <div class="alert alert-danger" role="alert">Error!!! Couldn't create record</div>
            EOT;
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
        <p class="heading" style="margin:0 auto;"> Edit Result</p>
        <div class="col-md-4"><?php echo $message; ?></div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label>ID</label>
                    <input type="text" class="form-control" name="id" value = "<?php echo $id; ?>" readonly="readonly"  />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="usn">USN</label>
                    <input type="text" class="form-control" id="usn" placeholder="Enter USN" name="usn" value = "<?php echo $usn; ?>">
                </div>
                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" value="<?php echo $name; ?>" name="name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="dept">Department</label>
                    <select id="dept" class="form-control" name="dept" >
                        <?php 
                                require'../connect.php';
                                $sql = "SELECT id , department FROM departments";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                    if($row['id']==$dept_id){
                                        echo "<option value=$row[id] selected>$row[department]</option>";
                                    }
                                    else{
                                            echo "<option value=$row[id]>$row[department]</option>";
                                    }
                                }
                             ?>
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
                                    if($row['id']==$sem_id){
                                        echo "<option value=$row[id] selected>$row[semester]</option>";
                                    }
                                    else{
                                            echo "<option value=$row[id]>$row[semester]</option>";
                                    }} 
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
    </div>

    <script>
            var usn = <?php echo $_POST['edit_id'] ?>;

            console.log(usn)
            $(document).ready(function () {
                
                $("#subjects").load("subjects.php?edit_id=" + <?php echo $_POST['edit_id'] ?>);

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
