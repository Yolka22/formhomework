<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review; // Підключення моделі Review

class ReviewController extends Controller
{
    // Метод для відображення сторінки з відгуками та формою
    public function index()
    {
        $reviews = Review::all(); // Отримуємо всі відгуки з бази даних
        return view('reviews', ['reviews' => $reviews]); // Передаємо відгуки в вигляд 'reviews'
    }

    // Метод для збереження нового відгуку
    public function store(Request $request)
    {
        // Валідація даних з форми
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required',
            'rate' => 'required|in:1,2,3,4,5',
        ]);

        // Збереження нового відгуку
        $review = new Review;
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->content = $request->input('content');
        $review->rate = $request->input('rate');
        $review->created_at = now(); // Поточна дата та час
        $review->save();

        return redirect('/reviews')->with('success', 'Відгук успішно додано'); // Після збереження перенаправляємо користувача на сторінку відгуків
    }
}

