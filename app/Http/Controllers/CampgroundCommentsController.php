<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campground;

class CampgroundCommentsController extends Controller
{
    public function store(Campground $campground)
    {
        if (auth()->user()->isNot($campground->owner)) {
            abort(403);
        }
        request()->validate(['body' => 'required']);
        
        $campground->addComment(request('body'));

        return redirect($campground->path());
    }
}
