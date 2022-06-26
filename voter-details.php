

<?php include "include/links.php"; ?>
<!-- <?php include "include/header.php"; ?> -->
  <a href="index.php" class="logout">Logout</a>
<div class="voter">
    <div class="container pt-5">
        <div class="Login-cont">
            <?php 
             include "config/connection.php";

             if(isset($_POST['voter'])){
                 $vId = $_POST['vId'];
                    
                 $sql = mysqli_query($conn,"select * from voter where vId = '$vId'");

                 $sqlv = mysqli_query($conn,"select * from votes where vId ='$vId'");

                 while($row = mysqli_fetch_assoc($sql)){
                          ?>
                           <div class="header">
                             <img src="images/<?php echo $row['img']; ?>" alt="voter-img" class="img-fluid">
                            </div>
                             <hr>
                            <div class="card" style="width: 35rem;">
                                <div class="card-body">
                                    <h4 class="card-title">Name:- <?php echo $row['Name']; ?></h4>
                                </div>
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Voter id:-</strong>  <?php echo $row['vId']; ?></li>
                                    <li class="list-group-item"><strong>Father:-</strong> <?php echo $row['fName']; ?></li>
                                    <li class="list-group-item"><strong>DOB:- </strong> <?php echo $row['dob']; ?></li>
                                    <li class="list-group-item"><strong>Phone:-</strong> <?php echo $row['phone']; ?></li>
                                    <li class="list-group-item"><strong>Email:-</strong> <?php echo $row['email']; ?></li>
                                    <li class="list-group-item"><strong>Address:-</strong> <?php echo $row['address']; ?></li>
                                    
                                     
                                      <?php 
                                      if($sqlv){
                                        while($rows = mysqli_fetch_assoc($sqlv)){
                                            ?>
                                             <li class="list-group-item"><strong>Status:-</strong> <?php echo $rows['voted']; ?></li>
                                            <?php
                                        }     
                                      }else{
                                          ?>
                                           <li class="list-group-item"><strong>Status:- Not Voted</strong></li>
                                          <?php
                                      }
                                         
                                      ?>   
                                </ul>
                            </div>
            <?php
                 }

             }

           ?>


        </div>
    </div>
</div>




<?php include "include/footer-page.php"; ?>
<?php include "include/footer.php"; ?>