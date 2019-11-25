<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tennis Database</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="myStyle.css" rel="stylesheet">
</head>
<body class="d-flex flex-column">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="index.html">ATP Tennis Database</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="results.html">Results</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="stats.html">Stats</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Players<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <!--Navbar-->
  <!--Main content-->

  <mian role="main" class="flex-shrink-0">
    <div class="container-fluid bg-light p-4" id="main-content">
        <!--Search Bar-->
        <div class="container">
          <form method='GET' action='players.php'>
            <div class="input-group mb-3">
              <input type='text' name='search' class="form-control" placeholder="Player's name" aria-label="Player'name" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" value="submit" name="submit" id="button-addon2">Search</button>
              </div>
            </div>
          </form>
        </div>
        <!--Search Bar-->
    <?php
        //Log in to database
        $host = "localhost"; $username = "fire"; $password = "inf385"; $database =
        "fire"; $link = mysqli_connect($host, $username, $password, $database);
        $listresult = mysqli_query($link, "SELECT * FROM player limit 100");
        $result_number = count(mysqli_fetch_array($listresult));

        
        /*Default data displaying*/
        print '<div class="table-responsive mt-5"><h1>Players list</h1>';
            echo '<table id="players-table" class="table mt-3">';
            echo '<caption>'.$result_number.'&nbspresults founded</caption>';
            echo '<thead class="bg-primary text-light">';
            echo '<tr><th scope="col">Name</th><th scope="col">Country</th><th scope="col">Birthdate</th><th scope="col">Hnad</th></tr></thead>';
            echo '<tbody>';
        if (isset($_GET['search'])) {
          $search = $_GET['search'];
          $search = preg_replace("/[^ 0-9a-zA-Z]+/", "", $search);
          // Remember to sanitize your inputs!
            $SearchQ = 'SELECT * FROM player WHERE player_name LIKE "%'.$search.'%"';
            $SearchResult = mysqli_query($link, $SearchQ);
            $player_profile = "";
          while ($row = mysqli_fetch_array($SearchResult)) {
                 while ($row = mysqli_fetch_array($SearchResult)) {
                  echo '<tr class="table-white"><td><a href="#">'.$row['player_name'].'</td><td></a>'.$row['player_country'].'</td><td>'.$row['player_birthdate'].'</td><td>'.$row['player_hand'].'</td></tr>';
                 }}}
            else{
                while ($row = mysqli_fetch_array($listresult)) {
                    echo '<tr class="table-white"><td><a href="#">'.$row['player_name'].'</td><td></a>'.$row['player_country'].'</td><td>'.$row['player_birthdate'].'</td><td>'.$row['player_hand'].'</td></tr>';
                     }
            }
        echo '</tbody>';
        echo '</table>';
        mysqli_close($link);
        ?>
        </div>
    </mian>
    <!--Main content-->
    <!-- Footer -->
    <footer class="page-footer mt-auto py-3 font-small blue">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
        <a href="index.html">ATP Tennis Database</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
</body>
</html>
