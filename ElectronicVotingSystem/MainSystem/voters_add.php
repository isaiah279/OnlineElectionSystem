<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <header>
    </header>
    <div class="wrapper">
    <h2>Register a Voter</h2>
    <form autocomplete="off"class="form" action=""method="post">
    <div class="input-box">
        <input type="text" placeholder="Enter Voter ID"name="votersid" required autocomplete="off">
      </div>
      
      <div class="input-box">
        <input type="text" placeholder="Enter First name" name="firstname"required autocomplete="off">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter Last name"name="lastname" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Enter password"name="password" required>
      </div>
     
      <!-- <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div> -->
      <div class="input-box button">
        <input type="submit"name="submit">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="#">Login now</a></h3>
      </div>
    </form>
  </div>
  <?php 
require('connection.php');
?>
  <?php
?>
<?php
include 'connection.php';

?>

<?php
 require('connection.php');
 // When form submitted, insert values into the database.
 if (isset($_REQUEST['votersid'])) {
     // removes backslashes
    

     $voters_id = stripslashes($_REQUEST['votersid']);
     $voters_id = mysqli_real_escape_string($conn, $voters_id);
     $firstname = stripslashes($_REQUEST['firstname']);
     $firstname = mysqli_real_escape_string($conn, $firstname);
     $lastname = stripslashes($_REQUEST['lastname']);
     $lastname = mysqli_real_escape_string($conn, $lastname);
     $password = stripslashes($_REQUEST['password']);
     $password = mysqli_real_escape_string($conn, $password);
     
     $query    = "INSERT into `voters` (voters_id, firstname, lastname, password)
                  VALUES ('$voters_id','$firstname','$lastname','$password')";
     $result   = mysqli_query($conn, $query);
     if ($result) {
         echo "<div class='form'>
               <h3>You are registered successfully.</h3><br/>
               <p class='link'>Click here to <a href='login.php'>Login</a></p>
               </div>";
     } else {
         echo"<script type='text/javascript'>
         <h3>Required fields are missing.</h3><br/>
         </script>
         <noscript>
         <span class='spam-protected'>Email address protected by JavaScript. Please enable JavaScript.</span>         </noscript>";
         
         
         "<div class='form'>
               <h3>Required fields are missing.</h3><br/>
               <p class='link'>Click here to <a href='login.php'>registration</a> again.</p>
               </div>";
              
  
     }
 } else {
?>


<?php
 }
?>


</body>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background:azure;
}
.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
  font-family: 'Courier New', Courier, monospace;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #4070f4;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background:blueviolet;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #0e4bf1;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}

</style>
</html>

