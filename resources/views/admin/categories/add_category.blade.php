@extends('admin.main')

@section('title')
    Add categories - eBuy
@endsection

@section('content')


    {{-- original --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Add category</h4>
                  {{-- <p class="card-description">
                    Basic form elements
                  </p> --}}

                  @include('admin.partials.messages')

                  <form class="forms-sample" action="{{ url('save_category') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputName1">Category name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Category name">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="exampleTextarea1" rows="2" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Parent category</label>
                      <select class="form-control" name="parent_id">
                      	<option value="">Select primary category</option>
                      	@foreach ($main_category as $category)
                      		<option value="{{ $category->id }}">{{ $category->name }}</option>
                      	@endforeach
                      </select>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-success mr-2">Add category</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection