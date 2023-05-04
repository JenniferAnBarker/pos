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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Employee</a></li>
                        
                        <li class="breadcrumb-item active">Edit Employee</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Employee</h4>
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
                            <form method="post" action="{{ route('employee.update')}}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{$employee->id}}">

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Employee Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Employee Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"" id="name" value="{{ $employee->name}}">
                                            @error('name')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"" id="email" value="{{ $employee->email}}">
                                            @error('email')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                
                                    <div class="col-md-6">
                                    
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"" id="phone" value="{{ $employee->phone}}">
                                            @error('phone')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                
                                    <div class="col-md-6">
                                    
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"" id="address" value="{{ $employee->address}}">
                                            @error('address')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="experience" class="form-label">Experience</label>
                                            <select name="experience" id="example-select" class="form-select @error('experience') is-invalid @enderror">
                                                {{-- <option selected disabled >Select an option</option> --}}
                                                <option value="1 year" {{ $employee->experience == '1 year' ? 'selected' : ''}}>1 Year</option>
                                                <option value="2 year" {{ $employee->experience == '2 year' ? 'selected' : ''}}>2 Years</option>
                                                <option value="3 year" {{ $employee->experience == '3 year' ? 'selected' : ''}}>3 Years</option>
                                                <option value="4 year" {{ $employee->experience == '4 year' ? 'selected' : ''}}>4 Years</option>
                                                <option value="5 year" {{ $employee->experience == '5 year' ? 'selected' : ''}}>5+ Years</option>
                                            </select>
                                            @error('experience')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="salary" class="form-label">Salary</label>
                                            <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary" value="{{ $employee->salary}}">
                                            @error('salary')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="vacation" class="form-label">Vacation Days Used</label>
                                            <input type="text" name="vacation" class="form-control @error('vacation') is-invalid @enderror"" id="vacation" value="{{ $employee->vacation}}">
                                            @error('vacation')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"" id="city" value="{{ $employee->city}}">
                                            @error('city')
                                            <span class="text-danger"> {{ $message}} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                

                                <div class="row">
                                    
                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Profile Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div> 
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    
                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <img src="{{ url($employee->image)}}" 
                                            class="rounded-circle avatar-lg img-thumbnail" 
                                            alt="profile-image"
                                            id="showImage">
                                        </div> 
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                
                                
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->

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