<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div></div>
<table style="width:800px;"id="tableDesign" class="table table-striped table-dark">
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
include('heading.php');
require('connection.php');
require('boostraplinks.php');
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
<br><br>

</body>
<style>
    body{
        background-color:brown ;
    }
table{
margin-top:100px;
border-radius: 30px 30px 0 0;
align-items: left;
margin: auto;
margin-top:100px;
}
</style>
</html>