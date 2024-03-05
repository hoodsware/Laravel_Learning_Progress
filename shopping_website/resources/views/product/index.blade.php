<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welcome</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

        @forelse ($products as $product)
            {{ $loop-> }}
        @empty
            <p>Products are unavailable</p>
        @endforelse

        <!-- Delete product -->
        <!-- <form action="{{ route('product.destroy', $products->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">
                Delete
            </button>
        </form> -->
    </body>
</html>