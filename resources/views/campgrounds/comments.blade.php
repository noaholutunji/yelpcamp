@extends ('layouts.app')

@section('content')
<div class="row">
        <h1 style="text-align: center">Add New Comment to {{ $campground->name }}></h1>
        <div style="width: 30%; margin: 25px auto;">
            <form action="{{ $campground->path() }}" method="POST">
            @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="comment[text]" placeholder="text">
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block">Submit!</button>
                </div>
            </form>
            <a href="/campgrounds">Go Back</a>
        </div>
    </div>


    @endsection
