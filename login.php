<?php include('connect.php') ?>
<?php include('header.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section id="team" class="team section light-background">
        
        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h2>Login Admin / User</h2>
        </div> <!-- End Section Title -->
    
            <!-- login form start -->
            <center>
    <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <form action="login.php" method="post" class="php-email-form aos-init aos-animate " data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-mb-3">
                  <label for="email" class="pb-2">Email</label>
                  <input type="text" name="email" id="" class="form-control" placeholder="Enter your email">
                </div>

                <div class="col-mb-3">
                  <label for="password" class="pb-2">Password</label>
                  <input type="password" class="form-control" name="password" id="" placeholder="Enter your password">
                </div>
                  <button type="submit"name="login" class="form-control btn btn-info ">Login</button>
                </div>

              </div>
            </form>
    </div>
  </div>
</center>
<!-- login form end -->
</section>

</body>
</html>

<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $query_run = mysqli_query($connection, $query);
    if(mysqli_num_rows($query_run)> 0){
    $data = mysqli_fetch_assoc($query_run);
    $role = $data['roltype'];
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['type'] = $role;

    if($role == 1){
        echo "<script>
        alert('admin login successfully')
        window.location.href='admin/header.php';
        </script>";
    }
    elseif($role == 2){
        echo "<script>
        alert('user login successfully');
        window.location.href='index.php';
        </script>";
    }
    
}else{
    echo "<script>
    alert('invalid email & password')
    </script>";
}
}



?>


