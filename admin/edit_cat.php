<?php include('header.php')?>
<?php include('connect.php')?>

<?php
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $query = "SELECT * FROM categories WHERE category_id = '$user_id'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run) > 0){
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                 <div class="container form-group">
                <center>
                <h2>Category Edit</h2>
                  </center>
        <form action="update_cat.php"method="POST"enctype="multipart/form-data" class="form-group">
          <input type="hidden"name="user_id"value="<?php echo $row['category_id']?>">
          <label for="name">Name</label>
          <input class="form-control" type="text"name="name"value="<?php echo $row['name']?>"placeholder="Enter Name">
            </div>
            <div class="modal-footer">
                <button type="submit"name="submit" class="btn btn-info" >Update</button>
            </form>
    </div>
                <?php

            }
        }
    }
    
    ?>
    <?php include('footer.php')?>