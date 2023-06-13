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
                            
                        </ol>
                    </div>
                    <h4 class="page-title">All Employee Attendance Details</h4>
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
                                    <th>Item</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach($details as $key=> $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td> <img src="{{ asset($item->employee->image) }}" style="width:50px; height:40px;"> </td>
                                    <td>{{ $item->employee->name}}</td>
                                    <td>{{ date('Y-m-d',strtotime($item->date))}}</td>
                                    <td>
                                        @if($item->attend_status == 'Present')
                                            <span class="badge  bg-success">Present</span>
                                            @elseif($item->attend_status == 'Leave')
                                                <span class="badge  bg-warning">Leave</span>
                                            @else
                                            <span class="badge  bg-danger">Absent</span>
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