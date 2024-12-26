<?php include('header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
          <div class="page-inner">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Add category
            </button>
            <h2 class="m-3">Categories</h2>
           <table class="table table-responsive">
            <thead>
                <tr>
                    <td class="bg-dark text-white">ID</td>
                    <td class="bg-dark text-white">Name</td>
                    <td class="bg-dark text-white">Action</td>
                </tr>
            </thead>
            <tbody>
            <?php
      include('connect.php');



      $query = "SELECT * FROM categories";

      $connect_query = mysqli_query($connection, $query);

      if(mysqli_num_rows($connect_query) > 0){
        


      
      ?>
              <?php
                $counter = 1;
              while($row = mysqli_fetch_assoc($connect_query)){
          
              
              ?>
                <tr>
                    <td><?php echo $row ['category_id'] ?></td>
                    <td><?php echo $row ['name'] ?></td>
                      <td>
                      <a href="edit_cat.php?user_id=<?php echo $row['category_id'];?>" class="btn btn-info btn-sm">Edit</a>
                      <a href="del_cat.php?user_id=<?php echo $row['category_id'];?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
                }
                $counter++;
              }
                ?>
            </tbody>
           </table>
            
          </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1> Categories Name</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="categories.php"method="POST"enctype="multipart/form-data" class="form-group">
          <label for="name">Name</label>
          <input class="form-control" type="text"name="name"placeholder="Enter Name">
         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit"name="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
    </div>
  </div>
</div>

</body>
</html>
<?php




if(isset($_POST['submit'])){

    $name = $_POST['name'];
    // $description = $_POST['description'];
    // $file_name = $_FILES['icon']['name'];
    // $tmp_name = $_FILES['icon']['tmp_name'];

    move_uploaded_file($tmp_name, $file_name);

    $query = "INSERT INTO `categories` ( `name`) VALUES ('$name')";

    $connection_query = mysqli_query($connection, $query);

    if($connection_query){
        echo "<script>
        // alert('Category Added Successfully');
        window.location.href = 'categories.php';
        </script>
        ";

    }
    else{
        echo "<script>
        // alert('Category don`t Added Successfully');
        window.location.href = 'categories.php';
        </script>
        ";
    }

}


include('footer.php')
    ?>

