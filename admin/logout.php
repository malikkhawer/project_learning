<?php
session_start();
unset($_SESSION['user_id']);
session_destroy();

echo "<script>
window.location.href='../login.php';
</script>";

?>