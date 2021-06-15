@extends ('layouts.app')

@section('content')

<header class="jumbotron">
    <div class="container">
        <h1><span class="glyphicon glyphicon-tent"></span>Welcome To YelpCamp!</h1>
        <p>View our hand-picked campgrounds from all over the world</p>
        <p>
            <a class="btn btn-primary btn-lg" href="/campgrounds/create">Add New Campground</a>
        </p>
    </div>
</header>

<div class="row text-center" style="display:flex; flex-wrap: wrap;">
    @foreach ($campgrounds as $campground)
        <div class="col-md-3 col-sm-6 mr-5 mb-5">
            <div class="card" style="width: 18rem;">
                <img src="{{ $campground->image }}" class="img-fluid">
                <div class="card-body">
                    <h4>{{ $campground->name }}</h4>
                    <a href="{{ $campground->path() }}"class="btn btn-primary">More Info</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
