<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Products Management</title>
</head>
<body>

<!-- Step 1: Add New Product Form -->
<h2>Admin Panel - Add New Product</h2>
<form action="/products" method="POST" style="margin-bottom: 30px;">
    @csrf
    <label>Product Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" required><br><br>

    <button type="submit">Save Product</button>
</form>

<hr>

<!-- Step 2: Existing Products Table -->
<h2>Available Products</h2>
<table border="1" width="80%" cellpadding="10">
    <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>

    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>
