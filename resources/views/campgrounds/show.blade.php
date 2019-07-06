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
 
            <p> <em>Submitted By {{ Auth::user()->name }}</em></p>
                     
           <a href="{{ $campground->path().'/edit' }}" class="btn btn-warning">Edit Campground</a>
            </div>
           </div>
      
         <div class="card mt-4 w-100" style="width: 50rem;">
           <div class="card-body">
         <div class="text-right">
        <a href="{{ $campground->path().'/comments' }}" class="btn btn-success text-right">Add New Comment</a>  
       </div>

       
       
          <div>
  </div>
</div>
            
    @endsection