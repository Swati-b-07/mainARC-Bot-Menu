@extends('admin.layouts.app')
@section('title') {{ trans('Permission List') }} @endsection
@section('page_title') {{ trans('Permission List') }} @endsection
@section('styles')
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Permission List</h4>
           
            @include('admin.layouts.message')
            <a href="{{route('permission.create')}}" class="btn btn-primary btn-icon-text" style="float:right;margin-bottom:10px"><i class="mdi mdi-plus-circle-outline btn-icon-prepend"></i>Add Permission</a>
            
            <!-- <button type="button" class="btn btn-primary btn-icon-text" style="float:right;margin-bottom:10px">
                <i class="mdi mdi-plus-circle-outline btn-icon-prepend"></i> Add Role </button> -->
           
            <div class="table-responsive">
                <table id="list-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Module</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach($permissionData as $permissionDataKey => $permissionDataValue)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$permissionDataValue->name}}</td>
                                <td>{{$permissionDataValue->slug}}</td>
                                <td>{{$permissionDataValue->model}}</td>
                                <td>
                                    <a href="{{route('permission.edit', [$permissionDataValue->id])}}" class="fa fa-edit" title="Edit">Edit</a>&nbsp;
                                    <a href="{{route('permission.delete', [$permissionDataValue->id])}}" class="fa fa-trash text-red" onclick="return confirm('Are you sure you want to delete this record?');" title="Delete">Delete</a>
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