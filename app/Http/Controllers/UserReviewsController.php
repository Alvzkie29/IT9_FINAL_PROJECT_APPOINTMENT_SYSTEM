<?php

namespace App\Http\Controllers;

use App\Models\UserReviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReviewsController extends Controller
{
    public function index() {
        $userReviews = UserReviews:: with('user')->paginate(10);
        return view('user.user_reviews', compact('userReviews'));
    }

    // Show add review form
    public function create() {
        return view('user.add_review');
    }

    // Store review
    public function store(Request $request) {
        $request->validate([
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        UserReviews::create([
            'user_id' => Auth::id(),
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->route('user-reviews.index')->with('success', 'Review submitted successfully!');
    }
}
