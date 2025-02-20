import { CartService } from "./services/cart.service";

export function initializeCartActions(cartService: CartService) {
  const productList = document.querySelector(".product-list");

  if (productList) {
    productList.addEventListener("click", event => {
      const target = event.target as HTMLElement;
      if (target.classList.contains("add-to-cart")) {
        const productId = target.getAttribute("data-id");
        if (productId) {
          const productElement = target.closest(".product-card");
          if (productElement) {
            const name = productElement.querySelector("p")?.textContent || "Unknown";
            const price = parseFloat(productElement.querySelector("p:nth-child(2)")?.textContent?.replace("€", "") || "0");
            const image = productElement.querySelector("img")?.getAttribute("src") || "";

            cartService.addToCart({ id: productId, name, price, quantity: 1, image });
          }
        }
      }
    });
  }
}
