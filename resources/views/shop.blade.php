<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop - Products</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f4; }
        .shop-title { text-align: center; color: #333; }
        .products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 30px; }
        .product-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
        .product-name { font-size: 1.2rem; color: #222; margin-bottom: 10px; }
        .product-desc { color: #666; font-size: 0.9rem; height: 50px; }
        .product-price { font-size: 1.1rem; color: #e44d26; font-weight: bold; margin: 10px 0; }
        .product-stock { font-size: 0.85em; color: #28a745; margin-bottom: 15px; }
        .out-of-stock { color: #dc3545; }
        .btn-add { background-color: #007bff; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; text-decoration: none; }
        .btn-add:hover { background-color: #0056b3; }
        .cart-section { margin-top: 50px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<h1 class="shop-title">Welcome to Our Online Shop</h1>

<div class="products-grid">
    @foreach($products as $product)
        <div class="product-card">
            <div class="product-name">{{ $product->name }}</div>
            <div class="product-desc">{{ $product->description }}</div>
            <div class="product-price">${{ $product->price }}</div>

            <div class="product-stock">
                @if($product->stock > 0)
                    In Stock: {{ $product->stock }} units
                @else
                    <span class="out-of-stock">Out of Stock</span>
                @endif
            </div>

            @if($product->stock > 0)
                <form action="/add-to-cart/{{ $product->id }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-add">Add to Cart</button>
                </form>
            @endif
        </div>
    @endforeach
</div>

<div class="cart-section">
    <h2>Your Shopping Cart</h2>
    @if(session('cart') && count(session('cart')) > 0)
        <table border="1" width="100%" cellpadding="10" style="border-collapse: collapse; text-align: left;">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity']; @endphp
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>${{ $details['price'] }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>${{ $details['price'] * $details['quantity'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3>Grand Total: ${{ $total }}</h3>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>

</body>
</html>
