@extends('admin.main')

@section('title')
    Edit categories - eBuy
@endsection

@section('content')


    {{-- original --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Edit category</h4>
                  {{-- <p class="card-description">
                    Basic form elements
                  </p> --}}

                  @include('admin.partials.messages')

                  <form class="forms-sample" action="{{ url('update_category', $category->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputName1">Category name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description" id="exampleTextarea1" rows="2">{{ $category->description }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Parent category</label>
                      <select class="form-control" name="parent_id">
                      	<option value="">Select primary category</option>
                      	@foreach ($main_category as $cat)
                      		<option value="{{ $cat->id }}"  {{ ($cat->id == $category->parent_id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                      	@endforeach
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success mr-2">Update category</button>
                    <button type="Cancel" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection