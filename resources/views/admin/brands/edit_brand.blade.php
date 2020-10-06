@extends('admin.main')

@section('title')
    Edit brand - eBuy
@endsection

@section('content')


    {{-- original --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Edit brand</h4>
                  {{-- <p class="card-description">
                    Basic form elements
                  </p> --}}

                  @include('admin.partials.messages')

                  <form class="forms-sample" action="{{ url('update_brand', $brand->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputName1">Brand name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ $brand->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="exampleTextarea1" rows="2">{{ $brand->description }}</textarea>
                    </div>
                    <div class="form-group" >
                      <label>Brand image</label>
                          
                          <img src="{{ asset('images/brands/'. $brand->image) }}" alt="image" width="200" style="margin-left: 0px;">
                          
                        <input type="file" name="image" class="form-control form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-success mr-2">Update brand</button>
                    <button type="Cancel" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection