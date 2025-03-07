<?php
if (isset($_GET['option'])) {
    $option = $_GET['option'];
    // Process option selection (dine-in or takeout)
    header("Location: index.php?option=$option");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Herbivore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Lato', sans-serif;
            transition: background-color 0.5s;
        }
        .container {
            transition: opacity 0.5s;
        }
    </style>
    <script>
        function changeBackgroundColorAndRedirect(url) {
            const container = document.querySelector('.container');
            container.style.opacity = '0';
            document.body.style.background = 'linear-gradient(to right, orange, darkorange)';
            
            setTimeout(() => {
                window.location.href = url;
            }, 500);
        }
    </script>
</head>
<body class="bg-gradient-to-r from-teal-400 to-green-400 flex items-center justify-center h-screen text-gray-900">
    <div class="container text-center p-6 bg-white shadow-xl rounded-2xl w-full max-w-lg">
        <img src="assets/images/heblogo.webp" alt="Happy Herbivore Logo" class="w-32 mx-auto mb-4">
        <h1 class="text-3xl font-bold mb-4">Welcome to Happy Herbivore</h1>
       
        <div class="flex justify-center gap-6">
            <a href="?option=dinein" onclick="changeBackgroundColorAndRedirect('?option=dinein')" class="flex items-center justify-center gap-3 bg-green-500 text-white text-xl font-semibold py-4 px-8 rounded-lg shadow-md hover:bg-green-600 transition-transform transform hover:scale-105 w-48">
                <img src="assets/images/foodtrau.png" alt="Dine In Icon" class="w-8">
                Dine In
            </a>
            <a href="?option=takeout" onclick="changeBackgroundColorAndRedirect('?option=takeout')" class="flex items-center justify-center gap-3 bg-blue-500 text-white text-xl font-semibold py-4 px-8 rounded-lg shadow-md hover:bg-blue-600 transition-transform transform hover:scale-105 w-48">
                <img src="assets/images/shopping-32.png" alt="Take Out Icon" class="w-8">
                Take Out
            </a>
        </div>
    </div>
</body>
</html>
