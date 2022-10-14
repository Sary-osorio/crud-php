<?php include 'Config/App.php' ?>
<?php include 'layouts/header.php' ?>
<?php
if (isset($_GET['view'])) {
  $view = explode("/", $_GET['view']);
  include 'views/' . $view[0] . '.php';
} else {

  include 'views/Home.php';
} ?>
<?php include 'layouts/footer.php' ?>