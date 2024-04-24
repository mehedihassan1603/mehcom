<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Delete</title>
    <!-- Add any CSS or styling you want for the confirmation dialog -->
</head>
<body>
    <h1>Confirm Delete</h1>
    <p>Are you sure you want to delete this product?</p>
    <p>Product Name: {{ $product->product_name }}</p>
    <!-- Add any other product details you want to display -->

    <!-- Use JavaScript to handle confirmation -->
    <script>
        function confirmDelete() {
            if (confirm("Are you sure you want to delete this product?")) {
                // If user confirms, redirect to ConfirmDeleteProduct route
                window.location.href = "{{ route('confirm_delete_product', $product->id) }}";
            } else {
                // If user cancels, redirect back to all_product route
                window.location.href = "{{ route('all_product') }}";
            }
        }
    </script>

    <!-- Call the confirmDelete function when the page loads -->
    <script>
        window.onload = confirmDelete;
    </script>
</body>
</html>
