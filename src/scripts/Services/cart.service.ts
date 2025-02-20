type CartItem = {
    id: string;
    name: string;
    price: number;
    quantity: number;
    image: string;
  };
  
  export class CartService {
    private cartItems: CartItem[] = [];
  
    addToCart(item: CartItem) {
      const existingItem = this.cartItems.find(cartItem => cartItem.id === item.id);
      if (existingItem) {
        existingItem.quantity += item.quantity;
      } else {
        this.cartItems.push(item);
      }
      this.updateCartDisplay();
    }
  
    removeFromCart(id: string) {
      this.cartItems = this.cartItems.filter(item => item.id !== id);
      this.updateCartDisplay();
    }
  
    getCartItems(): CartItem[] {
      return this.cartItems;
    }
  
    getTotal(): number {
      return this.cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
    }
  
    private updateCartDisplay() {
      const cartContainer = document.querySelector(".cart-items");
      const subtotalElement = document.querySelector(".subtotal span");
      if (cartContainer && subtotalElement) {
        cartContainer.innerHTML = this.cartItems
          .map(
            item =>
              `<div class="cart-item">
                <img src="${item.image}" alt="${item.name}" />
                <div>
                  <p>${item.name}</p>
                  <p>${item.quantity} x €${item.price.toFixed(2)}</p>
                </div>
                <button data-id="${item.id}" class="remove">Remove</button>
              </div>`
          )
          .join("");
  
        subtotalElement.textContent = `€${this.getTotal().toFixed(2)}`;
      }
    }
  }
  