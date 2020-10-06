@extends('admin.main')

@section('title')
    Add brand - eBuy
@endsection

@section('content')


    {{-- original --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Add brand</h4>
                  {{-- <p class="card-description">
                    Basic form elements
                  </p> --}}

                  @include('admin.partials.messages')

                  <form class="forms-sample" action="{{ url('save_brand') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputName1">Brand name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Brand name">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="exampleTextarea1" rows="2" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group" >
                        <input type="file" name="image" class="form-control form-control">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-success mr-2">Add brand</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection