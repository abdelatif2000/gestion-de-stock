@extends('layouts.app')
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.update',$result->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name *</label>
                                        <input value="{{$result->name}}" name="name" type="text" class="form-control" placeholder="Enter Product Name" />
                                        @error('name') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category * </label>
                                        <select name='category' class="selectpicker form-control" data-style="py-0">
                                            <option value="{{$result->category->id}}" selected>{{$result->category->name}}</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input value="{{$result->price}}" name="price" type="text" class="form-control" placeholder="Enter Price " />
                                        @error('price') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Color</label>
                                        <input value="{{$result->color}}" name="color" type="text" class="form-control" placeholder="Enter color " />
                                        @error('color') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Size</label>
                                        <input value="{{$result->size}}" name="size" type="text" class="form-control" placeholder="Enter size " />
                                        @error('size') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                @if($result->photos)
                                <ul class="list-unstyled p-0 m-0 row">
                                    @foreach($result->photos as $photo)
                                    <li style="display:grid;place-items:center " class="col-lg-4 col-md-6 col-sm-6 mt-2"><img src="{{asset($photo->path)}}" class="img-thumbnail w-100 h-100 img-fluid rounded" alt="Responsive image">
                                        <div style="position: absolute;">
                                            <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('photo.destroyPhoto',$photo->id)}}"><i class="ri-delete-bin-line mr-0"></i></a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Images</label>
                                        <input type="file" multiple class="form-control image-file" name="images[]" accept="image/*">
                                        @error('images') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">update Product</button>
                            <a href="{{route('product.index')}}" type="button" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection