<?php include "include/links.php";?>
<?php include "include/header.php";?>

<div class="main-div">
    <div class="container pt-5">
        <div class="body-cont">
            <div class="reg-header">
                <h1>Register For New Voter Here <span><i class="fas fa-hand-point-down"></i></span></h1>
            </div>
            <hr>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="Name">Name :-</label>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="Name" placeholder="Enter Your Name" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="fName">Father/Mother Name :-</label>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fName" id="fName"
                                placeholder="Enter Your Father/Mother Name" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="dob">Date Of Birth(DOB) :-</label>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter DOB" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="Phone">Phone :-</label>

                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" id="Phone" placeholder="Enter Your Phone Number" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="email">Email (optional) :-</label>

                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="address">Address :-</label>

                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Your Address" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="vId">Voter ID :-</label>

                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="vId" id="vId"
                                placeholder="Enter Any Number for new Voter" required>
                        </div>
                        <div class="alert-warning" id="warning"  role="alert"> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="img">Photo :-</label>

                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="file" class="form-control" name="img" id="img" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info btn-block p-2">Register</button>

                </div>
            </form>
        </div>
    </div>
</div>

<?php include "include/footer-page.php"; ?>
<?php include "include/footer.php"; ?>

<?php 
   include "config/connection.php";

   if(isset($_POST['submit'])){
       $name = mysqli_real_escape_string($conn, $_POST['name']);
       $fName = mysqli_real_escape_string($conn, $_POST['fName']);
       $dob = mysqli_real_escape_string($conn, $_POST['dob']);
       $phone = mysqli_real_escape_string($conn, $_POST['phone']);
       $email = mysqli_real_escape_string($conn, $_POST['email']);
       $address = mysqli_real_escape_string($conn, $_POST['address']);
       $vId = mysqli_real_escape_string($conn, $_POST['vId']);
       $img = $_FILES['img']['name'];
       $tempImg = $_FILES['img']['tmp_name'];
       $Error = $_FILES['img']['error'];

       $check_vId ="SELECT * FROM voter WHERE vId = '$vId'";
       $vquery = mysqli_query($conn, $check_vId);

       $votercount = mysqli_num_rows($vquery);

       $accepted = array("jpg","jpeg","png");

       if($votercount){
               ?>
               <script type="text/javascript">
               swal("ops! Voter Number Already Exits!", "Please fill the form again to register", "warning");
                //  document.getElementById('warning').innerHTML = "Voter Id Already Exit Try Another!"
                //  document.getElementById('warning').classList.add("alert");
               </script>
             <?php    
       }else{
        if($Error == 0){
            if(in_array(pathinfo($img,PATHINFO_EXTENSION),$accepted)){
                $dest = 'images/'.$img;
                move_uploaded_file($tempImg,$dest);
 
                $query = "INSERT INTO voter (name, fName, dob, phone, email, address, vId, img) VALUE ('$name', '$fName', '$dob', '$phone', '$email', '$address', '$vId', '$img')";
 
                $sql = mysqli_query($conn,$query);
 
                if($sql){
                    ?>
                      <script>swal("Your Name And Voter Number Registerd !", "Plase keep voter Number to vote any party!", "success");
                    </script>
                    <?php
                }else{
                     ?>
                     <script>swal("Somethinng Went wrong!", "Please try again later!", "error");</script>
                     <?php
                }
            }
        }
    }
  }

?>