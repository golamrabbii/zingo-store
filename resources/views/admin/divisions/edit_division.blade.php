@extends('admin.main')

@section('title')
    Edit division - eBuy
@endsection

@section('content')


    {{-- original --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Edit division</h4>
                  {{-- <p class="card-description">
                    Basic form elements
                  </p> --}}

                  @include('admin.partials.messages')

                  <form class="forms-sample" action="{{ url('update_division', $division->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputName1">Division name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ $division->name }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Priority</label>
                      <input type="text" class="form-control" name="priority" id="exampleInputName1" value="{{ $division->priority }}">
                    </div>
                   
                    
                    <button type="submit" class="btn btn-success mr-2">Update division</button>
                    <button type="Cancel" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection