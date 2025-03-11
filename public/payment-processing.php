<?php
session_start();

// Generate random order number
$orderNumber = rand(1000, 9999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gradient-to-r from-teal-400 to-green-400 text-white h-screen flex flex-col justify-center items-center relative">
    <!-- Logo in the top left corner -->
    <img src="assets/images/heblogo.webp" alt="Logo" class="absolute top-4 left-4 w-24 h-auto">

    <div class="text-center">
        <div id="order-number" class="text-5xl font-bold mb-4">#<?php echo $orderNumber; ?></div>
        <div class="text-xl mb-4">Payment Successful</div>
        <div class="flex justify-center">
            <i class="fas fa-check-circle text-3xl"></i>
        </div>
    </div>
</body>
</html>
