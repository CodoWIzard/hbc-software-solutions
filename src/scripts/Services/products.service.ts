type Product = {
    id: string;
    name: string;
    price: number;
    category: string;
    image: string;
  };
  
  export class ProductService {
    private products: Product[] = [
      { id: "1", name: "Smoothie Bowl", price: 4.5, category: "BF", image: "smoothie.jpg" },
      { id: "2", name: "Quinoa Salad", price: 4.5, category: "Lunch", image: "quinoa.jpg" },
      // Add more products as needed
    ];
  
    getProducts(): Product[] {
      return this.products;
    }
  
    filterByCategory(category: string): Product[] {
      return this.products.filter(product => product.category === category);
    }
  }
  