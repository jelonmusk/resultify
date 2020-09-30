<?php
    if(isset($_GET['edit_id'])){

        //FETCH THE MARKS FROM DB
        //CODE FOR EDIT.PHP

        $edit_id = $_GET['edit_id'];
        require '../connect.php';
        $sql = "SELECT * FROM students WHERE id = '$edit_id'";
        $result = $conn->query($sql);
        $student = $result->fetch_assoc();
        $count = mysqli_num_rows($result);
        if($count==0){
            echo "Select a Department and Semester";
        }
        else{
            $dept = $student['dept_id'];
            $sem = $student['sem_id'];

            require '../connect.php';
            $sql = "SELECT * FROM subjects WHERE dept_id='$dept' AND sem_id='$sem'";
            $result = $conn->query($sql);
            $subjects = $result->fetch_assoc();
            
            $str = <<<EOT
                <div class="col-md-6">
                    <label>{$subjects['sub1_name']}</label>
                    <input type="number" class="form-control" name="sub1" value="{$student['sub1']}" />
                </div>
                <div class="col-md-6">
                    <label>{$subjects['sub2_name']}</label>
                    <input type="number" class="form-control" name="sub2" value="{$student['sub2']}" />
                </div>
                <div class="col-md-6">
                    <label>{$subjects['sub3_name']}</label>
                    <input type="number" class="form-control" name="sub3" value="{$student['sub3']}" />
                </div>
                <div class="col-md-6">
                    <label>{$subjects['sub4_name']}</label>
                    <input type="number" class="form-control" name="sub4" value="{$student['sub4']}" />
                </div>
                <div class="col-md-6">
                    <label>{$subjects['sub5_name']}</label>
                    <input type="number" class="form-control" name="sub5" value="{$student['sub5']}" />
                </div>
                <div class="col-md-6">
                    <label>{$subjects['sub6_name']}</label>
                    <input type="number" class="form-control" name="sub6" value="{$student['sub6']}" />
                </div>
                <div class="col-md-6">
                    <label>{$subjects['lab1_name']}</label>
                    <input type="number" class="form-control" name="lab1" value="{$student['lab1']}" />
                </div>
                <div class="col-md-6">
                    <label>{$subjects['lab2_name']}</label>
                    <input type="number" class="form-control" name="lab2" value="{$student['lab2']}" />
                </div>
            EOT;
        }
    }
    else{
        $dept = $_GET["dept"];
        $sem = $_GET['sem'];


        // FETCH DEPT AND SEM SUBJECTS
        // CODE FOR ADD.PHP

        require '../connect.php';
        $sql = "SELECT * FROM subjects WHERE dept_id='$dept' AND sem_id='$sem'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $count = mysqli_num_rows($result);
        if($count==0){
            echo "Select a Department and Semester";
        }        
        else{
            $str = <<<EOT
                <div class="col-md-6">
                    <label>{$row['sub1_name']}</label>
                    <input type="number" class="form-control" name="sub1" />
                </div>
                <div class="col-md-6">
                    <label>{$row['sub2_name']}</label>
                    <input type="number" class="form-control" name="sub2" />
                </div>
                <div class="col-md-6">
                    <label>{$row['sub3_name']}</label>
                    <input type="number" class="form-control" name="sub3" />
                </div>
                <div class="col-md-6">
                    <label>{$row['sub4_name']}</label>
                    <input type="number" class="form-control" name="sub4" />
                </div>
                <div class="col-md-6">
                    <label>{$row['sub5_name']}</label>
                    <input type="number" class="form-control" name="sub5" />
                </div>
                <div class="col-md-6">
                    <label>{$row['sub6_name']}</label>
                    <input type="number" class="form-control" name="sub6" />
                </div>
                <div class="col-md-6">
                    <label>{$row['lab1_name']}</label>
                    <input type="number" class="form-control" name="lab1" />
                </div>
                <div class="col-md-6">
                    <label>{$row['lab2_name']}</label>
                    <input type="number" class="form-control" name="lab2" />
                </div>
            EOT;
        }
    }
?>

<body>
    <div class="row">
        <?php echo $str; ?>
    </div>
</body>