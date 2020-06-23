<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>online shop</title>
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">Online Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="home.php">Home </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Products </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="aboutus.php">About Us </a>
        </li>
        <li class="nav-item ">
          <?php if (isset($_SESSION['id'])) { ?>
            <a class="nav-link" href="add.php">Add New</a>
        </li>

      <?php } ?>

      </ul>
      <div class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['id'])) { ?>
          <a class="nav-link disabled" href="handlers/handlelogout.php"><?php echo $_SESSION['namee'] ?></a>
        <?php } ?>
      </div>

      <div class="navbar-nav  ml">
        <?php if (isset($_SESSION['id'])) { ?>
          <a class="nav-link" href="handlers/handlelogout.php">Log Out</a>
        <?php } ?>
      </div>




    </div>
  </nav>