@extends ('layouts.app')

@section('content')

<h1 class="text-center my-2">Edit {{ $campground->name }}</h1>
<div style="width: 30%; margin: 25px auto;">
    <form action="{{ $campground->path() }}" method="POST">
    @csrf
    @method('PATCH')
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{ $campground->name }}">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="image" value="{{ $campground->image }}">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="description" value="{{ $campground->description }}">
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block">Update!</button>
        </div>
    </form>
    <div>
        <a href="/campgrounds">Go Back</a>
    </div>
</div>

@endsection
