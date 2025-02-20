import { ProductService } from "./Services/products.service";

export function initializeSearch(productService: ProductService) {
  const searchInput = document.querySelector<HTMLInputElement>(".search-bar input");
  const productList = document.querySelector(".product-list");

  if (searchInput && productList) {
    searchInput.addEventListener("input", () => {
      const query = searchInput.value.toLowerCase();
      const filteredProducts = productService
        .getProducts()
        .filter(product => product.name.toLowerCase().includes(query));

      productList.innerHTML = filteredProducts
        .map(
          product =>
            `<div class="product-card">
              <img src="${product.image}" alt="${product.name}" />
              <p>${product.name}</p>
              <p>€${product.price.toFixed(2)}</p>
              <button data-id="${product.id}" class="add-to-cart">Add to Cart</button>
            </div>`
        )
        .join("");
    });
  }
}
