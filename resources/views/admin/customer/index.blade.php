@extends('admin.main')

@section('title')
    Customers - eBuy
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Customers</h4>
                  {{-- <p class="card-description">
                    Add class
                    <code>.table-striped</code>
                  </p> --}}
                  <p>
                  	<a href="{{ url('/add_customer') }}" style="text-decoration: underline; font-size: 13px; float: right;
                  	margin-bottom: 20px; ">+ Add Customer</a>
                  </p>

                  @include('admin.partials.messages')
                  
                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                      <thead style="background-color: #1c2331; color: #fafafa;">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Conatct</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      @php $num = 0; @endphp

                      @foreach ($customer as $customer)
                        <tbody>
                          <tr>
                            <td>@php echo ++$num; @endphp</td>
                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            {{-- <td class="py-1">
                              <img src="{{ asset('images/user/no-man.jpg') }}" alt="image">
                            </td> --}}
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->street_address }}</td>
                            <td>{{ $customer->city }}</td>
                            
                            {{-- <td>{{ $customer->parent_id }}</td> --}}
                            <td>
                              <a class="custom_edit" href="{{ url('/edit_customer', $customer->id) }}">
                                <i class="fa fa-pencil-square-o" style="padding-right: 10px;"></i>
                              </a>
                              {{-- <a href="{{ url('/show_customer', $customer->id) }}">
                                <i class="fa fa-eye" style="color: var(--success); padding-right: 10px; font-size: 15px;"></i></a> --}}
                              <a class="custom_delete" href="#deleteModal{{ $customer->id }}" data-toggle="modal">
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>

                            <!-- Delete Modal start -->
                            <div class="modal fade" id="deleteModal{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  {{-- <div class="modal-body">
                                    ...
                                  </div> --}}
                                  <div class="modal-footer">
                                    <form action="{{ url('/delete_customer', $customer->id) }}" method="post">
                                      {{ csrf_field() }}
                                      <button type="submit" class="btn btn-danger" style="font-weight: 400; font-size: 12px;">YES, delete permanently</button>
                                    </form>
                                    <button type="button" class="btn btn-success" data-dismiss="modal" style="font-weight: 400; font-size: 12px;">NO</button>
                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Delete Modal end -->

                            {{-- <td class="py-1">
                              <img src="admin_images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td>Herman Beck</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 77.99</td>
                            <td>May 15, 2015</td> --}}
                          </tr>
                        </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection