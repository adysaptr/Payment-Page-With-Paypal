<?php require "config/config.php"?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$product = $conn->query("SELECT * FROM products WHERE id='$id'");
$product->execute();
$singleProduct = $product->fetch(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>Pay with PayPal</title>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .payment-card {
            max-width: 450px;
            margin: 50px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 25px;
        }
        .paypal-logo {
            display: block;
            margin: 0 auto 15px;
            width: 120px;
        }
        .product-info h5 {
            font-weight: bold;
        }
        .product-price {
            font-size: 22px;
            color: #0070ba;
            font-weight: bold;
        }
        #paypal-button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="https://www.paypalobjects.com/webstatic/icon/pp258.png" alt="PayPal" width="40">
            Pay with PayPal
        </a>
    </div>
</nav>

<!-- Payment Section -->
<div class="payment-card text-center">
    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_111x69.jpg" alt="PayPal" class="paypal-logo">

    <div class="product-info">
        <h5><?php echo htmlspecialchars($singleProduct->title); ?></h5>
        <p class="text-muted"><?php echo htmlspecialchars($singleProduct->description); ?></p>
        <p class="product-price">$<?php echo number_format($singleProduct->price, 2); ?></p>
    </div>

    <!-- PayPal Button -->
    <div id="paypal-button-container"></div>
</div>

<!-- PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=###&currency=USD"></script> <!-- Replace ### with your Client ID App from Developer.Paypal.com -->
<script>
    paypal.Buttons({
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $singleProduct->price; ?>'
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                window.location.href = 'index.php';
            });
        }
    }).render('#paypal-button-container');
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
