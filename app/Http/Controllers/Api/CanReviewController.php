<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CanReviewController extends Controller
{
    public function index(){
        $canReviews = Auth::user()->canReviews;
        return Api::setResponse('canReviews', $canReviews);
    }
}
