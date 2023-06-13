@extends('admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">POS</a></li>
                                
                                <li class="breadcrumb-item active">Point Of Sale</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Point Of Sale</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-4 col-xl-6">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="tab-pane" id="settings">
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> POS</h5>

                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>QTY</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    @php
                                        $allcart = Cart::content();
                                    @endphp

                                    <tbody>
                                        @foreach ($allcart as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <form action="{{ url('/cart-update/'.$item->rowId)}}" method="post">
                                                    @csrf
                                                    <input type="number" name="qty" value="{{$item->qty}}" style="width:40px;" min="1">
                                                    <button type="submit" class="btn btn-sm btn-success" style="margin-top:-2px;"><i class="fas fa-check"></i></button>
                                                </form>
                                            </td>
                                            <td>£{{number_format((float)$item->price, 2, '.', '')}}</td>
                                            <td>£{{number_format((float)$item->subtotal, 2, '.', '')}}</td>
                                            <td><a href="{{ url('/cart-remove/'.$item->rowId)}}"><i class="fas fa-trash" style="color: white;"></i></a></td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>

                            <div class="bg-primary">
                                <p style="font-size: 18px; color: white;"> Quantity: {{ Cart::count()}}</p>
                                <p style="font-size: 18px; color: white;"> Subtotal: £{{ Cart::subtotal()}}</p>
                                <p style="font-size: 18px; color: white;"> Vat: £{{ Cart::tax()}}</p>
                                <h3 style="color:white;">Total: <span style="color:white">£{{ Cart::total()}}</span> </h3 style="color:white;">
                            </div>
                         
                          
                            <form action="{{ url('/create-invoice')}}" method="post" id="myForm">
                                @csrf
                            
                                <div class="form-group mb-3">
                                    <label for="supplier" class="form-label">All Customers</label>
                                    <a class="btn btn-primary rounded-pill waves-effect waves-light mb-2" href="{{ route('import.product')}}">Create New Customer</a>
                                    <select name="customer_id" class="form-control" id="supplier">
                                        <option selected disabled>Select a Customer</option>
                                        @foreach($customers as $item)
                                        <option value="{{ $item->id}}">{{ $item->name}}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-blue waves-effect waves-light">Generate Invoice</button>
                                </div>
                                
                            </form>
                        </div>      
                    </div> <!-- end card -->

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-body">

                                <div class="tab-pane" id="settings">
                                    
                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Product Info</h5>
                                       
                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                            @foreach($products as $key=> $item)
                                            <tr>
                                                <form action="{{  url('/add-cart')}}" method="post">
                                                    @csrf

                                                    <input type="hidden" name="id" value="{{ $item->id}}">
                                                    <input type="hidden" name="name" value="{{ $item->product_name}}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <input type="hidden" name="price" value="{{ $item->selling_price}}">

                                                    <td>{{ $key+1}}</td>
                                                    <td> <img src="{{ url($item->product_image) }}" style="width:50px; height:40px;"> </td>
                                                    <td>{{ $item->product_name}}</td>
                                                    <td> <button type="submit" style="font-size: 20px; background-color: rgba(250,250,250,0.5);"><i class="fas fa-plus-square"></i></button></td>
                                                </form>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                            
                                </div>
                                <!-- end settings content-->

                            {{-- </div> <!-- end tab-content --> --}}
                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    customer_id: {
                        required : true,
                    }, 
                },
                messages :{
                    customer_id: {
                        required : 'Please Select Customer',
                    },
    
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
        
    </script>

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