<?php include('connect.php') ?>
<?php include('header.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registeration</title>
</head>
<body>
    <section id="team" class="team section light-background">
        
        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h2>Registeration For Ticket Booking</h2>
        </div> <!-- End Section Title -->
    
            <!-- login form start -->
            <center>
    <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <form action="register.php" method="post" class="php-email-form aos-init aos-animate " data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-mb-3">
                  <label for="name" class="pb-2">Name</label>
                  <input type="text" name="name" id="" class="form-control" placeholder="Enter your name">
                </div>
                <div class="col-mb-3">
                  <label for="email" class="pb-2">Email</label>
                  <input type="text" name="email" id="" class="form-control" placeholder="Enter your email">
                </div>

                <div class="col-mb-3">
                  <label for="password" class="pb-2">Password</label>
                  <input type="password" class="form-control" name="password" id="" placeholder="Enter your password">
                </div>
                  <button type="submit"name="register" class="form-control btn btn-info ">Register</button>
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
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // print_r($_POST);

    $query = "INSERT INTO `users` ( `name`, `email`, `password`, `roltype`) VALUES ( '$name', '$email', '$password', '2')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script>
        alert('user registration successfully');
        window.location.href='login.php';
        </script>";
    }
    else{
        echo "<script>
        alert('user registration failed');
        </script>";
    }
}
?>


