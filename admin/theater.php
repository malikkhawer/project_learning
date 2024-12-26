<?php include('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theater</title>
</head>
<body>
<h2 class="m-3"></h2>
           <table class="table table-responsive">
            <thead>
                <tr>
                    <td class="bg-dark text-white">ID</td>
                    <td class="bg-dark text-white">Name</td>
                    <td class="bg-dark text-white">Category</td>
                    <td class="bg-dark text-white">Date</td>
                    <td class="bg-dark text-white">Days/Time</td>
                    <td class="bg-dark text-white">Price</td>
                    <td class="bg-dark text-white">Action</td>

                </tr>
            </thead>
            <tbody>

            <?php
              include('connect.php');


              $query = "SELECT theater.*, movies.title, categories.name 
              FROM theater 
              INNER JOIN movies ON movies.movie_id = theater.movie_id 
              INNER JOIN categories ON categories.category_id = movies.category_id";
    
              $connect_query = mysqli_query($connection, $query);

              if(mysqli_num_rows($connect_query) > 0){
                  while($row = mysqli_fetch_assoc($connect_query)){
        


      
            ?>
              
                <tr>
                    <td><?= $row['theater_id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['days'] ?> - <?= $row ['timing'] ?></td>
                    <td><?= $row['price'] ?></td>
                      <td>
                      <a href="edit_the.php?user_id=<?=  $row['theater_id'] ?>" class="btn btn-info btn-sm">Edit</a>
                      <a href="del_the.php?user_id=<?=  $row['theater_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
                }

              }
                ?>
            </tbody>
           </table>

            <div class="container">
                <div class="row">
                      <div class="page-inner">
                      <div class="col-lg-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <form action="theater.php" method="post" enctype="multipart/form-data" >
              <div class="row gy-4">

                <div class="form-group mb-4">
                    <select name="movie_id" id="" class="form-control">
                        <option value="">SELECT MOVIES</option>

                    <?php
                        include('connect.php');



                        $query = "SELECT * FROM movies";

                        $connect_query = mysqli_query($connection, $query);

                        if(mysqli_num_rows($connect_query) > 0){
                            while($data = mysqli_fetch_assoc($connect_query)){

                              ?> 
                               <option value="<?php echo $data['movie_id'] ?>"> <?php echo $data['title'] ?> </option> 
                            
                                  
                              <?php
                            }


                        } 
                        ?>

<?php
                        include('connect.php');



                        $query = "SELECT * FROM categories";

                        $connect_query = mysqli_query($connection, $query);

                        if(mysqli_num_rows($connect_query) > 0){
                            while($data = mysqli_fetch_assoc($connect_query)){

                              ?> 
                               <option value="<?php echo $data['category_id'] ?>"> <?php echo $data['name'] ?> </option> 
                            
                                  
                              <?php
                            }


                        } 
                        ?> <option value="">No movies Found</option> <?php
                            ?>
                </select>
                  
                </div>
                <div class="form-group mb-4">
                  <label for="time" class="pb-2">TIMING</label>
                  <input type="time" name="timing" id="" class="form-control" placeholder="">
                </div>
                <div class="form-group mb-4">
                  <label for="text" class="pb-2">DAYS</label>
                  <input type="text" class="form-control" name="days" id="" placeholder="">
                </div>
                <div class="form-group mb-4">
                  <label for="date" class="pb-2">RELEASE DATE</label>
                  <input type="date" class="form-control" name="date" id="" placeholder="">
                </div>
                <div class="form-group mb-4">
                  <label for="number" class="pb-2">PRICE</label>
                  <input type="number" class="form-control" name="price" id="" placeholder="">
                </div>
                  <button type="submit"name="add" class="form-control btn btn-info ">Add Theater</button>
                </div>

              </div>
            </form>
            </div>
    </div>
        
              
        </div>

</body>
</html>





<?php

if(isset($_POST['add'])){

    $movie_id = $_POST['movie_id'];
    $timing = $_POST['timing'];
    $days = $_POST['days'];
    $date = $_POST['date'];
    $price = $_POST['price'];

    $query = "INSERT INTO `theater`(`movie_id`,`timing`, `days`, `date`, `price`) VALUES ( '$movie_id','$timing', '$days', '$date', '$price');";

    $connection_query = mysqli_query($connection, $query);

    if($connection_query){
        echo "<script>
        alert('theater Added Successfully');
        window.location.href = 'theater.php';
        </script>
        ";

    }
    else{
        echo "<script>
        alert('theater don`t Added Successfully');
        window.location.href = 'theater.php';
        </script>
        ";
    }

}


include('footer.php');
    ?>
