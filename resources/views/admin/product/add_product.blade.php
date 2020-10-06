@extends('admin.main')

@section('title')
    Add product
@endsection

@section('content')


    {{-- original --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Add product</h4>
                  {{-- <p class="card-description">
                    Basic form elements
                  </p> --}}

                  @include('admin.partials.messages')

                  <form class="forms-sample" action="{{ url('save_product') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Product name">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="discription" id="exampleTextarea1" rows="2" placeholder="Description"></textarea>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                      <label for="exampleInputName1">Price</label>
                      <input type="number" name="price" class="form-control" id="exampleInputName1" placeholder="Price">
                    </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                      <label for="exampleInputEmail3">Quantity</label>
                      <input type="number" name="quantity" class="form-control" id="exampleInputEmail3" placeholder="Quantity">
                    </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputName1">Category</label>
                          <select class="form-control" name="category_id">
                            <option value="">Select a category</option>
                            @foreach (App\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)

                              <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                              @foreach (App\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)

                                <option value="{{ $child->id }}">&emsp;&emsp;--&nbsp;{{ $child->name }}</option>

                              @endforeach
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputName1">Brand</label>
                          <select class="form-control" name="brand_id">
                            <option value="">Select a brand</option>
                            @foreach (App\Brand::orderBy('name', 'asc')->get() as $brand)

                              <option value="{{ $brand->id }}">{{ $brand->name }}</option>

                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    
                    {{-- <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" name="product_image" class="form-control file-upload-info" disabled placeholder="Upload product image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div> --}}
                    <div class="form-group" >
                        <input type="file" name="product_image" class="form-control form-control">
                    </div>
                    {{-- <div class="form-group">
                      <label for="exampleInputCity1">City</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                    </div> --}}
                    
                    <button type="submit" class="btn btn-success mr-2">Add product</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection