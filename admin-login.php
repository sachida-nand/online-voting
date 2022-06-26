<?php session_start(); ?>

<?php include "include/footer.php" ?>

<?php  
   include "config/connection.php";

   if(isset($_POST['submit'])){
       $user = $_POST['user'];
       $pass = $_POST['password'];

       $user_search = mysqli_query($conn,"select * from admin where userName = '$user'");
       $user_count = mysqli_num_rows($user_search);

       if($user_count){
            $pass_search = mysqli_query($conn,"select * from admin where password = '$pass'");
          $pass_count = mysqli_num_rows($pass_search);
          $db_pass = mysqli_fetch_assoc($user_search);
          
     
           if($pass_count){
               $_SESSION["pass"] = $pass_count;
            ?>
            <script type="text/javascript">
              location.replace("admin-handle.php");
            </script>
            <?php
           }else{
               ?>
               <script>swal("ops! password not matched", "Enter a correct password!", "error");</script>
               <?php
           }
       }else{
           ?>
           <script>swal("UserName and passwors Not matched!", "Please try again!", "error");</script>
           <?php
       }
   }
?>

<?php include "include/links.php" ?>
<?php include "include/header.php" ?>

<div class="voter">
    <div class="container pt-5">
        <div class="Login-cont">
            <div class="header">
                <i class="fas fa-user-tie fa-4x"></i>
                
                <h1>Login Here <span><i class="fas fa-hand-point-down"></i></span></h1>
            </div>
            <hr>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="userName">UserName:</label>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="userName" name="user" placeholder="Email/Mobile">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="password">Password:</label>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info btn-block p-2">Login <span><i
                                class="fas fa-sign-in-alt"></i></span></button>
                </div>
        </div>
    </div>
</div>

