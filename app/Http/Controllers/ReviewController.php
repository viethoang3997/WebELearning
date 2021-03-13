<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    

    public function store(ReviewRequest $request)
    {
        $review = $request->all();
        $review['user_id'] = Auth::user()->id;
        Review::create($review);
        return redirect()->back();
    }

    // public function edit($id)
    // {
    //     $review = Review::findOrFail($id);
    //     return view('review.edit', compact('review'));
    // }

    public function update(ReviewRequest $request, $id)
    {
        $review = Review::findOrFail($id);
        if ($review->user_id != Auth::id()) {
            return redirect()->back();
        }
        $data = [
            'content' => $request->content,
            'rating' => $request->rating
        ];
        $review->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->back();
    }
}
