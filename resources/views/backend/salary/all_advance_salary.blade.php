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
                            <a href="{{ route('add.advance.salary')}}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Salary Advance</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Advances</h4>
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
                                    <th>Employee</th>
                                    <th>Month</th>
                                    <th>Salary</th>
                                    <th>Advance Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($advances as $key=> $adv)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td> <img src="{{ asset($adv->employee->image)}}" style="width:50px; height:40px;"> </td>
                                    <td>{{ $adv['employee']['name']}}</td> <!-- One way to write the relationship reference --->
                                    <td>{{ $adv->month}}</td>
                                    <td>£ {{ $adv->employee->salary}}</td>  <!-- Another way to write the relationship reference --->
                                    <td>£ {{ $adv->advance_salary}}</td>
                                    <td>
                                        <a href="{{ route('edit.advance.salary',$adv->id)}}" class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
                                        <a href="{{ route('delete.advance.salary',$adv->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>
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