<?php
  session_start();
  session_destroy();
  header('location: ../../template/login.php');