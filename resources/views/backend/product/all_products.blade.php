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
                            @if(Auth::user()->can('product.add'))
                            <a class="btn btn-info rounded-pill waves-effect waves-light" href="{{ route('import.product')}}">Import</a>
                            @endif
                            &nbsp;&nbsp;&nbsp;
                            @if(Auth::user()->can('product.all'))
                            <a class="btn btn-warning rounded-pill waves-effect waves-light" href="{{ route('export')}}">Export</a>
                            @endif
                            &nbsp;&nbsp;&nbsp;
                            @if(Auth::user()->can('product.add'))
                            <a href="{{ route('add.product')}}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Product</a>
                            @endif
                        </ol>
                    </div>
                    <h4 class="page-title">All Products</h4>
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
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Product Code</th>
                                    <th>Selling Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($products as $key=> $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td> <img src="{{ url($item->product_image) }}" style="width:50px; height:40px;"> </td>
                                    <td>{{ $item->product_name}}</td>
                                    <td>{{ $item->category->category_name}}</td>
                                    <td>{{ $item->supplier->name}}</td>
                                    <td>{{ $item->product_code}}</td>
                                    <td>{{ $item->selling_price}}</td>
                                    <td>
                                        @if($item->expire_date >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge rounded-pill bg-success">Valid</span>
                                            @else
                                            <span class="badge rounded-pill bg-danger">Invalid</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->can('product.edit'))
                                        <a href="{{ route('edit.product',$item->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        @endif
                                        @if(Auth::user()->can('product.all'))
                                        <a href="{{ route('code.product',$item->id)}}" class="btn btn-info rounded-pill waves-effect waves-light"><i class="fa fa-barcode" aria-hidden="true"></i></a>
                                        @endif
                                        @if(Auth::user()->can('product.delete'))
                                        <a href="{{ route('delete.product',$item->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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