<?php
  session_start();

  if(!isset($_SESSION['pass'])){
    header("Location:admin-login.php");
  }
?>

<?php include "include/links.php"; ?>
<?php include "include/header.php"; ?>

<div class="container p-5 my-5" style="padding:500px 20px;">
<table class="table table-dark m-5" >
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Votes</th>
    </tr>
  </thead>
  <tbody>

<?php 
   include "config/connection.php";
      $sql =mysqli_query($conn, "select party from votes ORDER by party ASC");
      $i = 1;
      while($row = mysqli_fetch_array($sql)){
         ?>
            <tr> 
               <td><?php echo $i; $i++;?></td>
                <td><?php echo $row['party']; ?></td>
            </tr>
         <?php
      }

?>



    
  </tbody>
</table>
    </div>
<?php  include "include/footer.php";?>