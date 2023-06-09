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
                            <a href="{{ route('add.customer')}}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Customer</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Customers</h4>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Shop Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        @php
                            $i = 0;
                        @endphp
                        
                            <tbody>
                                @foreach($customers as $key=> $cus)
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td> <img src="{{(!empty($cus->image)) ? url($cus->image) : url('upload/no_image.png') }}" style="width:50px; height:40px;"> </td>
                                    <td>{{ $cus->name}}</td>
                                    <td>{{ $cus->email}}</td>
                                    <td>{{ $cus->phone}}</td>
                                    <td>{{ $cus->shopname}}</td>
                                    <td>
                                        @if(Auth::user()->can('customer.edit'))
                                        <a href="{{ route('edit.customer',$cus->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                                        @endif
                                        @if(Auth::user()->can('customer.delete'))
                                        <a href="{{ route('delete.customer',$cus->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>
                                        @endif
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