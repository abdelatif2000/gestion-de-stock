@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="container row">
    <div id="carouselExampleIndicators" class="carousel slide col-6" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach($result->photos as $key=> $photo)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class=" {{$key==0 ? 'active' : ''}}"></li>
      @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach ($result->photos as $key=> $photo)
        <div class="carousel-item {{$key==0 ? 'active' : ''}} ">
          <img src="{{asset($photo->path)}}" class="d-block w-100 h-100" alt="">
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
<div class="or-detail rounded  col-6">
  <div class="p-3">
      <h5 class="mb-3">Product Details</h5>
      <div class="mb-2">
          <h6>Product Name</h6>
          <p> {{$result->name}}</p>
      </div>
      <div class="mb-2">
          <h6>Minimum Stock </h6>
          <p>{{$result->alert}}</p>
      </div>
      <div class="mb-2">
          <h6>Color</h6>
          <p> {{$result->color}}</p>
      </div>
      <div>
          <h6>Category</h6>
          <a href="{{$result->category->id}}">{{$result->category->name}}</a>
      </div>
      <div>
        <h6>Action</h6>
        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title=""  href=" {{route('product.edit',$result->id)}}"><i class="ri-pencil-line mr-0"></i>Edit </a>
        <form action="{{route('product.destroy',$result->id)}}" method="post" style="display:inline-block">
            @csrf
            @method("DELETE")
            <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title=""  href="#"><i class="ri-delete-bin-line mr-0"> </i>Delete</a>
        </form>
    </div>
  </div>
  <div class="ttl-amt py-2 px-3 d-flex justify-content-between align-items-center">
      <h6>Price</h6>
      <h3 class="text-primary font-weight-700">${{$result->price}}</h3>  
  </div>

</div>
     </div>
  </div>
</div>

@endsection