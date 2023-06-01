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
                        <a class="btn btn-primary rounded-pill waves-effect waves-light" href="{{ route('export')}}">Download Xlsx</a>
                        
                        
                    </ol>
                </div>
                <h4 class="page-title">Add Product</h4>
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
                            <form id="myForm" method="post" action="{{ route('import')}}" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Import Product </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name" class="form-label">Xlsx File Import</label>
                                            <input type="file" name="import_file" class="form-control">
                                           
                                        </div>
                                    </div>
                                    
                                </div> <!-- end row -->

                                
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Upload</button>
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
                // product_code: {
                //     required : true,
                // },  
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
                product_image: {
                    required : true,
                },  
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
                // product_code: {
                //     required : 'Please Enter Product Code',
                // }, 
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
                prroduct_image: {
                    required : 'Please Enter Product Image',
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