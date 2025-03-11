<?php
session_start();

// Initialize cart session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if cart session exists
$cart = $_SESSION['cart'];
$total = 0;

// Clear cart if requested
if (isset($_GET['clear_cart']) && $_GET['clear_cart'] == '1') {
    $_SESSION['cart'] = [];
    $cart = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Order Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gradient-to-r from-teal-400 to-green-400 text-white h-screen flex flex-col justify-between">
    <header class="flex justify-between items-center p-4">
        <div class="flex items-center">
            <img alt="Logo" class="mr-2" height="50" src="assets/images/heblogo.webp" width="50"/>
            <span class="text-lg font-bold">My Order</span>
        </div>
        <a class="text-white" href="#" onclick="window.history.back();">Cancel</a>
    </header>
    
    <main class="flex-grow flex flex-col items-center justify-center px-4">
        <div id="order-items" class="w-full max-w-lg grid grid-cols-2 gap-4">
            <?php if (empty($cart)) : ?>
                <p class="text-center text-white col-span-2">No items in your cart.</p>
            <?php else : ?>
                <?php foreach ($cart as $item) : ?>
                    <?php $total += $item['price'] * $item['quantity']; ?>
                    <div class="bg-white text-black p-4 rounded-2xl shadow-lg flex flex-col items-center justify-center aspect-square">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="w-16 h-16 rounded mb-2"/>
                        <span class="font-bold text-center"><?php echo htmlspecialchars($item['name']); ?></span>
                        <div class="text-sm text-gray-600">Amount: <?php echo $item['quantity']; ?></div>
                        <span class="font-semibold mt-2">€<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
    
    <footer class="flex justify-between items-center p-4">
        <span id="total-price" class="text-lg">Total: €<?php echo number_format($total, 2); ?></span>
        <a href="payment.php" class="bg-white text-green-600 px-4 py-2 rounded-lg shadow-lg flex items-center">
            Pay
            <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </footer>
</body>
</html>