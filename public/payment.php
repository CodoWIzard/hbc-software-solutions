<?php
session_start();

// Store selected payment method
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_method'])) {
    $_SESSION['payment_method'] = $_POST['payment_method'];
    header("Location: payment-processing.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Select Payment Method</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        .highlight {
            border: 2px solid teal;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-teal-400 to-green-400 text-white h-screen flex flex-col justify-between">
    <div class="flex items-center justify-center flex-grow">
        <div class="bg-white rounded-lg shadow-lg p-8 w-80 text-gray-700">
            <div class="flex justify-between items-center mb-6">
                <img alt="Logo" class="w-12 h-12" src="assets/images/heblogo.webp"/>
                <button class="text-teal-600 font-bold" onclick="window.history.back();">Back</button>
            </div>
            <h2 class="text-center font-semibold mb-6">Select a payment method</h2>
            <form method="POST" action="">
                <div class="flex justify-around mb-6">
                    <button type="submit" name="payment_method" value="card" class="text-center payment-option">
                        <img alt="Pay with card" class="w-20 h-20 mb-2" src="assets/images/card.png"/>
                        <p>Pay with card</p>
                    </button>
                    <button type="submit" name="payment_method" value="ideal" class="text-center payment-option">
                        <img alt="Pay with iDeal" class="w-20 h-20 mb-2" src="assets/images/ideal.png"/>
                        <p>Pay with iDeal</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
