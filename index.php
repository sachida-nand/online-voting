<?php include "include/links.php"; ?>
<?php include "include/header.php";?>

<main>
    <section>
        <h3>welcome to online voting</h3>
        <h1>your <span class="chng">

            </span></h1>
        <p>vote the right one!</p>
        <button type="button" class="vbtn" data-toggle="modal" data-target="#exampleModal">
            Click Here to Vote
        </button>
    </section>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Fill Detail to vote <span><i
                            class="fas fa-vote-yea text-primary"></i></span></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <label for="Name">Name :-</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="Name" placeholder="Enter Your Name"
                            required>
                    </div>
                    <label for="vId">Voter ID Number :-</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="vId" id="vId"
                            placeholder="Enter Your Voter Id number" required>
                    </div>
                    <label>Choose Party :-</label>
                    <select class="form-control" name="party" required>
                    <option value="">Choose Party..</option>
                        <?php 
                          include "config/connection.php";
                              $sql = mysqli_query($conn,"SELECT * FROM party");

                              while($res=mysqli_fetch_array($sql)){
                                  ?>
                                      <option value="<?php echo $res['pName']; ?>"><?php echo $res['pName']; ?></option>
                                  <?php
                              } 
                        ?>
                       
                    </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancel</button>
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Vote <span><i
                            class="fas fa-check-circle"></i></span></button>
            </div>
            </form>

        </div>
    </div>
</div>

<?php include "include/footer-page.php"; ?>
<?php include "include/footer.php"; ?>

<!-- submit vote after voter can vote  -->

<?php
     include "config/connection.php";
  
   if(isset($_POST['submit'])){
    $vName = $_POST['name'];
    $vId = $_POST['vId'];
    $party = $_POST['party'];

    $checkVoter = mysqli_query($conn,"SELECT * FROM voter WHERE vId = '$vId'");
    $findVoter = mysqli_num_rows($checkVoter);

    if($findVoter){
        $checkVote  = mysqli_query($conn,"select * from votes where vId = '$vId'");
        $voterCount = mysqli_num_rows($checkVote);
              if($voterCount){
                ?>
                   <script>swal("ops!You Are already Voted","You Can't do Another Vote", "warning");</script>
                <?php
              }else{
                  
                $sql = mysqli_query($conn,"INSERT INTO votes(vId,vName,party) VALUE ('$vId', '$vName', '$party')");
    
                if($sql){
                    ?>
                        <script>swal("Thank You For Your Valuable Vote!", "Click Voter Login section to know status of Your Vote", "success");</script>
                    <?php
                }else{
                    ?>
                        <script>swal("ops!Somethinng went Wrong Plz try Again","error");</script>
                    <?php
                }
              }
    }else{
        ?>
          <script>swal("Sorry! Your Voter Id not found in our Record", "Please Register First From New registration section!", "error");</script>
       <?php
    }    
}
?>