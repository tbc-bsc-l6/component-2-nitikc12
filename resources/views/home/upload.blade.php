<!DOCTYPE html>
<html>
<head>
    <title>Upload Product</title>
    @include('home.css') <!-- If you are using shared CSS -->
</head>
<body>

    <h2>Upload Product</h2>

    <!-- Display success message if present -->
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- Product upload form -->
    <form action="{{ route('product.upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Product Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="image">Product Image:</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>
        <button type="submit">Upload</button>
    </form>

    @include('home.footer') <!-- If you are using shared footer -->

</body>
</html>
