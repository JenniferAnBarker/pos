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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Profile</a></li>
                                
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Profile</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{ (!empty($adminData->photo) ? url('upload/admin_image/'.$admin->photo) : url('upload/no_image.png')) }}" class="rounded-circle avatar-lg img-thumbnail"
                            alt="profile-image">

                            <h4 class="mb-0">{{ $adminData->name}}</h4>
                            <p class="text-muted">{{ $adminData->email}}</p>

                            <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                            <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                            <div class="text-start mt-3">
                               
                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{ $adminData->name}}</span></p>
                            
                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{ $adminData->phone}}</span></p>
                            
                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{ $adminData->email}}</span></p>
                            
                                <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                            </div>                                    

                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                </li>
                            </ul>   
                        </div>                                 
                    </div> <!-- end card -->

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">

                                <div class="tab-pane" id="settings">
                                    <form>
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="firstname" value="{{ $adminData->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="lastname" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" id="lastname" value="{{ $adminData->email}}">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        {{-- <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="userbio" class="form-label">Bio</label>
                                                    <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row --> --}}

                                        <div class="row">
                                           
                                            <div class="col-md-6">
                                            
                                                <div class="mb-3">
                                                    <label for="userpassword" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" id="userpassword" value="{{ $adminData->phone}}">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            
                                            <div class="col-md-9">
                                                <div class="mb-3">
                                                    <label for="photo_upload" class="form-label">Profile Image</label>
                                                    <input type="file" id="photo_upload" class="form-control">
                                                </div> 
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            
                                            <div class="col-md-9">
                                                <div class="mb-3">
                                                    <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo) : url('upload/no_image.png')}}" 
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
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

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