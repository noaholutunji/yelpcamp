@extends ('layouts.app')

    
@section('content')


   
        <h1 class="text-center my-2">Create a New Campground</h1>
        <div style="width: 30%; margin: 25px auto;">
            <form action="/campgrounds" method="POST">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="image" placeholder="image url">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="description" placeholder="description">
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block">Submit!</button>
                </div>
            </form>
            <a href="/campgrounds">Go Back</a>
        </div>
    </div>

    @endsection