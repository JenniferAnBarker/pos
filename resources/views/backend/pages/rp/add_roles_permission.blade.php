@extends('admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style type="text/css">

    .form-check-label{
        text-transform: capitalize;
    }

</style>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Add Role In Permission</a></li>
                        
                        <li class="breadcrumb-item active">Add Role In Permission</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Role In Permission</h4>
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
                            <form id="myForm" method="post" action="{{ route('role.permission.store')}}" enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Role Info</h5>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="group_name" class="form-label">All Roles</label>
                                            <select name="role_id" id="group_name" class="form-control">
                                                <option selected disabled>Select Roles</option>
                                                @foreach ($roles as $item)
                                                    
                                                <option value="{{ $item->id}}">{{ $item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- end col -->
                                    
                                </div> <!-- end row -->


                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-check mb-3 form-check-primary">
                                            <label for="permit_all" class="form-check-label">Permit All</label>
                                            <input type="checkbox" name="name" class="form-check-input" id="permit_all">
                                        </div>
                                    </div> <!-- end col -->

                                    <hr>

                                </div> <!-- end row -->

                                @foreach ($permission_groups as $key => $item)
                                    
                                    <div class="row border">

                                        <div class="col-3">
                                            <div class="form-check mb-3 form-check-primary">
                                                <label for="group_checkbox{{$key}}" class="form-check-label">{{ $item->group_name}}</label>
                                                <input type="checkbox" name="name" class="form-check-input" id="group_checkbox{{$key}}">
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-9">
                                            @php
                                                $permissions = App\Models\User::getPermissionByGroupName($item->group_name);
                                                
                                            @endphp

                                            @foreach ($permissions as $item)
                                            <div class="form-check mb-3 form-check-primary">
                                                <label for="checkbox{{ $item->id}}" class="form-check-label">{{ $item->name}}</label>
                                                <input type="checkbox" name="permission[]" class="form-check-input" id="checkbox{{ $item->id}}" value="{{ $item->id}}">
                                            </div>
                                            @endforeach

                                        </div> <!-- end col -->

                                    </div> <!-- end row -->
                                @endforeach

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
    $('#permit_all').click(function(){
        if( $(this).is(':checked')){
            $('input[type = checkbox]').prop('checked',true);
        }else{
            $('input[type = checkbox]').prop('checked',false);
        }
    })
    
    $('#group_checkbox0').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox1').prop('checked',true);
        }else{
            $('#checkbox1').prop('checked',false);
        }
    })
    
    $('#group_checkbox1').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox2').prop('checked',true);
            $('#checkbox3').prop('checked',true);
            $('#checkbox4').prop('checked',true);
            $('#checkbox5').prop('checked',true);
            $('#checkbox6').prop('checked',true);
            $('#checkbox7').prop('checked',true);
        }else{
            $('#checkbox2').prop('checked',false);
            $('#checkbox3').prop('checked',false);
            $('#checkbox4').prop('checked',false);
            $('#checkbox5').prop('checked',false);
            $('#checkbox6').prop('checked',false);
            $('#checkbox7').prop('checked',false);
        }
    })
    
    $('#group_checkbox2').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox8').prop('checked',true);
            $('#checkbox9').prop('checked',true);
            $('#checkbox10').prop('checked',true);
            $('#checkbox11').prop('checked',true);
            $('#checkbox12').prop('checked',true);
            $('#checkbox13').prop('checked',true);
        }else{
            $('#checkbox8').prop('checked',false);
            $('#checkbox9').prop('checked',false);
            $('#checkbox10').prop('checked',false);
            $('#checkbox11').prop('checked',false);
            $('#checkbox12').prop('checked',false);
            $('#checkbox13').prop('checked',false);
        }
    })
    
    $('#group_checkbox3').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox14').prop('checked',true);
            $('#checkbox15').prop('checked',true);
            $('#checkbox16').prop('checked',true);
            $('#checkbox17').prop('checked',true);
            $('#checkbox18').prop('checked',true);
            $('#checkbox19').prop('checked',true);
        }else{
            $('#checkbox14').prop('checked',false);
            $('#checkbox15').prop('checked',false);
            $('#checkbox16').prop('checked',false);
            $('#checkbox17').prop('checked',false);
            $('#checkbox18').prop('checked',false);
            $('#checkbox19').prop('checked',false);
        }
    })
    
    $('#group_checkbox4').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox20').prop('checked',true);
            $('#checkbox21').prop('checked',true);
            $('#checkbox22').prop('checked',true);
            $('#checkbox23').prop('checked',true);
            $('#checkbox24').prop('checked',true);
        }else{
            $('#checkbox20').prop('checked',false);
            $('#checkbox21').prop('checked',false);
            $('#checkbox22').prop('checked',false);
            $('#checkbox23').prop('checked',false);
            $('#checkbox24').prop('checked',false);
        }
    })
    
    $('#group_checkbox5').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox25').prop('checked',true);
        }else{
            $('#checkbox25').prop('checked',false);
        }
    })
    
    $('#group_checkbox6').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox26').prop('checked',true);
        }else{
            $('#checkbox26').prop('checked',false);
        }
    })
    
    $('#group_checkbox7').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox27').prop('checked',true);
        }else{
            $('#checkbox27').prop('checked',false);
        }
    })
    
    $('#group_checkbox8').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox28').prop('checked',true);
        }else{
            $('#checkbox28').prop('checked',false);
        }
    })
    
    $('#group_checkbox9').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox29').prop('checked',true);
        }else{
            $('#checkbox29').prop('checked',false);
        }
    })
    
    $('#group_checkbox10').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox30').prop('checked',true);
        }else{
            $('#checkbox30').prop('checked',false);
        }
    })
    
    $('#group_checkbox11').click(function(){
        if( $(this).is(':checked')){
            $('#checkbox31').prop('checked',true);
        }else{
            $('#checkbox31').prop('checked',false);
        }
    })

</script>

@endsection