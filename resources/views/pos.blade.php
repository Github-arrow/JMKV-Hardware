<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>JMKV Hardware</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
        

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <main>

            <div class="row ms-2 me-2 mt-4">
                <div class="col-sm-8">
                        <form class="form-horizontal" id="fromInvoice">
                            <table class="table table-bordered table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center">Product Brand</th> 
                                        <th class="text-center">Product Code</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Option</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Product Brand" id="productBrand" size="25px" required> <!-- Changed this line -->
                                        <ul id="productSuggestions" class="list-group" style="display: none; position: absolute; z-index: 999; max-height: 200px; overflow-y: auto; width: 100%;"></ul>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Product Code" id="productCode" size="25px" disabled>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" placeholder="Quantity" id="quantity" size="25px">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Unit Price" id="amount" size="25px" disabled>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="addProduct()">Add</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <table class="table table-bordered" id="product-list">
                            <thead>
                                <tr>
                                    <th style="width: 40px">Remove</th>
                                    <th>Product Code</th>
                                    <th>Product Brand</th> <!-- Changed this line -->
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>+
                            <tbody id="productListBody">
                                <!-- Dynamically added products will appear here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4 mt-0">
                        <div class="card shadow-sm">
                        <div class="form-group mt-3 ms-3 me-3" align="left">
                            <label class="form-label">Total</label>
                            <input type="text" class="form-control" id="total" size="30px" readonly>
                        </div>
                        <div class="form-group mt-3 ms-3 me-3" align="left">
                            <label class="form-label">Pay</label>
                            <input type="number" class="form-control" id="pay" size="30px" required>
                        </div>
                        <div class="form-group mt-3 ms-3 me-3" align="left">
                            <label class="form-label">Change</label>
                            <input type="text" class="form-control" id="balance" size="30px" readonly>
                        </div>
                
                        <div class="form-group mt-3 ms-3 me-3 mb-4" align="left">
                            <label class="form-label">Payment</label>
                            <select class="form-control" name="payment" type="text" id="payment" required>
                                <option value="">Please Select</option>
                                <option value="1">Cash</option>
                                <option value="2">Card</option>
                                <option value="3">Cheque</option>
                            </select>
                        </div>
                        <div align="center">
                            <button type="button" class="btn btn-primary mt-4 mb-4" onclick="createInvoice()">Create Invoice</button>
                            <button type="button" class="btn btn-secondary mt-4 mb-4" onclick="resetInvoice()">Reset Invoice</button>
                        </div>
                        </div>
                        
                        <div class="card shadow-sm mt-2 py-2">
                            <div class="form-group mt-3 ms-3 me-3 mb-2" align="left">
                                <h1 class="font-semibold text-l">Total Items : </h1>
                            </div>
                        </div>
                        <div class="card shadow-sm mt-2 py-2">
                            <div class="form-group mt-3 ms-3 me-3 mb-2" align="left">
                                <h1 class="font-semibold text-l" id="balance" >Change : </h1>
                            </div>
                        </div>
                    </div>
                    <footer class="fixed-bottom">
                        <div class="row me-0 ms-4">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                            <table class="table table-bordered" id="product-list">
                                <thead>
                                    <tr class="text-center">
                                        <th>Cashier Name : {{ Auth::user()->name }}</th>
                                        <th>
                                            <a href="{{ url('dashboard') }}" class="text-center" :active="request()->routeIs('user.dashboard')">
                                                EXIT
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </footer>
                </div>
            </div>

        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

<script>   
    // Initialize empty product list
    let productList = [];
    document.getElementById('productBrand').addEventListener('input', function() { // Changed 'productName' to 'productBrand'
    const productBrand = this.value;
    const suggestionsList = document.getElementById('productSuggestions');
    
    if (productBrand.length > 0) {  // Changed 'productName' to 'productBrand'
        // Fetch products based on the input
        fetch(`/search-products/${encodeURIComponent(productBrand)}`)  // Changed 'productName' to 'productBrand'
            .then(response => response.json())
            .then(data => {
                suggestionsList.innerHTML = ''; // Clear previous suggestions
                
                if (data.length > 0) {
                    data.forEach(product => {
                        const listItem = document.createElement('li');
                        listItem.classList.add('list-group-item');
                        listItem.textContent = `${product.brand} (${product.product_code})`; // Show brand and code
                        listItem.onclick = function() {
                            selectProduct(product);
                        };
                        suggestionsList.appendChild(listItem);
                    });
                    suggestionsList.style.display = 'block'; // Show the suggestions
                } else {
                    suggestionsList.style.display = 'none'; // No products found
                }
            })
            .catch(err => console.error('Error fetching product details:', err));
    } else {
        suggestionsList.style.display = 'none'; // Hide suggestions when input is empty
    }
});

// Function to handle product selection from the list
function selectProduct(product) {
    document.getElementById('productBrand').value = product.brand; // Changed 'productName' to 'productBrand'
    document.getElementById('productCode').value = product.product_code; // Populate the Product Code
    document.getElementById('amount').value = product.price; // Populate the Amount field (assuming 'price' is the field)
    document.getElementById('productSuggestions').style.display = 'none'; // Hide the suggestions after selection
}

document.addEventListener('DOMContentLoaded', function () {
    // Autofocus on Product Brand input
    document.getElementById('productBrand').focus();

    // Event listener for pressing Enter in Pay or Payment field
    document.getElementById('pay').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            document.getElementById('payment').focus(); // Move focus to Payment field
        }
    });

    document.getElementById('payment').addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            document.querySelector('button[onclick="createInvoice()"]').click(); // Trigger Create Invoice button
        }
    });

    // Keyboard navigation
    document.addEventListener('keydown', function (event) {
        const focusedElement = document.activeElement;
        const suggestionsList = document.getElementById('productSuggestions');
        const suggestions = Array.from(suggestionsList.getElementsByTagName('li'));
        let currentIndex = suggestions.findIndex(item => item.classList.contains('active'));

        switch (event.key) {
            case 'ArrowLeft':
                if (focusedElement.id === 'quantity') {
                    document.getElementById('productBrand').focus();
                } else if (focusedElement.id === 'amount') {
                    document.getElementById('quantity').focus();
                }
                break;

            case 'ArrowRight':
                if (focusedElement.id === 'productBrand') {
                    document.getElementById('quantity').focus();
                } else if (focusedElement.id === 'quantity') {
                    document.getElementById('amount').focus();
                }
                break;

            case 'Enter':
                if (focusedElement.id === 'productBrand' && suggestions.length > 0) {
                    if (currentIndex !== -1) {
                        suggestions[currentIndex].click();
                    }
                } else if (focusedElement.id === 'quantity' || focusedElement.id === 'amount') {
                    document.querySelector('button[onclick="addProduct()"]').click();
                }
                break;

            case 'ArrowUp':
                if (suggestions.length > 0 && currentIndex > 0) {
                    suggestions[currentIndex].classList.remove('active');
                    suggestions[currentIndex - 1].classList.add('active');
                }
                break;

            case 'ArrowDown':
                if (suggestions.length > 0 && currentIndex < suggestions.length - 1) {
                    if (currentIndex !== -1) {
                        suggestions[currentIndex].classList.remove('active');
                    }
                    suggestions[currentIndex + 1].classList.add('active');
                }
                break;

            default:
                break;
        }
    });

    // Suggestions navigation highlighting
    document.getElementById('productSuggestions').addEventListener('mouseover', function (event) {
        if (event.target.tagName === 'LI') {
            Array.from(this.children).forEach(child => child.classList.remove('active'));
            event.target.classList.add('active');
        }
    });
});

    // Add product to list
function addProduct() {
    const productCode = document.getElementById('productCode').value;
    const productBrand = document.getElementById('productBrand').value; // Changed 'productName' to 'productBrand'
    const quantity = document.getElementById('quantity').value;
    const unitPrice = document.getElementById('amount').value; // Changed from "Amount" to "Unit Price"

    if (productCode && productBrand && quantity && unitPrice) { // Changed 'productName' to 'productBrand'
        const totalAmount = parseFloat(unitPrice) * parseInt(quantity); // Calculate total dynamically
        const product = { productCode, productBrand, quantity, unitPrice: parseFloat(unitPrice), total: totalAmount }; // Changed 'productName' to 'productBrand'
        productList.push(product);
        updateProductList();
        updateTotal();

        // Clear the input fields
        document.getElementById('productCode').value = '';
        document.getElementById('productBrand').value = '';
        document.getElementById('quantity').value = '';
        document.getElementById('amount').value = ''; // Reset Unit Price

        // Refocus on the "Product Brand" input for convenience
        document.getElementById('productBrand').focus();
    } else {
        alert('Please fill all fields');
    }
}

