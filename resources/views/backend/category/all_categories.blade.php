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
                            <!-- Sign Up modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup-modal">Create new category</button>
                        </ol>
                    </div>
                    <h4 class="page-title">All Categories</h4>
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
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($categories as $key=> $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $item->category_name}}</td>
                                    <td>
                                        <a href="{{ route('edit.category',$item->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                                        <a href="{{ route('delete.category',$item->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>
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

<!-- Signup modal content -->
<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="auth-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="24">
                            </span>
                        </a>
    
                        <a href="index.html" class="logo logo-light">
                            <span class="logo-lg">
                                <img src={{ asset('backend/assets/images/logo-light.png')}} alt="" height="24">
                            </span>
                        </a>
                    </div>
                </div>

                <form class="px-3" method="post" action="{{ route('store.category')}}">
                    @csrf
                    <h4 class="pb-3">Create new category</h4>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category Name</label>
                        <input class="form-control" type="text" id="category" required="" placeholder="Add Category" name="category_name">
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Add Category</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection