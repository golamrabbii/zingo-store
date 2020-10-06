@extends('admin.main')

@section('title')
    Add district - eBuy
@endsection

@section('content')


    {{-- original --}}
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Add district</h4>
                  {{-- <p class="card-description">
                    Basic form elements
                  </p> --}}

                  @include('admin.partials.messages')

                  <form class="forms-sample" action="{{ url('save_district') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputName1">District name</label>
                      <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="District name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Division</label>
                      <select class="form-control" name="division_id">
                        <option value="">Select a division for the ditrict</option>
                        @foreach ($divisions as $division)
                          <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success mr-2">Add district</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection