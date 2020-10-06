@extends('admin.main')

@section('title')
    Orders - eBuy
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order lists</h4>
                  {{-- <p class="card-description">
                    Add class
                    <code>.table-striped</code>
                  </p> --}}
                  {{-- <p>
                  	<a href="{{ url('/add_order') }}" style="text-decoration: underline; font-size: 13px; float: right;
                  	margin-bottom: 20px; ">+ Add brands</a>
                  </p> --}}

                  @include('admin.partials.messages')
                  
                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                      <thead style="background-color: #1c2331; color: #fafafa;">
                        <tr>
                          <th>#</th>
                          <th>Order ID</th>
                          <th>Orderer name</th>
                          <th>Orderer phone no.</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      @php $num = 0; @endphp

                      @foreach ($orders as $order)
                        <tbody>
                          <tr>
                            <td>@php echo ++$num; @endphp</td>
                            <td>#LI{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>
                            	<p style="margin-bottom: 5px;">
                            		@if ($order->is_paid)
	                            		<span class="badge badge-success" style="font-weight: 400;">Paid</button>
	                            	@else
	                            		<span class="badge badge-danger" style="font-weight: 400;">Unpaid</span>
	                            	@endif
                            	</p>
                            	<p style="margin-bottom: 5px;">
                            		@if ($order->is_seen)
	                            		<span class="badge badge-success" style="font-weight: 400;">Seen</span>
	                            	@else
	                            		<span class="badge badge-danger" style="font-weight: 400;">Unseen</span>
	                            	@endif
                            	</p>
                            	<p>
                            		@if ($order->is_completed)
	                            		<span class="badge badge-success" style="font-weight: 400;">Completed</span>
	                            	@else
	                            		<span class="badge badge-danger" style="font-weight: 400;">Not Completed</span>
	                            	@endif
                            	</p>
                            	
                            </td>

                            
                            
                            {{-- <td>{{ $order->parent_id }}</td> --}}
                            <td>
                              <a class="custom_print" href="{{ url('/edit_order', $order->id) }}">
                                <i class="fa fa-print" style="padding-right: 10px;"></i>
                              </a>
                              <a class="custom_view" href="{{ url('/view', $order->id) }}">
                                <i class="fa fa-eye" style="padding-right: 10px;"></i>
                              </a>
                              <a class="custom_delete" href="#deleteModal{{ $order->id }}" data-toggle="modal">
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>

                            <!-- Delete Modal start -->
                            <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="{{ url('/delete_order', $order->id) }}" method="post">
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
                        <tfoot></tfoot>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection