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
                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">

                                <div class="tab-pane" id="settings">
                                    <form method="post" action="{{ route('update.password')}}">
                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Change Password</h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="old" class="form-label">Old Password</label>
                                                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old" value="">
                                                    @error('old_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="new" class="form-label">New Password</label>
                                                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new" value="">
                                                    @error('new_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label for="confirm" class="form-label">Confirm Password</label>
                                                    <input type="password" name="new_password_confirmation" class="form-control" id="confirm" value="">new_password_confirmation
                                                    @error('confirm_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            

                                        
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


@endsection