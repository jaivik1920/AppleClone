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
        #small{
            font-size: 20px;
            margin: 20px 0px;
        }
        footer{
            margin-top: 250px;
        }
    </style>
</head>
<html>

<body>
    <div class="container my-4 d-flex flex-column align-items-center ">
        <h1 class="text-center text-white">Sign In</h1>
        <form action="signinhandler.php" method="POST">
            <div class="form-group text-white">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" style="width: 500px;">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group text-white">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-outline-success">SignIn</button>
           <a href="signup.php"><small id="small" class="form-text">Don't have an account?</small></a> 
        </form>
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