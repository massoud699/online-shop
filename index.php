<?php
session_start();
require_once 'clases/Product.php';
require_once 'clases/helpers/str.php';
$prod = new product;
$products = $prod->getAll();

?>




<?php include 'inc/header.php'
?>
<div class="container my-5 ">
    <div class="row">
        <?php if($products!=[]){?>
        <?php foreach ($products as $product) { ?>



            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img style="height:400px" src="images/<?php echo $product['img'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name'] ?></h5>
                        <p class="text-muted">price: <?php echo $product['price'] ?>$</p>
                        <p class="card-text"><?php echo helpers\str::limit($product['desc']); ?></p>
                        <a href="show.php?id=<?php echo $product['id'] ?> " class="btn btn-success">Show</a>
                        <?php if(isset($_SESSION['id'])) {?>
                        <a href="edit.php?id=<?php echo $product['id'] ?> " class="btn btn-primary">Edit</a>
                        <?php }?>  
                        <?php if(isset($_SESSION['id'])) {?>
                        <a href="handlers/handleDelete.php?id=<?php echo $product['id'] ?> " class="btn btn-danger">Delete</a>
                        <?php }?>  


                    </div>


                </div>


            </div>
        <?php } ?>
        <?php }?>
    </div>
</div>

<?php include 'inc/footer.php' ?>
