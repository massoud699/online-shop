<?php 
session_start();
require_once 'clases/Product.php';
require_once 'clases/helpers/image.php';
require_once 'clases/validation/validator.php';
require_once 'inc/header.php'
?>


<?php if (isset($_SESSION['errors'])) { ?>
    <form action="alert.php" method="post">
                <div class="alert ">
                    <?php foreach ($_SESSION['errors'] as $eror) { ?>
                        <div class="alert alert-danger alert-dismissible fade show offset-lg-3 text-center" role="alert">
                            <?php echo $eror ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="text-right form-group">
                    <button type="submit" name="submit"  class="btn btn-success btn-lg m-auto">Got It</button>
                    </div>
                </div>
                </form>

            <?php } ?>


            <?php if(isset($_POST['submit'])){


            unset($_SESSION['errors']);
            header('location:index.php');
            
        }
            
            ?>






           <?php require_once 'inc/footer.php' ?>


