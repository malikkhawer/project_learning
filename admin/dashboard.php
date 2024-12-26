<?php include('header.php') ?>

<h1>welcome movie</h1>
<?php include('../connect.php');
if(!isset($_SESSION['user_id'])){
    echo "<script>

    window.location.href='../login.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <?php include('footer.php') ?>
    
    </body>
</html>