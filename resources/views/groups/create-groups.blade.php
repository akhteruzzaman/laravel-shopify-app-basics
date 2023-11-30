<!-- create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Form</title>
</head>
<body>

    <h1>Create groups</h1>
    
    <!-- Form to create a new item -->
    <form action="{{ route('group.save') }}" method="POST">

        @sessionToken
        <input type="hidden" name="host" value="{{getHost()}}">
        <!-- Name Field -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        <br>

        <!-- Description Field -->
        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        <br>
       
        <!-- Submit Button -->
        <button type="submit">Create Item</button>
    </form>
 @include('partials.scripts')
</body>
</html>
