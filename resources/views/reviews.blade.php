<!DOCTYPE html>
<html>
<head>
    <title>Reviews</title>
</head>
<body>
    <h1>Reviews</h1>
    <ul>
        @foreach ($reviews as $review)
            <li>{{ $review->created_at->format('d.m.y H:i') }} - {{ $review->content }}</li>
        @endforeach
    </ul>
    <h2>Add Review</h2>
    <form method="POST" action="/reviews">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <textarea name="content" placeholder="Review"></textarea>
        <select name="rate">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
