@extends('admin.main')

@section('title')
    Products
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All products</h4>
                  {{-- <p class="card-description">
                    Add class
                    <code>.table-striped</code>
                  </p> --}}

                  @include('admin.partials.messages')
                  
                  <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                      <thead style="background-color: #1c2331; color: #fafafa;">
                        <tr>
                          <th>#</th>
                          <th>Product name</th>
                          <th>Image</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      @php $num = 0; @endphp

                      @foreach ($products as $product)
                        <tbody>
                          <tr>
                            <td>@php echo ++$num; @endphp</td>
                            <td>{{ $product->name }}</td>
                            <td class="py-1">
                              @php $i=1; @endphp
                              @foreach ($product->images as $image)
                                @if ($i > 0)
                                  <img src="{{ asset('images/products/'. $image->image) }}" alt="image">
                                @endif
                                              
                                @php $i--; @endphp
                              @endforeach
                            </td>
                            <td>&#2547; {{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                              <a class="custom_edit" href="{{ url('/edit_product', $product->id) }}">
                                <i class="fa fa-pencil-square-o" style="padding-right: 10px;"></i>
                              </a>
                              <a class="custom_view" href="{{ url('/show_product', $product->slug) }}">
                                <i class="fa fa-eye" style="padding-right: 10px;"></i></a>
                              <a class="custom_delete" href="#deleteModal{{ $product->id }}" data-toggle="modal">
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>

                            <!-- Delete Modal start -->
                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="{{ url('/delete_product', $product->id) }}" method="post">
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