<!DOCTYPE html>
<html lang="en">

<head>
    <title>iCoder.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="logo.png" type="image/gif" sizes="20x20">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: black;
        }
    </style>


    <html>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">iCoder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php
                session_start();
                if(isset($_SESSION["loggedin"])){
                  echo  '<h4 class="text-white">'.$_SESSION["user"].'</h4>';
                    echo' 
               <a href="logouthandler.php" class="btn btn-outline-success my-2 my-sm-0 mx-4">Logout</a>';
                }
                else{
                echo'
               <a href="login.php" class="btn btn-outline-success my-2 my-sm-0 mx-4">Login</a> ';
                }
               ?>
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <?php
        include "dbconnect.php";
        $id=$_GET["prob"];
        $sql="select *from `problem` where prob_id='$id'";
        $result=mysqli_query($conn,$sql);
        $no=mysqli_num_rows($result);
        $row=mysqli_fetch_assoc($result);
        $userid=$row["user_id"];
        $sql1="select *from `users` where user_id='$userid'";
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $user=$row1["user_email"];
        echo '
        <div class="container my-4">
            <div class="media my-4 text-white">
                <img src="user.png" class="mr-3" alt="..." style="height: 80px;">
                <div class="media-body">
                    <h5 class="mt-0">'.$row["prob_name"].'</h5>
                    <span style="display: block;"> '.$row["prob_desc"].'</span>
                 <span style="display: block;">By:- <strong>'.$user.'</strong></span>
                </div>
            </div>
            </div>
            <div class="container my-4 d-flex flex-column align-item-center justify-content-center" style="height: 450px;">';
            if(!(isset($_SESSION["loggedin"]))){
                $path="answer.php?prob=$id";
            }
            else{
                $path="answerhandler.php?prob=$id";
            }
            echo '
                <form action='.$path.' method="POST">
                     <div class="form-group">
                         <label for="exampleFormControlTextarea1" class="text-white">Enter your Answer:-</label>
                         <textarea class="form-control" name="answer" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>';
        ?>

        <div class="container text-white  my-4">
        <?php
        include "dbconnect.php";
        $probid=$_GET["prob"];
        $sql="select *from `solution` where prob_id='$probid'";
        $result=mysqli_query($conn,$sql);
        $no=mysqli_num_rows($result);

        if($no==0){
            echo '
            <h2 class="text-center ">No Answered yet!!!</h2>';
        }
        else{
            echo '
            <h2 class="text-center ">Answers are here</h2>';
            while($row=mysqli_fetch_assoc($result))
            {
                $userid=$row["user_id"];
                $sql1="select *from `users` where user_id='$userid'";
                $result1=mysqli_query($conn,$sql1);
                $row1=mysqli_fetch_assoc($result1);
                $user=$row1["user_email"];
            echo '
            <div class="media my-4">
                <img src="user.png" class="mr-3" alt="..." style="height: 80px;">
                <div class="media-body">
                    <span style="display: block;"> '.$row["sol_desc"].'</span>
                 <span style="display: block;">By:- <strong>'.$user.' </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row["timestamp"].'</span>
                </div>
            </div>';
             }
        }
        ?>

    <footer class="text-center text-white">Copyright <i class="fa fa-copyright"></i> 2020-21 iCoder Inc.All Rights
        Reserved.&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; Privacy Policy
        &nbsp;&nbsp;| &nbsp;&nbsp; Terms of Use &nbsp;&nbsp;|
        &nbsp;&nbsp;Sales Policy &nbsp;&nbsp;|&nbsp;&nbsp; Legal &nbsp;&nbsp;|&nbsp;&nbsp; Site Map
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INDIA

    </footer>

</body>

</html>