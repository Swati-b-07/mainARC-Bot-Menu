@extends('admin.layouts.app')
@section('title') {{ trans('Role List') }} @endsection
@section('page_title') {{ trans('Role List') }} @endsection
@section('styles')
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Roles List</h4>
           
            @include('admin.layouts.message')
            <a href="{{route('role.create')}}" class="btn btn-primary btn-icon-text" style="float:right;margin-bottom:10px"><i class="mdi mdi-plus-circle-outline btn-icon-prepend"></i>Add Role</a>
            
            <!-- <button type="button" class="btn btn-primary btn-icon-text" style="float:right;margin-bottom:10px">
                <i class="mdi mdi-plus-circle-outline btn-icon-prepend"></i> Add Role </button> -->
           
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Level</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach($roleData as $roleDataKey => $roleDataValue)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$roleDataValue->name}}</td>
                                <td>{{$roleDataValue->slug}}</td>
                                <td>{{$roleDataValue->level}}</td>
                                <td>
                                    <a href="{{route('roles_edit', [$roleDataValue->id])}}" class="fa fa-edit" title="Edit">Edit</a>&nbsp;
                                    <a href="{{route('roles_delete', [$roleDataValue->id])}}" class="fa fa-trash text-red" onclick="return confirm('Are you sure you want to delete this record?');" title="Delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection