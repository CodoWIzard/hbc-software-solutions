<?php
// Include database configuration and routing
require './config/database.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

if ($uri[0] === 'products') {
    require './src/routes/products.php';
} elseif ($uri[0] === 'orders') {
    require './src/routes/orders.php';
} else {
    http_response_code(404);
    echo json_encode(["message" => "Route not found"]);
    exit; // Stop further execution if route is not found
}
?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Happy Herbivore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .gradient-green {
            background: linear-gradient(90deg, #38b2ac, #68d391);
        }
        .gradient-red {
            background: linear-gradient(90deg, #f56565, #fc8181);
        }
    </style>
</head>
<body class="bg-orange-50">
    <div class="max-w-screen-xl mx-auto p-4">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-2">
                <div class="relative w-full max-w-md">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-white"></i>
                    <input class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 bg-green-500 text-white placeholder-white w-full" placeholder="Search" type="text"/>
                </div>
                <div class="flex space-x-2">
                    <div class="gradient-green p-2 rounded-full">
                        <i class="fas fa-home text-white text-2xl"></i>
                    </div>
                    <div class="gradient-green p-2 rounded-full">
                        <i class="fas fa-shopping-cart text-white text-2xl"></i>
                    </div>
                </div>
            </div>
            <div class="relative">
                <i class="fas fa-bell text-green-500 text-2xl"></i>
                <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-500 rounded-full"></span>
            </div>
        </div>
        <!-- Banner -->
        <div class="relative mb-4">
            <img alt="Banner image of fresh and healthy food" class="w-full h-48 object-cover rounded-t-lg" height="300" src="https://storage.googleapis.com/a1aa/image/hrTveBswqhZCzdlmGeZ18S1oxQGH0XKhJ7ApP2d-FE4.jpg" width="1200"/>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-between items-center text-white rounded-t-lg px-4">
                <div>
                    <h1 class="text-5xl font-bold">Happy Herbivore</h1>
                </div>
                <div class="flex space-x-4">
                    <div class="flex items-center space-x-1">
                        <span class="text-2xl font-bold text-green-500">45</span>
                        <span>Total Items</span>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="text-2xl font-bold text-green-500">16</span>
                        <span>Category</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories -->
        <div class="grid grid-cols-3 sm:grid-cols-6 gap-4 mb-4">
            <div class="flex flex-col items-center">
                <img alt="Breakfast category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/QDRmb4ifadd8Y1-HiyXRzXMB0Rixm0ccO02vCb-9VKU.jpg" width="50"/>
                <span>BF</span>
            </div>
            <div class="flex flex-col items-center">
                <img alt="Lunch category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/9QFI1yjZ6KzGArK9Wrzaa5bO3lcNJmp7bYSD70UyKzU.jpg" width="50"/>
                <span>Lunch</span>
            </div>
            <div class="flex flex-col items-center">
                <img alt="Dinner category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/Pf9n9SeTLRVjeObRAHlnGERFvra65v16uizOMeH_Pi4.jpg" width="50"/>
                <span>Dinner</span>
            </div>
            <div class="flex flex-col items-center">
                <img alt="Sides category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/QxZBRZYollAvdY-KoxFPNFtkRXW7rOcbxAYgbak1toc.jpg" width="50"/>
                <span>Sides</span>
            </div>
            <div class="flex flex-col items-center">
                <img alt="Drinks category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/mEKwTCtQvYMajQvWXmBKwQujTpANhwCScG0I1rBNcgk.jpg" width="50"/>
                <span>Drinks</span>
            </div>
            <div class="flex flex-col items-center">
                <img alt="Snacks category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/xsXmzp8Rmx8mGJUfiZTcoPC1dHTW7ZScMRUVl-lpAuQ.jpg" width="50"/>
                <span>Snacks</span>
            </div>
        </div>
        <!-- Featured Items -->
        <h2 class="text-2xl font-bold mb-4">Featured</h2>
        <div class="flex overflow-x-auto space-x-4">
            <div class="bg-white p-4 rounded-lg shadow min-w-[200px]">
                <img alt="Berry Blast Smoothie" class="w-full h-32 object-cover rounded-lg mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/NiHx_vpCdvKeNlaMnKS87oqH5kdyYPDd_Ke1roqdwWw.jpg" width="150"/>
                <h3 class="text-lg font-bold">Berry Blast Smoothie</h3>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xl font-bold text-red-500">4.4</span>
                    <span class="text-xl font-bold text-red-500">€4.50</span>
                    <button class="gradient-green text-white rounded-full p-2" onclick="addToCart('berry-blast', 4.50, 'https://storage.googleapis.com/a1aa/image/NiHx_vpCdvKeNlaMnKS87oqH5kdyYPDd_Ke1roqdwWw.jpg')">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow min-w-[200px]">
                <img alt="Smoothie Bowl" class="w-full h-32 object-cover rounded-lg mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/VxzohXyYtv9pXIUBOnrwGfOekHQaXudz9UC8hKUpcs4.jpg" width="150"/>
                <h3 class="text-lg font-bold">Smoothie Bowl</h3>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xl font-bold text-red-500">4.8</span>
                    <span class="text-xl font-bold text-red-500">€4.50</span>
                    <button class="gradient-green text-white rounded-full p-2" onclick="addToCart('smoothie-bowl', 4.50, 'https://storage.googleapis.com/a1aa/image/VxzohXyYtv9pXIUBOnrwGfOekHQaXudz9UC8hKUpcs4.jpg')">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow min-w-[200px]">
                <img alt="Trail Mix Cup" class="w-full h-32 object-cover rounded-lg mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/9QFI1yjZ6KzGArK9Wrzaa5bO3lcNJmp7bYSD70UyKzU.jpg" width="150"/>
                <h3 class="text-lg font-bold">Trail Mix Cup</h3>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xl font-bold text-red-500">4.2</span>
                    <span class="text-xl font-bold text-red-500">€4.50</span>
                    <button class="gradient-green text-white rounded-full p-2" onclick="addToCart('trail-mix-cup', 4.50, 'https://storage.googleapis.com/a1aa/image/9QFI1yjZ6KzGArK9Wrzaa5bO3lcNJmp7bYSD70UyKzU.jpg')">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow min-w-[200px]">
                <img alt="Quinoa Salad" class="w-full h-32 object-cover rounded-lg mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/Pf9n9SeTLRVjeObRAHlnGERFvra65v16uizOMeH_Pi4.jpg" width="150"/>
                <h3 class="text-lg font-bold">Quinoa Salad</h3>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xl font-bold text-red-500">4.3</span>
                    <span class="text-xl font-bold text-red-500">€4.50</span>
                    <button class="gradient-green text-white rounded-full p-2" onclick="addToCart('quinoa-salad', 4.50, 'https://storage.googleapis.com/a1aa/image/Pf9n9SeTLRVjeObRAHlnGERFvra65v16uizOMeH_Pi4.jpg')">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow min-w-[200px]">
                <img alt="Green Smoothie" class="w-full h-32 object-cover rounded-lg mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/green-smoothie.jpg" width="150"/>
                <h3 class="text-lg font-bold">Green Smoothie</h3>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xl font-bold text-red-500">4.5</span>
                    <span class="text-xl font-bold text-red-500">€5.00</span>
                    <button class="gradient-green text-white rounded-full p-2" onclick="addToCart('green-smoothie', 5.00, 'https://storage.googleapis.com/a1aa/image/green-smoothie.jpg')">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow min-w-[200px]">
                <img alt="Fruit Salad" class="w-full h-32 object-cover rounded-lg mb-2" height="150" src="https://storage.googleapis.com/a1aa/image/fruit-salad.jpg" width="150"/>
                <h3 class="text-lg font-bold">Fruit Salad</h3>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xl font-bold text-red-500">4.6</span>
                    <span class="text-xl font-bold text-red-500">€4.00</span>
                    <button class="gradient-green text-white rounded-full p-2" onclick="addToCart('fruit-salad', 4.00, 'https://storage.googleapis.com/a1aa/image/fruit-salad.jpg')">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar -->
    <div class="fixed top-0 right-0 w-80 h-full bg-white shadow-lg p-4">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold">Your Cart</h2>
            <i class="fas fa-edit text-green-500"></i>
        </div>
        <div class="space-y-4" id="cart-items">
            <!-- Cart items will be dynamically added here -->
        </div>
        <div class="mt-4">
            <div class="flex items-center justify-between">
                <span>Subtotal</span>
                <span class="text-red-500" id="subtotal">€0.00</span>
            </div>
            <div class="flex items-center justify-between">
                <span>Tax</span>
                <span class="text-red-500" id="tax">€0.00</span>
            </div>
            <div class="flex items-center justify-between font-bold">
                <span>Total</span>
                <span class="text-red-500" id="total">€0.00</span>
            </div>
            <button class="w-full gradient-green text-white py-2 rounded-lg mt-4">Pay</button>
        </div>
    </div>
    <script>
        const cart = {};

        function addToCart(item, price, imageUrl) {
            if (!cart[item]) {
                cart[item] = { quantity: 0, price: price, imageUrl: imageUrl };
            }
            cart[item].quantity += 1;
            updateCart();
        }

        function updateQuantity(item, change) {
            if (cart[item]) {
                cart[item].quantity = Math.max(0, cart[item].quantity + change);
                if (cart[item].quantity === 0) {
                    delete cart[item];
                }
                updateCart();
            }
        }

        function updateCart() {
            const cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';
            let subtotal = 0;

            for (const item in cart) {
                const cartItem = cart[item];
                subtotal += cartItem.price * cartItem.quantity;

                const cartItemElement = document.createElement('div');
                cartItemElement.className = 'flex items-center justify-between p-2 border rounded-lg';
                cartItemElement.innerHTML = `
                    <div class="flex items-center space-x-2">
                        <img alt="${item}" class="w-12 h-12 rounded-full" src="${cartItem.imageUrl}" />
                        <div>
                            <h3 class="text-lg font-bold">${item.replace(/-/g, ' ')}</h3>
                            <span class="text-red-500">€${cartItem.price.toFixed(2)}</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="gradient-red text-white rounded-full p-2" onclick="updateQuantity('${item}', -1)"><i class="fas fa-minus"></i></button>
                        <span>${cartItem.quantity}</span>
                        <button class="gradient-green text-white rounded-full p-2" onclick="updateQuantity('${item}', 1)"><i class="fas fa-plus"></i></button>
                    </div>
                `;
                cartItemsContainer.appendChild(cartItemElement);
            }

            document.getElementById('subtotal').innerText = `€${subtotal.toFixed(2)}`;
            const tax = subtotal * 0.20; // Assuming 20% tax rate
            document.getElementById('tax').innerText = `€${tax.toFixed(2)}`;
            document.getElementById('total').innerText = `€${(subtotal + tax).toFixed(2)}`;
        }
    </script>
</body>
</html>

<?php include 'footer.php'; ?>