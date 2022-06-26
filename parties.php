
<?php
  session_start();

  if(!isset($_SESSION['pass'])){
    header("Location:admin-login.php");
  }
?>

<?php include "include/links.php"; ?>
<?php include "include/header-2.php"; ?>

<!-- party list  -->
<div class="container my-5">
     <h1 class="text-center mb-5 text-primary party" style="
	text-decoration: underline;
	font-size: 3.2rem;
	font-weight: bold;
">Party Details</h1>
     <div class="row shadow p-3 mb-5 bg-primary rounded">
    <?php 
      include "config/connection.php";

      $sql = mysqli_query($conn,"select * from party");

      while($row = mysqli_fetch_assoc($sql)){
          ?>
            <div class="col-lg-3 col-sm-12 m-3 ">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/<?php echo $row['pLogo'] ?>" alt="Card image cap" style="height: 13rem;">
                <div class="card-body">
                  <h3 class="card-title text-center text-primary">Party:- <?php echo $row['pName'] ?></h3>
                  <h5 class="card-text text-center">Leader:- <?php echo $row['pl'] ?></h5>
                </div>
                <div class="card-body">
                  <a href="delete.php?id=<?php echo $row['id']; ?>" class="card-link btn btn-danger">Delete</a>
                </div>
              </div>
              
              </div>
          <?php
      }
    ?>
    </div>
 </div>


<?php include "include/footer.php"; ?>