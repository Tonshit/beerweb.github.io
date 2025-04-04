async function loadBuyers() {
    const response = await fetch('http://localhost/buyers-info/api.php');
    const buyers = await response.json();
    const buyersInfoContainer = document.getElementById('buyers-info');
    buyersInfoContainer.innerHTML = '';

    buyers.forEach((buyer) => {
        const row = buyersInfoContainer.insertRow();
        const cellName = row.insertCell(0);
        const cellAddress = row.insertCell(1);
        const cellNumber = row.insertCell(2);
        const cellTotalPrice = row.insertCell(3);
        const cellAction = row.insertCell(4);
        
        cellName.innerText = buyer.name;
        cellAddress.innerText = buyer.address;
        cellNumber.innerText = buyer.number;
        cellTotalPrice.innerText = `₱ ${parseFloat(buyer.totalPrice).toFixed(2)}`;
        
        const deleteButton = document.createElement('button');
        deleteButton.innerText = 'Delete';
        deleteButton.className = 'bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition duration-200';
        deleteButton.onclick = () => deleteBuyer(buyer.id);
        cellAction.appendChild(deleteButton);
    });
}

async function deleteBuyer(id) {
    await fetch(`http://localhost/buyers-info/api.php?id=${id}`, {
        method: 'DELETE'
    });
    loadBuyers();
}

window.onload = loadBuyers;