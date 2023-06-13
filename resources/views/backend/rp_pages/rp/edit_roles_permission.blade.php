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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Role In Permission</a></li>
                        
                        <li class="breadcrumb-item active">Edit Role In Permission</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Role In Permission</h4>
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
                            <form id="myForm" method="post" action="{{ route('role.permission.update',$role->id)}}" enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Role Info</h5>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="group_name" class="form-label mt-2">Edit Role:</label>
                                           <h4 class="mb-5 p-1">{{ $role->name}}</h4>
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

                                @php
                                $permissions = App\Models\User::getPermissionByGroupName($item->group_name);
                                @endphp
                                    
                                    <div class="row border">

                                        <div class="col-3">
                                            <div class="form-check mb-3 form-check-primary">
                                                <label for="group_checkbox{{$key}}" class="form-check-label">{{ $item->group_name}}</label>
                                                <input type="checkbox" name="name" class="form-check-input" id="group_checkbox{{$key}}" value="" {{ App\Models\User::roleHasPermissions($role,$permissions) ? 'checked' : '' }}>
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-9">

                                            @foreach ($permissions as $perm)
                                            <div class="form-check mb-3 form-check-primary">
                                                <label for="cb" class="form-check-label">{{ $perm->name}}</label>
                                                <input type="checkbox" name="permission[]" {{ $role->hasPermissionTo($perm->name) ? 'checked' : '' }} class="form-check-input checkbox{{ $key}}" id="cb" value="{{ $perm->id}}">
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

    const id = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    
    $('#permit_all').click(function(){
            if( $(this).is(':checked')){
                $('input[type = checkbox]').prop('checked',true);
            }else{
                $('input[type = checkbox]').prop('checked',false);
            }
        })
    
    $.each(id, function(index, val){
        $('#group_checkbox' + val).click(function(){
            if( $(this).is(':checked')){
                $('.checkbox' + val).prop('checked',true);
            }else{
                $('.checkbox' + val).prop('checked',false);
            }
        });
    })
    
    </script>

@endsection