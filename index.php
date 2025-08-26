<?php require "config/config.php"?>

<?php

    $products = $conn->query("SELECT * FROM products");
    $products->execute();

    $allProducts = $products->fetchAll(PDO::FETCH_OBJ);
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>Payment Page</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark" >
    <div class="container" style="margin-top: none">
        <a class="navbar-brand  text-white" href="#">Payment Page</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
        </div>
    </div>
    </nav>

    <div class="container">    
        <div class="row mt-5">

            <?php foreach($allProducts as $products) : ?>

            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mb-4">
                <div class="card" >
                    <img height="213px" class="card-img-top" src="images/<?php echo $products->image; ?>">
                    <div class="card-body" >
                        <h5 class="d-inline"><b><?php echo $products->title; ?></b> </h5>
                        <br>
                        <h5 class="d-inline"><div class="text-muted d-inline">$ <?php echo number_format($products->price, 0, ',', '.'); ?></div></h5>
                        <p><?php echo $products->description; ?></p>
                        <a href="pay.php?id=<?php echo $products->id; ?>"  class="btn btn-primary w-100 rounded my-2"> Pay Now <i class="fas fa-arrow-right"></i> </a>      
     
                    </div>
                </div>
            </div>
            <?php endforeach ?>;
            <br>
        </div>
        </div>
       
        <footer class="bg-dark text-white text-center text-lg-start" style="margin-top: 40px">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </body>
 
</html>