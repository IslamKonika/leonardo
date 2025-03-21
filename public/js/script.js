// Global variables for cart management
let selectedProducts = [];
let cartTotal = 0;

// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Fetch products and render them
    fetchProducts();

    // Set up input field behavior
    setupInputFields();

    // Set up custom cursor
    setupCustomCursor();

    // Set up the cart update functions
    setupCartFunctions();
});

// Fetch products from the API
function fetchProducts() {
    fetch('https://dummyjson.com/products')
        .then(res => res.json())
        .then(data => {
            const products = data.products.slice(0, 4);
            renderProducts(products);
        })
        .catch(error => console.error("Error fetching products:", error));
}

// Render products to the product container
function renderProducts(products) {
    const productContainer = document.getElementById("productContainer");

    if (!productContainer) {
        console.error("Product container not found!");
        return;
    }

    productContainer.innerHTML = ''; // Clear existing content

    products.forEach(product => {
        // Create product card
        const productCard = document.createElement("div");
        productCard.classList.add("productCard");

        productCard.innerHTML = `
            <div class="item_warpper">
                <div class="itemImage">
                    <img src="${product.images[0]}" alt="${product.title}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="itemContent">
                    <h3>${product.title}</h3>

                    <p class="price">$${product.price} /month</p>
                </div>
                <div class="count">
                    <button class="decrement" data-product-id="${product.id}">-</button>
                    <div class="result" id="product-count-${product.id}">0</div>
                    <button class="increment" data-product-id="${product.id}">+</button>
                </div>
            </div>
        `;

        productContainer.appendChild(productCard);

        // Add event listeners to this product's buttons
        setupProductCounters(productCard, product);
    });
}

// Set up increment/decrement functionality for a specific product
function setupProductCounters(productCard, product) {
    const result = productCard.querySelector(".result");
    const incrementBtn = productCard.querySelector(".increment");
    const decrementBtn = productCard.querySelector(".decrement");

    incrementBtn.addEventListener("click", function() {
        let count = parseInt(result.textContent);
        count += 1;
        result.textContent = count;

        updateCart(product, count);
    });

    decrementBtn.addEventListener("click", function() {
        let count = parseInt(result.textContent);
        if (count > 0) {
            count -= 1;
            result.textContent = count;
            updateCart(product, count);
        }
    });
}

// Update the cart when a product quantity changes
function updateCart(product, newQuantity) {
    // Check if product is already in the cart
    const existingProductIndex = selectedProducts.findIndex(p => p.id === product.id);

    if (existingProductIndex >= 0) {
        if (newQuantity <= 0) {
            // Remove product if quantity is zero
            selectedProducts.splice(existingProductIndex, 1);
        } else {
            // Update quantity if product exists
            selectedProducts[existingProductIndex].quantity = newQuantity;
        }
    } else if (newQuantity > 0) {
        // Add new product to cart
        selectedProducts.push({
            id: product.id,
            title: product.title,
            price: product.price,
            quantity: newQuantity
        });
    }

    // Update cart display
    renderCart();
}

