<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\CanReview;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add(Request $request){
        $canReview = CanReview::find($request->can_review_id);
        Review::create([
            'user_id' => Auth::user()->id,
            'product_id' => $canReview->product_id,
            'comment' => $request->comment,
            'rating' => $request->rating
        ]);

        $product = $canReview->product;
        $canReview->delete();
        return Api::setResponse('product',$product);
    }

    public function index(){
        $user = Auth::user();
        return Api::setResponse('reviews',$user->reviews);
    }
}
