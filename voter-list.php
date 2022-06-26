<?php include "include/links.php"; ?>
<?php include "include/header-2.php"; ?>
   <div class="container-fluid">
   <table class="table table-hover table-dark shadow p-3 mt-5 rounded">
  <thead>
    <tr>
      <!-- <th scope="col">S.N</th> -->
      <th scope="col">VOTER ID</th>
      <th scope="col">NAME</th>
      <th scope="col">FATHER/MOTHER</th>
      <th scope="col">DOB</th>
      <th scope="col">PHONE</th>
      <th scope="col">EMAIL</th>
      <th scope="col">ADDRESS</th>
      <th scope="col">PHOTO</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
        include "config/connection.php";
        
        $query = mysqli_query($conn,"select  * from voter");

        while($res = mysqli_fetch_array($query)){
            ?>
               <tr>
                    <th><?php echo $res['vId']; ?></th>
                    <th><?php echo $res['Name']; ?></th>
                    <th><?php echo $res['fName']; ?></th>
                    <th><?php echo $res['dob']; ?></th>
                    <th><?php echo $res['phone']; ?></th>
                    <th><?php echo $res['email']; ?></th>
                    <th><?php echo $res['address']; ?></th>
                    <th><img src="images/<?php echo $res['img']; ?>" alt="" height="50" style="border-radius:8px;"></th>
                    <th><a class="btn btn-danger" href="delete.php?id=<?php echo $res['idd']; ?>">Delete</a></th>

                </tr>
            <?php
        }  
      ?>
  </tbody>
</table>
   </div>
<?php include "include/footer.php"; ?>