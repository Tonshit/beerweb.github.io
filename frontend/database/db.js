function loadCart() {
    fetch('cart.php')
        .then(response => response.json())
        .then(cart => {
            const cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';
            let totalPrice = 0;

            cart.forEach((item, index) => {
                const subtotal = (parseFloat(item.price) * item.quantity).toFixed(2);
                const productDiv = document.createElement('div');
                productDiv.className = 'text-center product-container';
                productDiv.innerHTML = `
                    <img src="${item.image}" alt="${item.name}" class="product-image" />
                    <p class="text-sm mt-2">${item.name}</p>
                    <p class="text-lg font-bold text-black-600">₱${item.price} x ${item.quantity} = ₱${subtotal}</p>
                    <button class="mt-2 bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600" onclick="removeItem(${item.id})">Remove</button>
                `;
                cartItemsContainer.appendChild(productDiv);
                totalPrice += parseFloat(subtotal);
            });

            animateTotalPrice(totalPrice);
        });
}

function removeItem(id) {
    fetch('cart.php', {
        method: 'REMOVE',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id })
    })
    .then(() => loadCart());
}