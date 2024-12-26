<?php include('header.php')?>
<?php include('connect.php')?>

<?php
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $query = "SELECT * FROM theater WHERE theater_id = '$user_id'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run) > 0){
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                 <div class="container form-group">
                <center>
                <h2>Edit Theater</h2>
                  </center>
        <form action="update_the.php"method="POST"enctype="multipart/form-data" class="form-group">
          <input type="hidden"name="user_id"value="<?php echo $row['theater_id']?>">
         <div class="form-group mb-4">
                  <label for="time" class="pb-2">TIMING</label>
                  <input type="time" name="timing" id="" class="form-control" placeholder="">
                </di>
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
                <button type="submit"name="submit" class="btn btn-info" >Update</button>
            </form>
    </div>
                <?php

            }
        }
    }
    
    ?>
    <?php include('footer.php')?>