// Render the shopping cart with all selected products
function renderCart() {
    // Calculate total
    cartTotal = selectedProducts.reduce((total, product) => {
        return total + (product.price * product.quantity);
    }, 0);

    // Update cart items display
    const cartItemsContainer = document.querySelector(".payment-box");
    if (!cartItemsContainer) return;

    // Clear existing items but keep the header
    const cartHeader = cartItemsContainer.querySelector("h2");
    cartItemsContainer.innerHTML = '';
    cartItemsContainer.appendChild(cartHeader);

    // Add "Storage per month" text
    const storageText = document.createElement("p");
    storageText.textContent = "Storage per month";
    cartItemsContainer.appendChild(storageText);

    // Add divider
    let divider = document.createElement("div");
    divider.className = "divider";
    cartItemsContainer.appendChild(divider);

    // Add selected items to cart
    if (selectedProducts.length > 0) {
        const itemsList = document.createElement("div");
        itemsList.className = "cart-items";

        selectedProducts.forEach(product => {
            const itemRow = document.createElement("div");
            itemRow.className = "cart-item";
            itemRow.innerHTML = `
                <span class="item-name">${product.title} (x${product.quantity})</span>
                <span class="item-price">$${(product.price * product.quantity).toFixed(2)}</span>
            `;
            itemsList.appendChild(itemRow);
        });

        cartItemsContainer.appendChild(itemsList);

        // Add subtotal
        const subtotalDiv = document.createElement("div");
        subtotalDiv.className = "subtotal";
        subtotalDiv.innerHTML = `
            <span>Subtotal</span>
            <span>$${cartTotal.toFixed(2)}</span>
        `;
        cartItemsContainer.appendChild(subtotalDiv);
    }

    // Add total
    const totalDiv = document.createElement("div");
    totalDiv.className = "total";

    if (cartTotal > 0) {
        totalDiv.innerHTML = `
            <span>Total due today</span>
            <span>$${cartTotal.toFixed(2)}</span>
        `;
    } else {
        totalDiv.innerHTML = `
            <span>Total due today</span>
            <span>FREE</span>
        `;
    }

    cartItemsContainer.appendChild(totalDiv);

    // Add another divider
    divider = document.createElement("div");
    divider.className = "divider";
    cartItemsContainer.appendChild(divider);

    // Add return info
    const returnInfo = document.createElement("p");
    returnInfo.className = "return-info";
    returnInfo.textContent = "▼ Return charges apply";
    cartItemsContainer.appendChild(returnInfo);

    // Add delivery info
    const deliveryInfo = document.createElement("p");
    deliveryInfo.innerHTML = 'Delivery fees are charged when you order your stuff back, <a href="#">find out more here.</a>';
    cartItemsContainer.appendChild(deliveryInfo);

    // Add note
    const noteDiv = document.createElement("div");
    noteDiv.className = "note";
    noteDiv.textContent = "FREE to cancel or amend your order if you let us know before 11am one working day prior to your collection or delivery.";
    cartItemsContainer.appendChild(noteDiv);

    // Update box counter UI if needed
    updateBoxCounter();
}

// Update the box counter in the Boxes section
function updateBoxCounter() {
    // You could implement this to keep the box counter in sync with the cart
    // if you have specific box products that need to be tracked separately
}

// Set up the Storagehotel Large Box counter in the Boxes section
function setupCartFunctions() {
    const boxWrapper = document.querySelector(".boxes .item_warpper");
    if (boxWrapper) {
        const result = boxWrapper.querySelector(".result");
        const incrementBtn = boxWrapper.querySelector(".increment");
        const decrementBtn = boxWrapper.querySelector(".decrement");

        if (incrementBtn && decrementBtn && result) {
            incrementBtn.addEventListener("click", function() {
                let count = parseInt(result.textContent);
                count += 1;
                result.textContent = count;

                // Add Storagehotel Large Box to cart
                const boxProduct = {
                    id: "storageBox",
                    title: "Storagehotel Large Box",
                    price: 20,  // $20/month as shown in your HTML
                    quantity: count
                };

                updateCart(boxProduct, count);
            });

            decrementBtn.addEventListener("click", function() {
                let count = parseInt(result.textContent);
                if (count > 0) {
                    count -= 1;
                    result.textContent = count;

                    // Update Storagehotel Large Box in cart
                    const boxProduct = {
                        id: "storageBox",
                        title: "Storagehotel Large Box",
                        price: 20,
                        quantity: count
                    };

                    updateCart(boxProduct, count);
                }
            });
        }
    }

    // Set up the Common Items section
    setupCommonItems();
}

