<?php 
  session_start(); 
 
  	// Redirect to user dashboard page
      header("Location:loginAdmin.php");
      
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<header>
    
        <nav>
            <ol>
       
            </ol>
        </nav>
        <header>
            <?php include('connection.php');?>
<nav>
      <div class="nav-container">
        <a href="#" class="logo">Admin Page</a>
        <ul>
        <!-- <    <li><a href="admin.php">admin</a></li> -->
            <li><a href="home.php">home</a></li>
            <li><a href="voters_add.php">Register A Voter</a></li>
            <li><a href="votersList.php">Voters Registered</a></li>
            <li><a href="electionResults.php">Votes Cast</a></li>
          
            <li><a href="candidate_add.php">Add Candidate</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
      </div>
    </nav>
  </header>

    </header>
    <!--  -->
<div class="tablecontainer">
    <div class="table1">
            <!-- CHAIR BEGINS -->
<table style="width:300px;"id="tableDesign"  class="table table-success table-striped">
<tr>
    <td colspan="5">Election Results For Welfare</td>
</tr>
    <tr>
        <th>No:</th>
        <th >Candidate ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Votes</th>
        <th>Operations</th>
    </tr>
    <!-- CANDIDATES LIST RESULTS -->
                  <?php
                  require('connection.php');
                  require('boostraplinks.php');
$i=1; 
//  = "SELECT candidate_id, firstname, COUNT(*) AS vote_count FROM votes GROUP BY candidate_id";
$query="SELECT c.candidate_id, c.firstname, c.lastname, COUNT(v.id) AS vote_count FROM candidates c LEFT JOIN votes v ON c.candidate_id = v.candidate_id GROUP BY c.candidate_id, c.firstname, c.lastname ORDER BY vote_count DESC";
$run = $conn->query($query);
if ($run->num_rows > 0) {
    while ($row = $run->fetch_assoc()) {
        $id = $row['firstname'];
?>
        <tr><td><?php echo $i++;   ?></td>
            <td><?php echo $row['candidate_id'] ?></td>
            <td><?php echo $row['firstname'] ?></td>
            <td><?php echo $row['lastname'] ?></td>
            <td><?php echo $row['vote_count'] ?></td>
            <td>
                <a type="button" href="">edit</a>
                <a type="button" href="voting.php?id=<?php echo $id; ?>" onclick="return confirm('Are You Sure?')">Delete</a>
            </td>
        </tr>
<?php
    }

}
?>
                  </table>
<!-- CHAIR ENDS -->
<!--  -->
<table style="width:200px;"id="tableDesign"class="table table-success table-striped">
<tr>
    <td colspan="5">Election For Treasusrer</td>
</tr>
    <tr>
        <th>No:</th>
        <th>Candidate ID</th>
        <th>First</th>
        <th>Last Name</th>
        <th>Votes</th>
        <th>Operations</th>
    </tr>
    <!-- CANDIDATES LIST RESULTS -->
    <?php
                  require('connection.php');
                  require('boostraplinks.php');
$i=1; 
//  = "SELECT candidate_id, firstname, COUNT(*) AS vote_count FROM votes GROUP BY candidate_id";
$query="SELECT c.candidate_id, c.firstname, c.lastname, COUNT(v.id) AS vote_count FROM chair c LEFT JOIN chair_votes v ON c.candidate_id = v.candidate_id GROUP BY c.candidate_id, c.firstname, c.lastname ORDER BY vote_count DESC";
$run = $conn->query($query);
if ($run->num_rows > 0) {
    while ($row = $run->fetch_assoc()) {
        $id = $row['firstname'];
?>
        <tr><td><?php echo $i++;   ?></td>
            <td><?php echo $row['candidate_id'] ?></td>
            <td><?php echo $row['firstname'] ?></td>
            <td><?php echo $row['lastname'] ?></td>
            <td><?php echo $row['vote_count'] ?></td>
            <td>
                <a type="button" href="">edit</a>
                <a type="button" href="voting.php?id=<?php echo $id; ?>" onclick="return confirm('Are You Sure?')">Delete</a>
            </td>
        </tr>
<?php
    }

}
?>
                  </table>

    <!-- Result -->
    <!--  -->
