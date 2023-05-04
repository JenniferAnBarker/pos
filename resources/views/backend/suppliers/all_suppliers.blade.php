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
                            <a href="{{ route('add.supplier')}}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Supplier</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Supplierss</h4>
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
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($suppliers as $key=> $sup)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td> <img src="{{(!empty($sup->image)) ? url($sup->image) : url('upload/no_image.png') }}" style="width:50px; height:40px;"> </td>
                                    <td>{{ $sup->name}}</td>
                                    <td>{{ $sup->email}}</td>
                                    <td>{{ $sup->phone}}</td>
                                    <td>{{ $sup->type}}</td>
                                    <td>
                                        <a href="{{ route('edit.supplier',$sup->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-edit p-1"></i> Edit</a>
                                        <a href="{{ route('delete.supplier',$sup->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash p-1"></i> Delete</a>
                                        <a href="{{ route('supplier.details',$sup->id)}}" class="btn btn-info rounded-pill waves-effect waves-light"><i class="fa fa-circle-info p-1"></i> Details</a>
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