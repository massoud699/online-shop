<?php
session_start();
require_once 'inc/header.php';
require_once 'clases/Product.php';
?>



<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        

                    </tr>
                </thead>
                <?php if (isset($_SESSION['cart'])) { ?>
                    <?php foreach ($_SESSION['cart'] as $cart) {
                        $prod = new Product;
                        $product = $prod->getone($cart);
                        
                


                    ?>


                        <tbody>


                            <tr>
                                <td scope="row"><?php echo $product['name'] ?></td>
                                <td><?php echo $product['desc'] ?></td>
                                <td><?php echo $product['price'] ?></td>
                                <td><img style="width : 500px" src="images/<?php echo  $product['img'] ?> " class="img-fluid"></td>
                                
                            </tr>


                        </tbody>
                    <?php } ?>
                <?php } ?>




            </table>






        </div>

    </div>


</div>






<div class="container my-5 ">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">

          

            <form action="handlers/handleorder.php" method="post" >
                <div class="form-group ">

                    <input type="text" class="form-control" placeholder="Name" name="name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="phone" name="phone">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="address" name="address">
                </div>

               
                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Check out</button>
                </div>


            </form>






        </div>
    </div>
</div>

<?php include 'inc/footer.php' ?>