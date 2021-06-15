@extends ('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-3">
        <p class="lead">YelpCamp</p>
        <div class="list-group">
            <li class="list-group-item active">Info 1</li>
            <li class="list-group-item">Info 2</li>
            <li class="list-group-item">Info 3</li>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card w-100">
            <img src="{{ $campground->image }}" class="card-img-top img-responsive">
            <div class="card-body">
                <h4 class="text-right">N 10,000.00/night</h4>
                <h4 class="text-primary"><a>{{ $campground->name }}</a></h4>

                <p> <em>Submitted By {{ $campground->owner->name }}</em></p>
                <div class="d-flex justify-content-between">
                    @can('update', $campground)
                        <a href="{{ $campground->path().'/edit' }}" class="btn btn-warning">Edit Campground</a>
                    @endcan

                    @can('update', $campground)
                        <form method="POST" action="{{ $campground->path() }}">
                            @method('DELETE')
                            @csrf
                            <button class="mt-3 btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card mt-4 w-100" style="width: 50rem;">
            <div class="card-body">
                @foreach($campground->comments as $comment)
                    <div>{{$comment->body}}</div>
                    <div class="mb-3"<em>submitted by: {{ Auth::user()->name }} </em></div>
                @endforeach
                <form method="POST" action="{{ $campground->path() . '/comments' }}">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="body" placeholder="Comment">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="btn btn-success mt-2 ">Add comment</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <div>
    </div>
</div>

    @endsection
