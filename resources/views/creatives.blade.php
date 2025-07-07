<!DOCTYPE html>
<html>
<head>
    <title>Creatives</title>
</head>
<body>
    <h1>Add Creative</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('creatives.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Enter name" required>
        <input type="text" name="address" placeholder="Enter address" required>
        <button type="submit">Add</button>
    </form>

    <h2>All Creatives</h2>
    <ul>
        @forelse ($creatives as $creative)
            <li>{{ $creative->name }}</li>
            <li>{{ $creative->address }}</li>
        @empty
            <li>No creatives added yet.</li>
        @endforelse
    </ul>
</body>
</html>
