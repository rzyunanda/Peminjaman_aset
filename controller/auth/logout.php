<?php
  session_start();
  session_destroy();
  header('location:/peminjaman-aset/view/auth/login.php');
?>
