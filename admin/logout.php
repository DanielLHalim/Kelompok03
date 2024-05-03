<?php
session_start();
session_destroy();
  echo "<SCRIPT type='text/javascript'>
        alert('Logout successful');
        window.location.replace('../index.php');
        </SCRIPT>";
?>
