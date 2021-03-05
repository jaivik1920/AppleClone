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
      body{
          background-color: black;
      }
      img{
          height: 200px;
      }
      .logic{
          border:2px solid yellow;
      }
      footer{
          height: 50px;
      }
    </style>
</head>

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
    <h1 class="text-center my-4 text-warning">Welcome To iCoder</h1>
    <div class="container">
        <?php
            include "dbconnect.php";

            $sql="SELECT * FROM `category`";
            $result=mysqli_query($conn,$sql);
            $no=mysqli_num_rows($result);
           while($row=(mysqli_fetch_assoc($result))){
               $str=$row["cat_desc"];
               $str=substr($str,0,100);
               echo '
               <div class="card d-inline-block mx-4 my-4 logic" style="width: 18rem;">
                 <img src='.$row["img"].' class="card-img-top" alt="...">
                 <div class="card-body text-white bg-dark">
                    <h5 class="card-title">'.$row["cat_name"].'</h5>
                     <p class="card-text">'.$str.'...</p>
                    <a href="viewcat.php?catid='.$row["cat_id"].'" class="btn btn-primary ">View</a>
                 </div>
              </div>
               ';
           }
        ?>
    </div>
   
    <footer class="text-center text-white">Copyright <i class="fa fa-copyright"></i> 2020-21 iCoder Inc.All Rights Reserved.&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; Privacy Policy
        &nbsp;&nbsp;| &nbsp;&nbsp; Terms of Use &nbsp;&nbsp;|
        &nbsp;&nbsp;Sales Policy &nbsp;&nbsp;|&nbsp;&nbsp; Legal &nbsp;&nbsp;|&nbsp;&nbsp; Site Map
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INDIA

    </footer>
</body>

</html>