@extends('admin_dashboard')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            
                        </ol>
                    </div>
                    <h4 class="page-title">Pending Due</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Order Date</th>
                                    <th>Payment Type</th>
                                    <th>Invoice</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($alldue as $key=> $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td> <img src="{{(!empty($item->customer->image)) ? url($item->customer->image) : url('upload/no_image.png') }}" style="width:50px; height:40px;"> </td>
                                    <td>{{ $item->customer->name}}</td>
                                    <td>{{ $item->order_date}}</td>
                                    <td>{{ $item->payment_status}}</td>
                                    <td>{{ $item->invoice_no}}</td>
                                    <td><span class="btn btn-info waves-effect waves-light">£{{ number_format((float)$item->total, 2, '.', '')}}</span></td>
                                    <td><span class="btn btn-warning waves-effect waves-light">£{{ number_format((float)$item->pay, 2, '.', '')}}</span></td>
                                    <td><span class="btn btn-danger waves-effect waves-light">£{{ number_format((float)$item->due, 2, '.', '')}}</span></td>
                                    <td>
                                        {{-- <a href="{{ route('order.details',$item->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light">Details</a> --}}
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup-modal" id="{{ $item->id}}" onclick="orderDue(this.id)">Pay Amount Due</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
        
    </div> <!-- container -->

</div> <!-- content -->

<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="auth-logo">
                        <h3>Pay Due Amount</h3>
                    </div>
                </div>
                <div class="text-center mt-2 mb-4">
                    <div class="auth-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-lg">
                                <img src={{ asset('backend/assets/images/logo-dark.png')}} alt="" height="24">
                            </span>
                        </a>
    
                        <a href="index.html" class="logo logo-light">
                            <span class="logo-lg">
                                <img src={{ asset('backend/assets/images/logo-light.png')}} alt="" height="24">
                            </span>
                        </a>
                    </div>
                </div>

                <form class="px-3" method="post" action="{{ route('update.due')}}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="due" class="form-label">Pay Now</label>
                        <input class="form-control" type="text" id="due" required="" name="due">
                    </div>
                    
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Complete Payment</button>
                    </div>

                    <input type="hidden" name="id" id="order_id">
                    <input type="hidden" name="pay" id="pay">

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

    function orderDue(id){
        $.ajax({
            type: 'GET',
            url: '/order/due/'+id,
            dataType: 'json',
            success:function(data){
                console.log(data)
                $('#due').val(data.due);
                $('#pay').val(data.pay);
                $('#order_id').val(data.id);
            }
        })
    }

</script>

@endsection