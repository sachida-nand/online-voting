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
            <form action="voter-details.php" method="POST">
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <label for="vnumber">Voter Id Number:</label>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="vId" class="form-control" id="vnumber" placeholder="Enter Your Voter Number">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="voter" class="btn btn-info btn-block p-2">Login <span><i class="fas fa-sign-in-alt"></i></span></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "include/footer.php" ?>