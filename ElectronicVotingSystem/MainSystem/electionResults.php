<?php
include('heading.php');
 session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>

<!-- CHAIR BEGINS -->
<table style="width:200px;"id="tableDesign"  class="table table-success table-striped">
<tr>
    <td colspan="5">Election Results For Welfare</td>
</tr>
    <tr>
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
        <tr>
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
        <th>Candidate ID</th>
        <th>First</th>
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
        <tr>
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




                  <!-- Treasuere starts here -->

                  <!-- CHAIR ENDS -->
<!--  -->
<table style="width:200px;"id="tableDesign" class="table table-success table-striped">
    <tr>
    <tr>
    <td colspan="5">Election Results For Chair

    </td>
</tr>
        <th>Candidate ID</th>
        <th>First</th>
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
        <tr>
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


</main>
<footer>
    <div class="footer-container">
      <p>&copy; Voting@2023, Inc.</p>
      <ul>
        <li><a href="#">Privacy Policy Of your Vote</a></li><br>

        <!-- <li><a href="#">Terms of Service</a></li> -->
      </ul>
    </div>
  </footer>
</body>
<style>
    body{
        background-color:azure;
    }
    table{
        margin: auto;
        margin-top: 100px;
    }


    footer {
  background-color: #f4f4f4;
  padding: 1rem;
}

.footer-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

ul {
  display: flex;
}

li {
  margin-right: 1rem;
}

p {
  margin: 0;
}
</style>
</html>