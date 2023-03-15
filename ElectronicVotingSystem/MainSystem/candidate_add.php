<?php

require('connection.php');
require('boostraplinks.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$dir_name = "uploads";

// Register user with profile photo
if(isset($_POST['register'])) {
    $candidate_id=$_POST['candidate_id'];
    $position = $_POST['position'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    if(isset($_POST['register'])) {
        $candidate_id=$_POST['candidate_id'];
        $position = $_POST['position'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        // Check if username or email already exists
        $sql = "SELECT * FROM candidates WHERE candidate_id = '$candidate_id' AND position = '$position'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("Candidate  already exist")</script>';
        } else {
            // Upload profile photo
            if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                $target_dir = $dir_name;
                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $extensions_arr = array("jpg","jpeg","png","gif");

                if(in_array($imageFileType,$extensions_arr)){
                    move_uploaded_file($_FILES["photo"]["tmp_name"],$target_file);
                    // Insert user data into database
                    switch ($position) {
                        case "Chairman":
                            $table = "chair";
                            break;
                        case "Secretary":
                            $table = "secgeneral";
                            break;
                        case "Treasurer General":
                            $table = "treasurer";
                            break;
                        default:
                            $table = "candidates";
                            break;
                    }
                    $sql = "INSERT INTO $table (candidate_id, position, firstname, lastname, photo) VALUES ('$candidate_id', '$position', '$firstname', '$lastname', '$target_file')";
                    if (mysqli_query($conn, $sql)) {
                        echo '<script>alert("You have registered a candidate successfully!")</script>';
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            } else {
                // Insert user data into database without photo
                switch ($position) {
                    case "Chairman":
                        $table = "chair";
                        break;
                    case "Secretary":
                        $table = "secgeneral";
                        break;
                    case "Treasurer General":
                        $table = "treasurer";
                        break;
                    default:
                        $table = "candidates";
                        break;
                }
                $sql = "INSERT INTO $table (candidate_id, position, firstname, lastname) VALUES ('$candidate_id', '$position', '$firstname', '$lastname')";
                if (mysqli_query($conn, $sql)) {
                  echo '<script>alert("You have registered a candidate successfully!")</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-5">
   <div class="card">
     <h2 class="card-title text-center">Add Candidate to Balot</h2>
      <div class="card-body py-md-4">
       <form method="post" enctype="multipart/form-data">
          <div class="form-group">
             <input type="text" class="form-control" id="name" placeholder="candidate ID"name="candidate_id">
        </div>
        <!-- <div class="form-group"> -->
             <!-- <input type="text" class="form-control" id="email" placeholder="Position"name="position"> -->
<select required name="position"class="select-control" placeholder="POsition">
  <option value="" disabled selected hidden>Choose a Candidate</option>
  <!-- <option value=""name="position">Select Course</option> -->
  <option value="Chairman">Chairman</option>
  <option value="Secretary">Secretary General</option>
  <option value="Treasurer General">Treasurer</option>
  
</select>
                            <!-- </div> -->
   <div class="form-group">
     <input type="text" class="form-control" id="password"required placeholder="first name"name="firstname">
   </div>
   <div class="form-group">
      <input type="text"required class="form-control" id="confirm-password" placeholder="Last name"name="lastname">
   </div>
   <div class="form-group">
      <input type="file"required class="form-control" id="confirm-password"name="photo">
   </div>
   <div class="d-flex flex-row align-items-center justify-content-between">
      <a href="#">Login</a>
                                <!-- <button class="btn btn-primary">Create Account</button> -->
                                 <button type="submit" name="register">Register</button>
          </div>
       </form>
     </div>
  </div>
</div>
</div>
</div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css?family=PT+Sans');

body{
  background: #fff;
  font-family: 'PT Sans', sans-serif;
  background-color: darkgoldenrod;
}
h2{
  padding-top: 1.5rem;
}
a{
  color: #333;
}
a:hover{
  color: #da5767;
  text-decoration: none;
}
.card{
  border: 0.40rem solid #f8f9fa;
  top: 10%;
}
.form-control{
  background-color: #f8f9fa;
  padding: 20px;
  padding: 25px 15px;
  margin-bottom: 1.3rem;
}
select{
  /* background-color: #f8f9fa; */
  padding: 10px;
  padding: 10px 5px;
  margin-bottom: 1.3rem;
  outline: 0;
  /* max-width: 450px; */
  /* width:450px; */
  /* height: ; */
}
select option{
  background-color: #f8f9fa;
  padding: 20px;
  padding: 25px 15px;
  margin-bottom: 1.3rem;
}
.form-control:focus {

    color: #000000;
    background-color: #ffffff;
    border: 3px solid #da5767;
    outline: 0;
    box-shadow: none;

}

.btn{
  padding: 0.6rem 1.2rem;
  background: #da5767;
  border: 2px solid #da5767;
}
.btn-primary:hover {

    
    background-color: #df8c96;
    border-color: #df8c96;
  transition: .3s;

}
</style>
</html>