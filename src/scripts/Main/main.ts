import { CartService } from "./Services/cart.service";
import { ProductService } from "./Services/products.service";
import { initializeSearch } from "./Components/search";
import { initializeCartActions } from "./Components/cart-actions";

document.addEventListener("DOMContentLoaded", () => {
  const cartService = new CartService();
  const productService = new ProductService();

  // Initialize components
  initializeSearch(productService);
  initializeCartActions(cartService);
});
