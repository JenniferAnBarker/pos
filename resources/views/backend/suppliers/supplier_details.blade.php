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
                        <a href="{{ route('edit.supplier',$supplier->id)}}" class="btn btn-primary rounded-pill waves-effect waves-light">Edit Supplier</a>
                    </ol>
                </div>
                <h4 class="page-title">Supplier Details</h4>
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
                            

                                <input type="hidden" name="id" value="{{ $supplier->id}}">

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Supplier Info</h5>

                            
                                <div class="row">

                                    <div class="card tex-center">
                                    
                                        <div class="col-md-9">
                                            <div class="mb-3">
                                                <img src="{{ url($supplier->image)}}" 
                                                class="rounded-circle"
                                                style="width:200px; height:200px;"
                                                alt="profile-image"
                                                id="image">
                                            </div> 
                                        </div> <!-- end col -->

                                    </div>

                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Supplier Name</label>
                                            <p id="name" class="text-danger">{{ $supplier->name}}</p>
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <p id="email" class="text-danger">{{ $supplier->email}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                
                                    <div class="col-md-6">
                                    
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <p id="phone" class="text-danger">{{ $supplier->phone}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                
                                    <div class="col-md-6">
                                    
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <p id="address" class="text-danger">{{ $supplier->address}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="shopname" class="form-label">Shop name</label>
                                            <p id="shopname" class="text-danger">{{ $supplier->shopname}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <p id="city" class="text-danger">{{ $supplier->city}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bank_name" class="form-label">Bank Name</label>
                                            <p id="bank_name" class="text-danger">{{ $supplier->bank_name}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bank_branch" class="form-label">Bank Branch</label>
                                            <p id="bank_branch" class="text-danger">{{ $supplier->bank_branch}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="account_holder" class="form-label">Cardholder Name</label>
                                            <p id="account_holder" class="text-danger">{{ $supplier->account_holder}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="account_number" class="form-label">Account Number</label>
                                            <p id="account_number" class="text-danger">{{ $supplier->account_number}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Type</label>
                                            <p id="type" class="text-danger">{{ $supplier->type}}</p>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                        </div>
                        <!-- end settings content-->

                    {{-- </div> <!-- end tab-content --> --}}
                </div>
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end page content -->

</div>

@endsection