// Update product list table
function updateProductList() {
    const productListBody = document.getElementById('productListBody');
    productListBody.innerHTML = '';  // Clear existing rows

    productList.forEach((product, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><button class="btn btn-danger btn-sm" onclick="removeProduct(${index})">X</button></td>
            <td>${product.productCode}</td>
            <td>${product.productBrand}</td>
            <td>${product.unitPrice.toFixed(2)}</td>
            <td>${product.quantity}</td>
            <td>${product.total.toFixed(2)}</td>
        `;
        productListBody.appendChild(row);
    });
}

    // Remove product from list
    function removeProduct(index) {
        productList.splice(index, 1);
        updateProductList();
        updateTotal();
    }

    // Update total amount
    function updateTotal() {
        const total = productList.reduce((sum, product) => sum + product.total, 0); // Use 'total' field
        document.getElementById('total').value = total.toFixed(2);
    }

    // Event listener for Pay input
    document.getElementById('pay').addEventListener('input', function() {
        const pay = parseFloat(this.value) || 0; // If the value is empty, default to 0
        const total = parseFloat(document.getElementById('total').value) || 0; // Default to 0 if total is empty

        const change = pay - total; // Calculate the change
        document.getElementById('balance').value = change.toFixed(2); // Update the balance (change) field
    });

    // Reset invoice
    function resetInvoice() {
        productList = [];
        updateProductList();
        document.getElementById('total').value = '';
        document.getElementById('pay').value = '';
        document.getElementById('balance').value = '';
    }

 // Create invoice and send to server
function createInvoice() {
    if (productList.length === 0) {
        alert('Please add at least one product to create an invoice.');
        return;
    }

    const totalAmount = parseFloat(document.getElementById('total').value) || 0;
    const payAmount = parseFloat(document.getElementById('pay').value) || 0;
    const balanceAmount = parseFloat(document.getElementById('balance').value) || 0;
    const paymentMethod = document.getElementById('payment').value;

    // Prepare invoice data
    const invoiceData = {
        total: totalAmount,
        pay: payAmount,
        balance: balanceAmount,
        payment_method: paymentMethod,
        products: productList.map(product => ({
            product_code: product.productCode,
            product_brand: product.productBrand,
            quantity: product.quantity,
            unit_price: product.unitPrice,
        }))
    };

    console.log(invoiceData);  // Check productData in browser console for debugging

    fetch('/create-invoice', { // URL matches the route
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(invoiceData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            displayInvoice(invoiceData); // Pass the invoice data to display

            resetInvoice();
        } else {
            alert('Failed to Create Invoice.');
        }
    })
    .catch(error => console.error('Invoice creation error:', error));
}

    
    // Add a mapping function for payment methods
function getPaymentMethodLabel(paymentMethodNumber) {
    switch (paymentMethodNumber) {
        case '1':
            return 'Cash';
        case '2':
            return 'Card';
        case '3':
            return 'Cheque';
        default:
            return 'Unknown';
    }
}

// Display the invoice details in a modal
function displayInvoice(invoice) {
    const productRows = invoice.products
        .map(
            product => ` 
            <tr>
                <td>${product.product_code}</td>
                <td>${product.product_brand}</td>
                <td>${product.quantity}</td>
                <td>${product.unit_price.toFixed(2)}</td>
                <td>${(product.quantity * product.unit_price).toFixed(2)}</td>
            </tr>`
        )
        .join('');

    // Build the invoice content
    document.getElementById('invoice-details').innerHTML = `
        <div style="width: 100%; text-align: center; font-size: 18px; margin-bottom: 20px;">
            <h2>JMKV Hardware</h2>
        </div>
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px; margin-bottom: 20px;">
            <thead>
                <tr style="background-color: #007bff; color: white;">
                    <th>Product Code</th>
                    <th>Product Brand</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                ${productRows}
            </tbody>
        </table>
        <div style="margin-top: 20px; font-size: 16px;">
            <p><strong>Date:</strong> ${new Date(invoice.created_at).toLocaleDateString()}</p>
            <p><strong>Total:</strong> ₱${invoice.total.toFixed(2)}</p>
            <p><strong>Amount Paid:</strong> ₱${invoice.pay.toFixed(2)}</p>
            <p><strong>Balance:</strong> ₱${invoice.balance.toFixed(2)}</p>
            <p><strong>Payment Method:</strong> ${getPaymentMethodLabel(invoice.payment_method)}</p>
        </div>
        <div style="margin-top: 30px; text-align: center;">
            <p>_________________________</p>
            <p>Authorized Signature</p>
        </div>
    `;

    // Show the modal
    const invoiceModal = document.getElementById('invoice-modal');
    invoiceModal.style.display = 'block';
}

// Print the receipt
function printInvoice() {
    const invoiceContent = document.getElementById('invoice-details').innerHTML;

    const printWindow = window.open('', '', 'height=800,width=800');
    printWindow.document.write('<html><head><title>JMKV Hardware</title>');
    printWindow.document.write('<style> body { font-family: Arial, sans-serif; padding: 20px; } table { width: 100%; border: 1px solid black; border-collapse: collapse; } td, th { padding: 8px; border: 1px solid black; } h2 { text-align: center; font-size: 24px; margin-bottom: 30px; } p { margin: 10px 0; }</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h3>Invoice Receipt</h3>'); 
    printWindow.document.write(invoiceContent);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>

    </body>
</html>

       
