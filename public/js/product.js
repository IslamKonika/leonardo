// Add these functions to your existing JavaScript code

// Initialize cart array and DOM elements
let cart = [];
const subtotalEl = document.getElementById('subtotal');
const taxEl = document.getElementById('tax');
const totalEl = document.getElementById('total');
const cartItemsEl = document.getElementById('cartItems');

// Function to update the cart display
function updateCartDisplay() {
  // Clear current cart display
  cartItemsEl.innerHTML = '';

  if (cart.length === 0) {
    cartItemsEl.innerHTML = '<div class="empty-cart-message">Your cart is empty</div>';
    return;
  }

  // Add each item to the cart display
  cart.forEach(item => {
    const cartItemEl = document.createElement('div');
    cartItemEl.classList.add('cart-item');

    cartItemEl.innerHTML = `
      <div class="cart-item-details">
        <h4>${item.title}</h4>
        <p class="item-price">$${item.price} × ${item.quantity}</p>
      </div>
      <div class="cart-item-total">
        $${(item.price * item.quantity).toFixed(2)}
      </div>
      <button class="remove-item" data-product-id="${item.id}">×</button>
    `;

    cartItemsEl.appendChild(cartItemEl);
  });

  // Add event listeners to remove buttons
  document.querySelectorAll('.remove-item').forEach(button => {
    button.addEventListener('click', function() {
      const productId = parseInt(this.getAttribute('data-product-id'));
      removeFromCart(productId);
    });
  });

  // Update totals
  updateCartTotals();
}

// Calculate and update cart totals
function updateCartTotals() {
  // Calculate subtotal
  const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

  // Calculate tax (10%)
  const tax = subtotal * 0.1;

  // Calculate total
  const total = subtotal + tax;

  // Update DOM
  subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
  taxEl.textContent = `$${tax.toFixed(2)}`;
  totalEl.textContent = `$${total.toFixed(2)}`;

  // Update the payment box total in the right sidebar if it exists
  const paymentBoxTotal = document.querySelector('.total span:last-child');
  if (paymentBoxTotal) {
    paymentBoxTotal.textContent = total > 0 ? `$${total.toFixed(2)}` : 'FREE';
  }
}

// Add an item to the cart
function addToCart(product) {
  // Check if product is already in cart
  const existingItem = cart.find(item => item.id === product.id);

  if (existingItem) {
    // Increment quantity
    existingItem.quantity += 1;
  } else {
    // Add new item to cart
    cart.push({
      id: product.id,
      title: product.title,
      price: product.price,
      quantity: 1
    });
  }

  // Update cart display
  updateCartDisplay();
}

// Remove an item from the cart
function removeFromCart(productId) {
  const itemIndex = cart.findIndex(item => item.id === productId);

  if (itemIndex !== -1) {
    if (cart[itemIndex].quantity > 1) {
      // Decrease quantity if more than 1
      cart[itemIndex].quantity -= 1;
    } else {
      // Remove item if quantity is 1
      cart.splice(itemIndex, 1);
    }
  }

  // Update cart display
  updateCartDisplay();

  // Also update the product counter in the product listing
  const productResult = document.querySelector(`.increment[data-product-id="${productId}"]`)
    .parentElement.querySelector('.result');

  if (productResult) {
    const currentCount = parseInt(productResult.textContent);
    if (currentCount > 0) {
      productResult.textContent = currentCount - 1;
    }
  }
}

// Modify your existing fetch code to connect to the cart functionality
fetch('https://dummyjson.com/products')
    .then(res => res.json())
    .then(data => {
        const products = data.products.slice(0, 4);
        const productContainer = document.getElementById("productContainer");

        products.forEach(product => {
            // Create product card (your existing code)
            const productCard = document.createElement("div");
            productCard.classList.add("productCard");

            productCard.innerHTML = `
                <div class="item_warpper">
                    <div class="itemImage">
                        <img src="${product.images[0]}" alt="Product Image" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="itemContent">
                        <h3>${product.title}</h3>
                        <p class="dimention">18" x 18" x 16"</p>
                        <p class="price">$${product.price}</p>
                    </div>
                    <div class="count">
                        <button class="decrement" data-product-id="${product.id}">-</button>
                        <div class="result">0</div>
                        <button class="increment" data-product-id="${product.id}">+</button>
                    </div>
                </div>
            `;

            productContainer.appendChild(productCard);

            // Select elements within the newly created productCard
            const result = productCard.querySelector(".result");
            const incrementBtn = productCard.querySelector(".increment");
            const decrementBtn = productCard.querySelector(".decrement");

            // Add event listeners with cart functionality
            incrementBtn.addEventListener("click", function () {
                let count = parseInt(result.textContent);
                result.textContent = count + 1;

                // Add to cart
                addToCart(product);
            });

            decrementBtn.addEventListener("click", function () {
                let count = parseInt(result.textContent);
                if (count > 0) {
                    result.textContent = count - 1;

                    // Remove from cart
                    removeFromCart(product.id);
                }
            });
        });
    })
    .catch(error => console.error("Error fetching products:", error));

// Initialize cart display
updateCartDisplay();
