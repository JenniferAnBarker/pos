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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Product</a></li>
                        
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Product</h4>
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
                            <form id="myForm" method="post" action="{{ route('product.update')}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $product->id}}">

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Edit Product </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" name="product_name" class="form-control" value="{{ $product->product_name}}">
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <select name="category_id" class="form-control" id="category">
                                                <option selected disabled>Select a Category</option>
                                                @foreach($categories as $cat)
                                                <option value="{{ $cat->id}}" {{ $cat->id == $product->category_id ? "selected" : ""}}>{{ $cat->category_name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="supplier" class="form-label">Supplier</label>
                                            <select name="supplier_id" class="form-control" id="supplier">
                                                <option selected disabled>Select a Supplier</option>
                                                @foreach($suppliers as $sup)
                                                <option value="{{ $sup->id}}" {{ $sup->id == $product->supplier_id ? "selected" : ""}}>{{ $sup->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- end col -->
                                
                                    <div class="col-md-6">
                                    
                                        <div class="form-group mb-3">
                                            <label for="product_code" class="form-label">Product Code</label>
                                            <input type="text" name="product_code" class="form-control" id="product_code" value="{{ $product->product_code}}">
                                           
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="product_garage" class="form-label">Product Garage</label>
                                            <input type="text" name="product_garage" id="product_garage" class="form-control" value="{{ $product->product_garage}}">
                                            
                                        </div>
                                    </div> <!-- end col -->
                                
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="product_store" class="form-label">Product Store</label>
                                            <input type="text" name="product_store" id="product_store" class="form-control" value="{{ $product->product_store}}">
                                            
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="buying_date" class="form-label">Purchase Date</label>
                                            <input type="date" name="buying_date" id="buying_date" class="form-control" value="{{ $product->buying_date}}">
                                            
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="form-groupmb-3">
                                            <label for="buying_price" class="form-label">Purchase Price</label>
                                            <input type="text" name="buying_price" id="buying_price" class="form-control" value="{{ $product->buying_price}}">
                                            
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-groupmb-3">
                                            <label for="expire_date" class="form-label">Expiration Date</label>
                                            <input type="date" name="expire_date" id="expire_date" class="form-control" value="{{ $product->expire_date}}">
                                            
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="selling_price" class="form-label">Sell Price</label>
                                            <input type="text" name="selling_price" id="selling_price" class="form-control" value="{{ $product->selling_price}}">
                                            
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                

                                <div class="row">
                                    
                                    <div class="col-md-9">
                                        <div class="form-group mb-3">
                                            <label for="image" class="form-label">Product Image</label>
                                            <input type="file" name="product_image" id="image" class="form-control">
                                        </div> 
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    
                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <img src="{{ url($product->product_image)}}" 
                                            class="rounded-circle avatar-lg img-thumbnail" 
                                            alt="profile-image"
                                            id="showImage">
                                        </div> 
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                
                                
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->

                    {{-- </div> <!-- end tab-content --> --}}
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->

    </div> <!-- end page content -->

</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                product_name: {
                    required : true,
                },  
                category_id: {
                    required : true,
                },  
                supplier_id: {
                    required : true,
                },  
                product_code: {
                    required : true,
                },  
                product_garage: {
                    required : true,
                },  
                product_store: {
                    required : true,
                },  
                buying_date: {
                    required : true,
                },  
                buying_price: {
                    required : true,
                },  
                expire_date: {
                    required : true,
                },  
                selling_price: {
                    required : true,
                },  
                // product_image: {
                //     required : true,
                // },  
            },
            messages :{
                product_name: {
                    required : 'Please Enter Product Name',
                }, 
                category_id: {
                    required : 'Please Select Category',
                }, 
                supplier_id: {
                    required : 'Please Select Supplier',
                }, 
                product_code: {
                    required : 'Please Enter Product Code',
                }, 
                product_garage: {
                    required : 'Please Enter Product Garage',
                }, 
                product_store: {
                    required : 'Please Enter Product Store',
                }, 
                buying_date: {
                    required : 'Please Enter Purchase Date',
                }, 
                buying_price: {
                    required : 'Please Enter Purchase Price',
                }, 
                expire_date: {
                    required : 'Please Enter Expiration Date',
                }, 
                selling_price: {
                    required : 'Please Enter Selling Price',
                }, 
                // prroduct_image: {
                //     required : 'Please Enter Product Image',
                // }, 

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