// Set up the Common Items section counters
function setupCommonItems() {
    const commonItems = document.querySelectorAll(".commonItems .item");

    commonItems.forEach(item => {
        const title = item.querySelector("h3").textContent;
        const priceText = item.querySelector("p").textContent;
        const price = parseInt(priceText.match(/\d+/)[0]);
        const itemId = title.toLowerCase().replace(/\s+/g, "-");

        const decrementBtn = item.querySelector("button:first-of-type");
        const incrementBtn = item.querySelector("button:last-of-type");
        const countSpan = item.querySelector(".quantity span");

        incrementBtn.addEventListener("click", function() {
            let count = parseInt(countSpan.textContent);
            count += 1;
            countSpan.textContent = count;

            const itemProduct = {
                id: itemId,
                title: title,
                price: price,
                quantity: count
            };

            updateCart(itemProduct, count);
        });

        decrementBtn.addEventListener("click", function() {
            let count = parseInt(countSpan.textContent);
            if (count > 0) {
                count -= 1;
                countSpan.textContent = count;

                const itemProduct = {
                    id: itemId,
                    title: title,
                    price: price,
                    quantity: count
                };

                updateCart(itemProduct, count);
            }
        });
    });
}

// Set up custom cursor functionality
function setupCustomCursor() {
    const cursor = document.querySelector(".custom-cursor");

    if (cursor) {
        document.addEventListener("mousemove", (e) => {
            cursor.style.left = `${e.clientX}px`;
            cursor.style.top = `${e.clientY}px`;
        });

        // Make cursor bigger on hover over clickable elements
        document.querySelectorAll("button, a").forEach((el) => {
            el.addEventListener("mouseenter", () => {
                cursor.style.transform = "scale(1.5)";
            });
            el.addEventListener("mouseleave", () => {
                cursor.style.transform = "scale(1)";
            });
        });
    }
}

// Set up input field animations
function setupInputFields() {
    const inputs = document.querySelectorAll('.inputbox input');

    inputs.forEach(input => {
        // Check if there's any value already in the input
        if (input.value) {
            input.previousElementSibling.classList.add('filled');
        }

        // On focus, add the 'filled' class to the label
        input.addEventListener('focus', () => {
            input.previousElementSibling.classList.add('filled');
        });

        // On blur, remove the 'filled' class if the input is empty
        input.addEventListener('blur', () => {
            if (input.value === '') {
                input.previousElementSibling.classList.remove('filled');
            }
        });
    });

    // Set up the custom item button
    const customItemBtn = document.querySelector(".customItemBtn");
    if (customItemBtn) {
        customItemBtn.addEventListener("click", addCustomItem);
    }
}

// Add a custom item to the cart
function addCustomItem() {
    const itemName = document.getElementById("itemName").value;
    const itemLength = parseFloat(document.getElementById("itemLength").value) || 0;
    const itemWidth = parseFloat(document.getElementById("itemWidth").value) || 0;
    const itemHeight = parseFloat(document.getElementById("itemHeight").value) || 0;

    if (!itemName || itemLength <= 0 || itemWidth <= 0 || itemHeight <= 0) {
        alert("Please fill in all dimensions and provide a name for your custom item.");
        return;
    }

    // Calculate cubic feet (L × W × H) / 1728 (if dimensions are in inches)
    const cubicFeet = (itemLength * itemWidth * itemHeight) / 1728;

    // Calculate price based on cubic feet (example: $10 per cubic foot)
    const price = cubicFeet * 10;

    // Create custom item object
    const customItem = {
        id: `custom-${Date.now()}`, // Unique ID based on timestamp
        title: `Custom: ${itemName}`,
        price: price,
        quantity: 1,
        dimensions: `${itemLength}" × ${itemWidth}" × ${itemHeight}"`
    };

    // Add to cart
    updateCart(customItem, 1);

    // Update the cubic feet display
    const cubicFeetDisplay = document.querySelector(".desc p");
    if (cubicFeetDisplay) {
        cubicFeetDisplay.textContent = `Total Cubic Feet: ${cubicFeet.toFixed(2)}`;
    }

    const priceDisplay = document.querySelector(".desc span");
    if (priceDisplay) {
        priceDisplay.textContent = `$${price.toFixed(2)}/month`;
    }

    // Clear form
    document.getElementById("itemName").value = "";
    document.getElementById("itemLength").value = "";
    document.getElementById("itemWidth").value = "";
    document.getElementById("itemHeight").value = "";

    // Remove 'filled' class from labels
    document.querySelectorAll('.inputbox label').forEach(label => {
        label.classList.remove('filled');
    });
}
