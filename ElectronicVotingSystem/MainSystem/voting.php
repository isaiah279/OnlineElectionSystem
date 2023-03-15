<?php 
require('connection.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Vote you Voice </title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <!-- Chairman begins CHAIR BEGINS HERE -->
  <script>
function checkOnlyOne(checkbox) {
  // Get all checkboxes in the table
  var checkboxes = document.querySelectorAll('table input[type="checkbox"]');
  
  // Uncheck all other checkboxes except the one that was clicked
  checkboxes.forEach(function(box) {
    if (box !== checkbox) {
      box.checked = false;
    }
  });
}
</script>
    <h1> It's Your Right to Vote </h1>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Vote Your Favorite Leader(Today's Date : <?php echo $todaysDate = date("m-d-Y");?>)</h1>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="electionResults.php">Election Results</a></li>
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Vote</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Form Basic -->


              <!-- Input Group -->
        <form method="post"action="">
            <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 
                  <!-- <h6 class="m-0 font-weight-bold text-danger">Note: <i>Click on the checkboxes besides each Candidate and Submit</i></h6><br> -->
                  <h3 class="align-items-center">Chair</h3>
                </div>
                <div class="table-responsive p-3">
                <!-- <?php echo $statusMsg; ?> -->
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                      <th>Profile</th>
                        <th>Position</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- <td><input name='check[]' type='checkbox' value=".$rows['admissionNumber']." class='form-control'></td> -->
                    <!-- echo "<input name='admissionNo[]' value=".$rows['admissionNumber']." type='hidden' class='form-control'>"; -->
                    <?php
                    require('boostraplinks.php');
