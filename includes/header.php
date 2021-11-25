<?php
    include("mysql_connect.php");
    if (isset($_POST['searchSubmit']))
    {
      $query = trim($_POST['search']);
      $query = filter_var($query, FILTER_SANITIZE_STRING);
      //echo "search.php?query=$query";
      header("Location:" . BASE_URL . "search.php?query=$query");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?php echo BASE_URL ?>css/styles.css" rel="stylesheet">
    <script src="http://kit.fontawesome.com/3993fa0209.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Indie Games</title>
    <script>
    function go()
        {
          box = document.getElementById('entryselect'); // gets form element by the id.
          destination = box.options[box.selectedIndex].value;
          if (destination) location.href = destination;
        }
    </script>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-dark fixed-top bg-dark navbar-expand-lg text-white">
        <a class="navbar-brand" href="<?php echo BASE_URL ?>main.php">Indie Games</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo BASE_URL; ?>main.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo BASE_URL; ?>index.php">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo BASE_URL; ?>admin/insert.php">Insert</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo BASE_URL; ?>admin/edit.php">Edit</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="adminDDL" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="adminDDL">
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/login.php">Login</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item align-items-center mr-3 w-100">
                    <form method="post" name="searchForm" class="mb-0">
                      <input type="text" name="search" id="search" class="p-1 border border-secondary rounded bg-dark text-light mr-2">
                        <input type="submit" value="Search" name="searchSubmit" class="btn btn-primary bg-secondary text-light border border-dark rounded">
                        </a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="pb-3">
        <div class="container-fluid">