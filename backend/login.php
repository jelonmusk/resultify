<?php
    
    require "connect.php";
    session_start();
    $error = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $myusername = mysqli_real_escape_string($conn,$_POST['username']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
        
        $sql = "SELECT id FROM superuser WHERE username = '$myusername' AND password = '$mypassword'";
        $result = mysqli_query($conn,$sql);        
        $count = mysqli_num_rows($result);
        if($count==1)
        {
            $_SESSION['login_user'] = $myusername;
            header("location: dashboard.php");
        }
        else
        {
            $error = "Your Username or Password is inavlid. Please try again.";
        }
    }
        

?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--main css-->
  <link rel="stylesheet" href="main.css">

  <title>My Results</title>
</head>

<body>
  <section class="login">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 left">
                    <img src="assets/students.svg">
                    <p class="heading">Student Result App</p>
                    <p class="sub-heading">Enter username and password to store results.</p>  
                </div>
                <div class="col-md-6 right">
                    <div class="login_card">
                        <form method="post" action="">
                          <div class="form-row">
                            <h3>Student Results</h3>
                          </div>
                          <div class="form-row">
                            <label>Username</label>
                            <input name="username" class="form-control"  type="text"  />
                          </div>
                          <div class="form-row">
                            <label>Password</label>
                            <input name="password" class="form-control" type="password"  />
                          </div>
                          <div class="form-row">
                            <button type="submit">SUBMIT</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>