<table style="width:200px;"id="tableDesign" class="table table-success table-striped">
    <tr>
    <tr>
    <td colspan="5">Election Results For Chair

    </td>
</tr><th>No:</th>
        <th>Candidate ID</th>
        <th>First</th>
        <th>Last Name</th>
        <th>Votes</th>
        <th>Operations</th>
    </tr>
    <!-- CANDIDATES LIST RESULTS -->
    <?php
 
$i=1; 
//  = "SELECT candidate_id, firstname, COUNT(*) AS vote_count FROM votes GROUP BY candidate_id";
$query="SELECT c.candidate_id, c.firstname, c.lastname, COUNT(v.id) AS vote_count FROM treasurer c LEFT JOIN treasurer_votes v ON c.candidate_id = v.candidate_id GROUP BY c.candidate_id, c.firstname, c.lastname ORDER BY vote_count DESC";
$run = $conn->query($query);
if ($run->num_rows > 0) {
    while ($row = $run->fetch_assoc()) {
        $id = $row['firstname'];
?>
        <tr><td><?php echo $i++;   ?></td>
            <td><?php echo $row['candidate_id'] ?></td>
            <td><?php echo $row['firstname'] ?></td>
            <td><?php echo $row['lastname'] ?></td>
            <td><?php echo $row['vote_count'] ?></td>
            <td>
                <a type="button" href="">edit</a>
                <a type="button" href="voting.php?id=<?php echo $id; ?>" onclick="return confirm('Are You Sure?')">Delete</a>
            </td>
        </tr>
<?php
    }

}
?>
                  </table>
    </div>
    <div class="table2">

    <table style="width:800px;"id="tableDesign"  class="table table-success table-striped">
<tr>
    <td>Registered Voters</td>
</tr>
<tr>
    <th>Position</th>
    <th>Voter Id</th>
    <th>Voter First Name</th>
    <th>Voters Last Name</th>
    <th></th>
</tr>
<?php

?>
<?php  $i=1; 
$query;
$qry='select*from voters';
$run=$conn-> query($qry);
if($run->num_rows>0){
    while($row=$run->fetch_assoc()){
        $id=$row['firstname'];
?>
<tr>
<td><?php echo $i++;   ?></td>
<td ><?php echo $row['firstname']  ?></td>
<td><?php echo $row['voters_id']  ?></td>
<td><?php echo $row['lastname']  ?></td>
<td>
    <a type="button" href="">edit</a>
    <a type="button"href="voting.php?id=<?php echo $id; ?>"onclick="return confirm('Are You Sure?')"> Delete</a>
</td>
</tr>
<?php
    }
}
?>
</table >
    </div>

</div>

</body>
<style>

    table{
        margin: auto;
    }
    th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
.tablecontainer{
    margin-top: 50px;
    display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-left:10px; /* to counteract the padding below */
}

table {
  /* width: calc(50% -30px); 50% of the width of the parent element minus half of the margin on each side */
  padding: 10px; /* to create space between tables */
  box-sizing: border-box; /* to ensure that padding does not increase the width of the tables */
}
 /* .table1 table{
        margin-left: 20px;
        margin-top: 50px;
    } */

    body {
  margin: 0;
  font-family: Arial, sans-serif;
}

header {
  background-color: #333;
  color: #fff;
  padding: 1rem;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav-container {
  display: flex;
  align-items: center;
}

.logo {
  font-size: 1.5rem;
  font-weight: bold;
  color: #fff;
  text-decoration: none;
  margin-right: 2rem;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

li {
  margin: 0 1rem;
  text-decoration: none;
}

.nav-container a {
  color: azure;
  text-decoration: none;
  font-size: 1.2rem;
  text-transform: capitalize;

}
.nav-container a:hover{
  color: orange;
  cursor: pointer;
  text-decoration: none
}


      
</style>
</html>