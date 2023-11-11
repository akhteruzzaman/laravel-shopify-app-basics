<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>

    <h1>Welcome to Your Laravel Shopify App</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['title'] }}</td>
                    <td>{{ $product['variants'][0]['price'] }}</td>
                    <td>
                        @if(isset($product['images'][0]['src']))
                            <img src="{{ $product['images'][0]['src'] }}" alt="{{ $product['title'] }}" style="max-width: 100px; max-height: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
