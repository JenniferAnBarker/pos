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
                            <a href="{{ route('add.employee.attendance')}}" class="btn btn-primary rounded-pill waves-effect waves-light">Add Employee Attendance</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Employee Attendance</h4>
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
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- date('Y-m-d'),  --}}
                        
                            <tbody>
                                @foreach($allData as $key=> $data)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $data->date}}</td>
                                    <td>
                                        @if(Auth::user()->can('attendance.view'))
                                        <a href="{{ route('employee.attendance.view', $data->date)}}" class="btn btn-danger rounded-pill waves-effect waves-light">View</a>
                                        @endif
                                        @if(Auth::user()->can('attendance.edit'))
                                        <a href="{{ route('employee.attendance.edit', $data->date)}}" class="btn btn-blue rounded-pill waves-effect waves-light">Edit</a>
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