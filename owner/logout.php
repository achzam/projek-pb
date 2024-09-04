<?php 
session_start();
session_destroy();
echo "<script>alert('LogOut Berhasil!');window.location='../index.php'</script>";
?>