$i = 1; 
$qry = "SELECT candidate_id,photo, position, firstname, lastname FROM chair";
$run = $conn->query($qry);
$i = 1;
if ($run->num_rows > 0) {
    while ($row = $run->fetch_assoc()) {
        $id = $row['firstname'];
        $imageData = $row['photo'];
        $position = $row['position'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $image = (!empty($row['photo'])) ? 'image'.$row['photo'] : 'image';
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><img width='50px' height='50px' src="image?id=<?php echo $id; ?>" alt="<?php echo $image;?>"></td>
            <td><?php echo $position; ?></td>
            <td><?php echo $firstname; ?></td>
            <td><?php echo $lastname; ?></td>
            <td><input name='check[]' type='checkbox' value='<?php echo $row['candidate_id']; ?>' class="form-check-input" onclick='checkOnlyOne(this)'></td>
            <td>
                <div class="bookbtn">
                    <!-- add your action button code here -->
                </div>
            </td>
        </tr>
       
<?php
    }
} else {
    echo "No records found.";
}
?>
<!-- CHECKING WHETHER THE VOTER HAS VOTED OR NOT RESTRICTS VOTING ONCE-->
<?php
if(isset($_POST['submit'])) {
  // Check if the 'check' index is set in $_POST
  if(isset($_POST['check'])) {
    $candidate_ids = $_POST['check']; // Define and populate $candidate_ids
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    // Insert the form data into the votes table
    foreach ($candidate_ids as $candidate_id) {
      $qry = "INSERT INTO chair_votes (candidate_id, firstname) VALUES ('$candidate_id', '$firstname')";
      $result = $conn->query($qry);

      if ($result) {
        echo "Vote submitted successfully.";
        // Increment the vote count for the candidate in the candidates table
        $qry = "UPDATE chair_votes SET vote_count = vote_count + 1 WHERE candidate_id = '$candidate_id'";
        $result = $conn->query($qry);
        if ($result) {
          echo  '<script>alert("Candidate vote count incremented successfully.")</script>';
        } else {
          echo'<script>alert("Error updating candidate vote count:")</script>';
        }
      } else {
        echo  '<script>alert("Error submitting vote: " "Error updating candidate vote count: ")</script>'. $conn->error;
      }
    }
  } else {
    echo "Please select at least one candidate.";
  }
}

?>

                    </tbody>
                  </table>
             
                  <br>
                  <div class="container-contract">
                  <div class="contract">
              
                  <!-- </div>
                  <label for="From">From Date:</label> <input type="date"form-control placeholder="Enter Date"name="fromDate"class="datepicker"required>
                  <label for="to">To Date :</label><input type="date"form-control placeholder="Enter Date"name="toDate"class="datepicker"><br><br>
                  </div> -->

                  <button type='submit' name='submit'>Submit  to Vote</button>
                  </form>
                </div>
              </div>
            </div>
<!-- TREASURER BEGINS HERE -->
              <!-- Input Group -->
              <form method="post"action="">
            <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 
                  <!-- <h6 class="m-0 font-weight-bold text-danger">Note: <i>Click on the checkboxes besides each Candidate and Submit</i></h6><br> -->
                  <h3 class="align-items-center">Treasurer</h3>
                </div>
                <div class="table-responsive p-3">
                <!-- <?php echo $statusMsg; ?> -->
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                      <th>Profile</th>
                        <th>Position</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- <td><input name='check[]' type='checkbox' value=".$rows['admissionNumber']." class='form-control'></td> -->
                    <!-- echo "<input name='admissionNo[]' value=".$rows['admissionNumber']." type='hidden' class='form-control'>"; -->
                    <?php
                    require('boostraplinks.php');
$i = 1; 
$qry = "SELECT candidate_id,photo, position, firstname, lastname FROM treasurer";
$run = $conn->query($qry);
$i = 1;
if ($run->num_rows > 0) {
    while ($row = $run->fetch_assoc()) {
        $id = $row['firstname'];
        $imageData = $row['photo'];
        $position = $row['position'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $image = (!empty($row['photo'])) ? 'image'.$row['photo'] : 'image';
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><img width='50px' height='50px' src="image?id=<?php echo $id; ?>" alt="<?php echo $image;?>"></td>
            <td><?php echo $position; ?></td>
            <td><?php echo $firstname; ?></td>
            <td><?php echo $lastname; ?></td>
            <td><input name='check[]' type='checkbox' value='<?php echo $row['candidate_id']; ?>' class="form-check-input" onclick='checkOnlyOne(this)'></td>
            <td>
                <div class="bookbtn">
                    <!-- add your action button code here -->
                </div>
            </td>
        </tr>
       
<?php
    }
} else {
    echo "No records found.";
}
?>
<!-- CHECKING WHETHER THE VOTER HAS VOTED OR NOT RESTRICTS VOTING ONCE-->
<?php


if(isset($_POST['submit']) && isset($_POST['check'])) {
  $candidate_ids = $_POST['check'];
  $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';

  // Insert the form data into the votes table
  foreach ($candidate_ids as $candidate_id) {
    $qry = "INSERT INTO treasurer_votes (candidate_id, firstname) VALUES ('$candidate_id', '$firstname')";
    $result = $conn->query($qry);

    if ($result) {
      echo "Vote submitted successfully.";

      // Increment the vote count for the candidate in the candidates table
      $qry = "UPDATE treasurer_votes SET vote_count = vote_count + 1 WHERE candidate_id = '$candidate_id'";
      $result = $conn->query($qry);

      if ($result) {
        echo  '<script>alert("You have   successfully Voted here.")</script>';
      } else {
        echo'<script>alert("Error updating candidate vote count:")</script>';
      }
    } else {
      echo  '<script>alert("Error submitting vote: " "Error updating candidate vote count: ")</script>'. $conn->error;
    }
  }
}
   ?>
                    </tbody>
                  </table>
             
                  <br>
                  <div class="container-contract">
                  <div class="contract">
                

                  <button type='submit' name='submit'>Submit to Vote</button>
                  </form>
                </div>
              </div>
            </div>

<!-- TREASUERE ENDS HERE -->


  <!-- Welfare begins here -->
<script>
function checkOnlyOne(checkbox) {
  // Get all checkboxes in the table
  var checkboxes = document.querySelectorAll('table input[type="checkbox"]');
  
  // Uncheck all other checkboxes except the one that was clicked
  checkboxes.forEach(function(box) {
    if (box !== checkbox) {
      box.checked = false;
    }
  });
}
</script>
              <!-- Input Group -->
        <form method="post"action="">
            <div class="row">
              <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <!-- <h6 class="m-0 font-weight-bold text-danger">Note: <i>Click on the checkboxes besides each Candidate and Submit</i></h6><br> -->
                  <h3 class="align-items-center">Welfare</h3>
                </div>
                <div class="table-responsive p-3">
                <!-- <?php echo $statusMsg; ?> -->
                  <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                      <th>Profile</th>
                        <th>Position</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- <td><input name='check[]' type='checkbox' value=".$rows['admissionNumber']." class='form-control'></td> -->
                    <!-- echo "<input name='admissionNo[]' value=".$rows['admissionNumber']." type='hidden' class='form-control'>"; -->
                    <?php
                    require('boostraplinks.php');
$i = 1; 
$qry = "SELECT candidate_id,photo, position, firstname, lastname FROM candidates";
$run = $conn->query($qry);
$i = 1;
if ($run->num_rows > 0) {
    while ($row = $run->fetch_assoc()) {
        $id = $row['firstname'];
        $imageData = $row['photo'];
        $position = $row['position'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $image = (!empty($row['photo'])) ? 'image'.$row['photo'] : 'image';
?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><img width='50px' height='50px' src="image?id=<?php echo $id; ?>" alt="<?php echo $image;?>"></td>
            <td><?php echo $position; ?></td>
            <td><?php echo $firstname; ?></td>
            <td><?php echo $lastname; ?></td>
            <td><input   name='check[]' type='checkbox' value='<?php echo $row['candidate_id']; ?>' class="form-check-input" onclick='checkOnlyOne(this)'></td>
            <td>
                <div class="bookbtn">
                    <!-- add your action button code here -->
                </div>
            </td>
        </tr>
<?php
    }
} else {
    echo "No records found.";
}
?>
<!-- CHECKING WHETHER THE VOTER HAS VOTED OR NOT RESTRICTS VOTING ONCE-->
<?php
if(isset($_POST['submit'])) {
  if(isset($_POST['check'])) {
    $candidate_ids = $_POST['check'];
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    // Insert the form data into the votes table
    foreach ($candidate_ids as $candidate_id) {
      $qry = "INSERT INTO votes (candidate_id, firstname) VALUES ('$candidate_id', '$firstname')";
      $result = $conn->query($qry);
      if ($result) {
        echo "Vote submitted successfully.";
        // Increment the vote count for the candidate in the candidates table
        $qry = "UPDATE votes SET vote_count = vote_count + 1 WHERE candidate_id = '$candidate_id'";
        $result = $conn->query($qry);

        if ($result) {
          echo  '<script>alert("Candidate vote count incremented successfully.")</script>';
        } else {
          echo'<script>alert("Error updating candidate vote count:")</script>';
        }
      } else {
        echo  '<script>alert("Error submitting vote: " "Error updating candidate vote count: ")</script>'. $conn->error;
      }
    }
  } else {
    echo "No candidate selected.";
  }
}
   ?>
                    </tbody>
                  </table>
             
                  <br>
                  <div class="container-contract">
                  <div class="contract">
                  
                  <button type='submit' name='submit'>Submit Vote</button>
                  </form>
                </div>
              </div>
            </div>
</body>
<style>
    body{
        background-color: aqua;
    }
    h1{
        text-align: center;
    }
        input.largerCheckbox {
            width: 40px;
            height: 40px;   
        }
        .datepicker-toggle {
  display: inline-block;
  position: relative;
  width: 18px;
  height: 19px;
}
.datepicker {
  width: 300px;
  height: 40px;
  background-color:darkblue;
  margin-left: 25px;
  border-radius: 4px ;
  border: none;
  outline: none;
}
label{
  font-size: 1.2rem;
}
.contract
/* .container-contract{
  width: 300px;
  height: 100px;
  background-color: aqua;
} */
.bookbtn a{

  background-color: red;
}
.bookbutton{
width: 200px;
height: 40px;
background-color: orange;
padding: 20px;


}
.bookbutton a{
  text-decoration: none;
  font-style: normal;
  padding: 20px;

}
.bookbutton:hover{
  color: white;
  background-color: aqua;
  cursor: pointer;
}
.position-title{
  text-align: center;
}
    </style>

</html>
<!--Cheching if Booked else  Saving The booked Teachers  -->