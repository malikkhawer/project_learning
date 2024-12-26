<?php
include('connect.php');

if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    // $description = $_POST['description'];
    // $file_name = $_FILES['icon']['name'];
    // $tmp_name = $_FILES['icon']['tmp_name'];
    // move_uploaded_file($tmp_name, $file_name);

    
    $query = "UPDATE `categories` SET `name` = '$name' WHERE `category_id` = '$user_id'";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        echo "<script>
        // alert('Category update Successfully');
        window.location.href = 'categories.php';
        </script>
        ";
    }
    else{
        echo "<script>
        // alert('Category Added error');
        window.location.href = 'categories.php';
        </script>
        ";
    }
}


?>