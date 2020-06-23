<?php
session_start();

 if(!isset($_SESSION['id'])) {

    header('location:login.php');
 }

?>


<?php include 'inc/header.php'
?>










<div class="container my-5 ">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">

          

            <form action="handlers/handleAdd.php" method="post" enctype="multipart/form-data">
                <div class="form-group ">

                    <input type="text" class="form-control" placeholder="Name" name="name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Price" name="price">
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="Description" name="desc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file " name="img">
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </div>


            </form>






        </div>
    </div>
</div>



<?php include 'inc/footer.php' ?>