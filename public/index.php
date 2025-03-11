<?php
include "productsarray.php";
?>

<?php
session_start();

// Initialize cart session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
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
    <link rel="icon" href="assets/images/heblogoicon.webp" type="image/png">
    <style>
        body {
            font-family: 'Lato', sans-serif;
            background-color: white;
        }
        .gradient-green {
            background: linear-gradient(90deg, #38b2ac, #68d391);
        }
        .gradient-red {
            background: linear-gradient(90deg, #f56565, #fc8181);
        }
        .hidden {
            display: none;
        }
        .category-button {
            border-radius: 12px;
            transition: box-shadow 0.3s;
        }
        .category-button:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .item {
            width: 200px; 
            height: 300px; 
        }
        /* Popup styles */
        #popup {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="max-w-screen-xl mx-auto p-4">
        <!-- Banner -->
        <div class="relative mb-4">
            <img alt="Banner image of fresh and healthy food" class="w-full h-48 object-cover rounded-t-lg" height="300" src="https://storage.googleapis.com/a1aa/image/hrTveBswqhZCzdlmGeZ18S1oxQGH0XKhJ7ApP2d-FE4.jpg" width="1200"/>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white rounded-t-lg">
                <h1 class="text-4xl font-bold">Happy Herbivore</h1>
                <p class="text-lg">Fresh & Healthy Food</p>
                <div class="flex space-x-4 mt-2">
                    <div class="flex items-center space-x-1">
                        <span class="text-2xl font-bold text-green-500" id="total-items"><?php echo count($products); ?></span>
                        <span>Total Items</span>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span class="text-2xl font-bold text-green-500">6</span>
                        <span>Category</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex">
            <!-- Categories -->
            <div class="flex flex-col items-start mb-4 mr-4">
                <button class="flex flex-col items-center mb-2 category-button" onclick="filterItems('breakfast')">
                    <img alt="Breakfast category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/QDRmb4ifadd8Y1-HiyXRzXMB0Rixm0ccO02vCb-9VKU.jpg" width="50"/>
                    <span>BF</span>
                </button>
                <button class="flex flex-col items-center mb-2 category-button" onclick="filterItems('lunch')">
                    <img alt="Lunch category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/9QFI1yjZ6KzGArK9Wrzaa5bO3lcNJmp7bYSD70UyKzU.jpg" width="50"/>
                    <span>Lunch</span>
                </button>
                <button class="flex flex-col items-center mb-2 category-button" onclick="filterItems('sides')">
                    <img alt="Sides category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/QxZBRZYollAvdY-KoxFPNFtkRXW7rOcbxAYgbak1toc.jpg" width="50"/>
                    <span>Sides</span>
                </button>
                <button class="flex flex-col items-center mb-2 category-button" onclick="filterItems('snacks')">
                    <img alt="Snacks category" class="w-16 h-16 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/xsXmzp8Rmx8mGJUfiZTcoPC1dHTW7ZScMRUVl-lpAuQ.jpg" width="50"/>
                    <span>Snacks</span>
                </button>
                <button class="flex flex-col items-center mb-2 category-button" onclick="filterItems('dips')">
                    <img alt="Dips category" class="w-16 h-16 rounded-full" height="50" src="assets/images/8F1A9812-3-scaled.jpg" width="50"/>
                    <span>Dips</span>
                </button>
                <button class="flex flex-col items-center mb-2 category-button" onclick="filterItems('drinks')">
                    <img alt="Drinks category" class="w-16 h-16 rounded-full" height="50" src="assets/images/Smoothie-post.jpg" width="50"/>
                    <span>Drinks</span>
                </button>
            </div>
            <!-- Featured Items -->
            <div class="flex-1">
                <h2 class="text-2xl font-bold mb-4">Featured</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2" id="items-container">
                    <?php foreach ($products as $product): ?>
                    <div class="bg-white p-4 rounded-lg shadow item <?php echo $product['category']; ?>">
                        <img alt="<?php echo $product['name']; ?>" class="w-full h-32 object-cover rounded-lg mb-2" src="<?php echo $product['image_url']; ?>" />
                        <h3 class="text-lg font-bold"><?php echo $product['name']; ?></h3>
                        <div class="flex items-center justify-between mt-2">
                        <span class="text-xl font-bold text-red-500">€<?php echo number_format($product['price'], 2); ?></span>
                        <button class="gradient-green text-white rounded-full p-2" onclick="showPopup('<?php echo addslashes($product['name']); ?>', '€<?php echo number_format($product['price'], 2); ?>', '<?php echo $product['calories']; ?> kcal', '<?php echo addslashes($product['description']); ?>', '<?php echo $product['image_url']; ?>')">
                            <i class="fas fa-info-circle"></i>
                        </button>
                    </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Menu -->
    <div id="cart" class="fixed right-0 top-16 bg-white shadow-lg rounded-lg p-4 w-80 hidden">
        <h2 class="text-xl font-bold mb-2">Cart</h2>
        <div id="cart-items" class="max-h-60 overflow-y-auto mb-4"></div>
        <div class="flex justify-between font-bold">
            <span>Total:</span>
            <span id="total-price">€0.00</span>
        </div>
        <button class="gradient-green text-white rounded-full p-2 mt-2 w-full" onclick="proceedToOrder()">Proceed to Order</button>
    </div>

    <!-- Cart Toggle Button -->
    <button id="cart-toggle" class="fixed right-4 top-4 bg-green-500 text-white rounded-full p-2" onclick="toggleCart()">
        <i class="fas fa-shopping-cart"></i>
        <span id="cart-count" class="absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs px-1"></span>
    </button>

    <!-- Popup Modal -->
    <div id="popup" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg p-4 w-11/12 max-w-lg">
            <h2 id="popup-title" class="text-xl font-bold mb-2"></h2>
            <img id="popup-image" class="w-full h-64 object-cover rounded-lg mb-2" />
            <p id="popup-description" class="mb-4"></p>
            <div class="flex justify-between">
                <button onclick="closePopup()" class="mt-4 bg-red-500 text-white rounded-full px-4 py-2">Close</button>
                <button id="add-to-cart-button" class="mt-4 gradient-green text-white rounded-full px-4 py-2">Add to Cart</button>
            </div>
        </div>
    </div>

    <script>
        let cart = [];
        let total = 0;

        function showPopup(title, price, calories, description, image) {
            document.getElementById('popup-title').innerText = title;
            document.getElementById('popup-description').innerText = description + ' (' + calories + ')';
            document.getElementById('popup-image').src = image;
            document.getElementById('add-to-cart-button').onclick = function() {
                addToCart(title, parseFloat(price.replace('€', '')), image);
                closePopup();
            };
            document.getElementById('popup').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }

        function filterItems(category) {
            const items = document.querySelectorAll('.item');
            items.forEach(item => {
                if (item.classList.contains(category)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }

        function toggleCart() {
            const cartMenu = document.getElementById('cart');
            cartMenu.classList.toggle('hidden');
        }

        function addToCart(name, price, image) {
            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ name, price, quantity: 1, image });
            }
            updateCart();
        }

        function updateCart() {
            const cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';
            total = 0;

            const cartCount = document.getElementById('cart-count');
            cartCount.innerText = cart.reduce((sum, item) => sum + item.quantity, 0) || '';

            cart.forEach(item => {
                total += item.price * item.quantity;
                const itemDiv = document.createElement('div');
                itemDiv.className = 'flex justify-between items-center mb-2';
                itemDiv.innerHTML = `
                    <img src="${item.image}" alt="${item.name}" class="w-12 h-12 rounded mr-2"/>
                    <div class="flex-1">
                        <span>${item.name}</span>
                        <div class="flex items-center">
                            <button class="gradient-red text-white rounded-full p-1" onclick="changeQuantity('${item.name}', -1)">-</button>
                            <span class="mx-2">${item.quantity}</span>
                            <button class="gradient-green text-white rounded-full p-1" onclick="changeQuantity('${item.name}', 1)">+</button>
                        </div>
                    </div>
                    <span>€${(item.price * item.quantity).toFixed(2)}</span>
                `;
                cartItemsContainer.appendChild(itemDiv);
            });

            document.getElementById('total-price').innerText = `€${total.toFixed(2)}`;
        }

        function changeQuantity(name, change) {
            const item = cart.find(item => item.name === name);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    cart = cart.filter(i => i.name !== name);
                }
                updateCart();
            }
        }

        function proceedToOrder() {
            localStorage.setItem('cart', JSON.stringify(cart));
            window.location.href = 'order.php'; // Redirect to order.php
        }

        function addToCart(name, price, image) {
    const existingItem = cart.find(item => item.name === name);
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ name, price, quantity: 1, image });
    }
    updateCart();

    // Store cart in session
    fetch('update_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(cart)
    });
}
    </script>
</body>
</html>