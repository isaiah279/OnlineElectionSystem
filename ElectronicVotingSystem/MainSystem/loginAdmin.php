<html lang="en">
<head>
  <?php session_start();?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
</head>
<body>
    <header>
    </header>
    </header>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login As Admin</span></div>
        <form action=""method="POST">
          <div class="row">
            
            <input type="text" placeholder="Enter Your Id" required name="usernameAdmin">
          </div>
          <div class="row">
           
            <input type="password" placeholder="Password" required name="password">
          </div>
          <div class="pass"><a href="#">Forgot password?</a></div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="voters_add.php">Signup now</a></div>
        </form>
      </div>
    </div>
</body>
<?php 
include('connection.php');
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$databaseName);
if(isset($_POST['usernameAdmin'])){
    $username=stripslashes($_REQUEST['usernameAdmin']);
    $username=mysqli_real_escape_string($conn,$username);
    $password=stripcslashes($_REQUEST['password']);
    $password=mysqli_real_escape_string($conn,$password);
    $query="SELECT*FROM admin  WHERE admin_id='$username' AND password='$password'";

    $result=mysqli_query($conn,$query);
    $rows=mysqli_num_rows(($result));

    if($rows==1){
        // header('location :landingpage.php');
        // $_SESSION['usernameAdmin'] = $username;
        echo"<h1></h1>";
        echo'<script> alert("You have Logged in successfully as  Admin  ")</script>';
 
        // header('Refresh: 10; URL=voting.php');
    
        header("Location:admin.php");
    }
    else{
        echo'<script> alert("error occured during login ,Try after sometimes ")</script>';
    //    header( "refresh:1;url=voting.php" );
    }
}?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  background:lavender;
  overflow: hidden;
}
::selection{
  background: rgba(26,188,156,0.3);
}
.container{
  max-width: 440px;
  padding: 0 20px;
  margin: 170px auto;
}
.wrapper{
  width: 100%;
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
}
.wrapper .title{
  height: 90px;
  background:blue;
  border-radius: 5px 5px 0 0;
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  font-family: 'Courier New', Courier, monospace;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form{
  padding: 30px 25px 25px 25px;
}
.wrapper form .row{
  height: 45px;
  margin-bottom: 15px;
  position: relative;
}
.wrapper form .row input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 60px;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 16px;
  transition: all 0.3s ease;
}
form .row input:focus{
  border-color: #16a085;
  box-shadow: inset 0px 0px 2px 2px rgba(26,188,156,0.25);
}
form .row input::placeholder{
  color: #999;
}
.wrapper form .row i{
  position: absolute;
  width: 47px;
  height: 100%;
  color: #fff;
  font-size: 18px;
  background: #16a085;
  border: 1px solid #16a085;
  border-radius: 5px 0 0 5px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.wrapper form .pass{
  margin: -8px 0 20px 0;
}
.wrapper form .pass a{
  color: #16a085;
  font-size: 17px;
  text-decoration: none;
}
.wrapper form .pass a:hover{
  text-decoration: underline;
}
.wrapper form .button input{
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  padding-left: 0px;
  background:blueviolet;
  border: 1px solid #16a085;
  cursor: pointer;
}
form .button input:hover{
  background:orange;
}
.wrapper form .signup-link{
  text-align: center;
  margin-top: 20px;
  font-size: 17px;
}
.wrapper form .signup-link a{
  color: #16a085;
  text-decoration: none;
}
form .signup-link a:hover{
  text-decoration: underline;
}

</style>
</html>