<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header>
<nav>
      <div class="nav-container">
    <ul>    <a href="#" class="logo">Vote</a>
        
        <li><a href="home.php">home</a></li>
            <li><a href="votersList.php">Voters</a></li>
            <li><a href="electionResults.php">Votes</a></li>
            <li><a href="electionResults.php">Watch News</a></li>
            <li><a href="electionResults.php">Updates</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
      </div>
    </nav>
  </header>
<main>


</main>


</body>
<style>
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