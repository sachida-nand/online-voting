<?php session_start(); 
    if(!isset($_SESSION['pass'])){
        header("Location:admin-login.php");
    }
  
?>

<?php include "include/links.php"; ?>
<?php include "include/header-2.php";?>
     <style>
         .v-header{
         text-align:center;
         font-size:4rem;
         color: #132ec9;
         margin-top:170px;
     }

     @media (max-width:1050px){
         margin-top:50px;
     }
     </style>
  <h1 class="v-header">Welcome To Admin Pannel</h1>

<!-- Add Party Model -->
<div class="modal fade" id="Add-party" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Add Party Details Here <span><i
                            class="fas fa-hand-point-down"></i></span></h2>
            </div>

            <div class="modal-body">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <label for="pName">Party Name :-</label>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="pName" id="pName"
                                    placeholder="Enter party name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <label for="plogo">Party Logo :-</label>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="form-group">
                                <input type="file" class="form-control" name="pLogo" id="plogo" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <label for="pl">Party Leader :-</label>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="pl" id="pl"
                                    placeholder="Enter Leader name" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="party" class="btn btn-primary btn-block btn-lg main">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <?php include "include/footer-page.php"; ?> -->
<?php include "include/footer.php"; ?>




<!-- add party details -->
<?php 
//  link to the database
   include "config/connection.php";

   if(isset($_POST['party'])){
       $pName = $_POST['pName'];
       $pLogo = $_FILES['pLogo']['name'];
       $temp = $_FILES['pLogo']['tmp_name'];
       $pLeader = $_POST['pl'];

    //    check if file type is acceptable or not 
       $accepted = array("jpg","jpeg","png");
    //    upload photo 
       if(in_array(pathinfo($pLogo,PATHINFO_EXTENSION),$accepted)){
           $dest = "images/".$pLogo;
           move_uploaded_file($temp,$dest);

           $query = "INSERT INTO party (PName, pl, pLogo) VALUE ('$pName','$pLeader','$pLogo')";
           $sql = mysqli_query($conn,$query);

           if($sql){
               ?>
                 <script>
                    swal("Great!", "Party added in the list!", "success");
               </script>
               <?php
              
           }else{
               ?>
                 <script>swal("Not Done!", "SomeThinng went wrong!", "error");</script>
               <?php
           }
       } 
   }
?>