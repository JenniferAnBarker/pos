@extends('admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Order Details</a></li>
                        
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
                <h4 class="page-title">Order Details</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->

    <!-- start page content -->
    <div class="row">
        <div class="col-lg-8 col-xl-12">
            <div class="card">
                <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form method="post" action="{{ route('order.status.update')}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $order->id}}">
                                
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Order Details</h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Customer Image</label>
                                            <img id="showImage" class="rounded-circle avatar-lg img-thumbnail" src="{{ asset($order->customer->image)}}" alt="profile-image">
                                         </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <p class="text-danger">{{ $order->customer->name}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <p class="text-danger">{{ $order->customer->email}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <p class="text-danger">{{ $order->customer->phone}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="order_date" class="form-label">Order Date</label>
                                            <p class="text-danger">{{ $order->order_date}}</p>
                                        </div>
                                    </div> <!-- end col -->

                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="payment_status" class="form-label">Payment Type</label>
                                            <p class="text-danger">{{ $order->payment_status}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="pay" class="form-label">Paid Amount</label>
                                            <p class="text-danger">£{{ number_format((float)$order->pay, 2, '.', '')}}</p>
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="due" class="form-label">Due Amount</label>
                                            <p class="text-danger">£{{ number_format((float)$order->due, 2, '.', '')}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                    

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="invoice_no" class="form-label">Invoice Number</label>
                                            <p class="text-danger">{{ $order->invoice_no}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                
                                
                                <div class="text-end">
                                    @if($order->due == 0)
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Complete Order</button>
                                    @else
                                    <a href="{{ route('pending.due')}}" class="btn btn-warning waves-effect waves-light mt-2">Go To Payments</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-cart-outline me-1"></i> Ordered Items</h5>
                                    <table class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total(+VAT)</th>
                                            </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                            @foreach($orderItems as $key=> $item)
                                            <tr>
                                                <td> <img src="{{url($item->product->product_image)}}" style="width:50px; height:40px;"> </td>
                                                <td>{{ $item->product->product_name}}</td>
                                                <td>{{ $item->product->product_code}}</td>
                                                <td>{{ $item->quantity}}</td>
                                                <td>£{{ number_format((float)$item->unit_cost, 2, '.', '')}}</td>
                                                <td>£{{ number_format((float)$item->total, 2, '.', '')}}</td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
            
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->

                    {{-- </div> <!-- end tab-content --> --}}
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end page content -->

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);

        })
    })
    </script>

@endsection