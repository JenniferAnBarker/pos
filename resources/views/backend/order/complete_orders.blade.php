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
                    <h4 class="page-title">Complete Orders</h4>
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
                                    <th>Amount Paid</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($orders as $key=> $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td> <img src="{{(!empty($item->customer->image)) ? url($item->customer->image) : url('upload/no_image.png') }}" style="width:50px; height:40px;"> </td>
                                    <td>{{ $item->customer->name}}</td>
                                    <td>{{ $item->order_date}}</td>
                                    <td>{{ $item->payment_status}}</td>
                                    <td>{{ $item->invoice_no}}</td>
                                    <td>£{{ number_format((float)$item->pay, 2, '.', '')}}</td>
                                    <td><span class="badge bg-success">{{ $item->order_status}}</span></td>
                                    <td>
                                        <a href="{{ url('/order/invoice-download/'.$item->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light">PDF Invoice</a>
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

@endsection