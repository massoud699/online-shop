<?php
session_start();
if(isset($_SESSION['id'])) {

    header('location:index.php');
 }
?>


<?php include 'inc/header.php';
?>










<div class="container my-5 ">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            
            <?php if (isset($_SESSION['errors'])) { ?>
                <div class="alert alert-danger">
                    <?php foreach ($_SESSION['errors'] as $eror) { ?>
                        <p class="text-center mb-0"><?php echo "$eror  " ?></p>

                    <?php } ?>
                    <p class="text-center"> <?php echo "please log in again later" ?></p>
                </div>




            <?php } ?>

            <?php unset($_SESSION['errors']) ?>




            <form action="handlers/handlelogin.php" method="post">
                <div class="form-group ">

                    <input type="email" class="form-control" placeholder="email" name="email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="pass">
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Log In</button>
                </div>


            </form>






        </div>
    </div>
</div>



<?php include 'inc/footer.php' ?>