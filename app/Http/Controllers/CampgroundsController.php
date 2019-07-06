<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campground;

class CampgroundsController extends Controller
{
    public function index()
    {
        $campgrounds = Campground::all();

        return view('campgrounds.index', compact('campgrounds'));
    }


    public function show(Campground $campground)
    {
        if (auth()->user()->isNot($campground->owner)) {
            abort(403);
        }
        return view('campgrounds.show', compact('campground'));
    }

    public function create()
    {
        return view('campgrounds.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            ]);

        

        auth()->user()->campgrounds()->create($attributes);

        

        return redirect('/campgrounds');
    }

    public function edit(Campground $campground)
    {
        return view('campgrounds.edit', compact('campground'));
    }

    public function update(Campground $campground)
    {
        if (auth()->user()->isNot($campground->owner)) {
            abort(403);
        }

        $campground->update([
            'name' => request('name'),
            'image' => request('image'),
            'description' => request('description')
        ]);

        return redirect($campground->path());
    }

    public function destroy(Campground $campground)
    {
        $campground->delete();
        
        return redirect('/campgrounds');
    }
}
