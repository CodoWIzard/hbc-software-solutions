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