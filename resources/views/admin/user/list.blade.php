@extends('admin.layouts.app')
@section('title') {{ trans('User List') }} @endsection
@section('page_title') {{ trans('User List') }} @endsection
@section('styles')
@endsection
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User List</h4>
           
            @include('admin.layouts.message')
            <a href="{{route('users.create')}}" class="btn btn-primary btn-icon-text" style="float:right;margin-bottom:10px"><i class="mdi mdi-plus-circle-outline btn-icon-prepend"></i>Add User</a>
            
            <!-- <button type="button" class="btn btn-primary btn-icon-text" style="float:right;margin-bottom:10px">
                <i class="mdi mdi-plus-circle-outline btn-icon-prepend"></i> Add Role </button> -->
           
            <div class="table-responsive">
            <table id="list-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @foreach($userData as $userDataKey => $userDataValue)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$userDataValue->name}}</td>
                                <td>{{$userDataValue->email}}</td>
                                <td>{{$userDataValue->role}}</td>
                                <td>
                                    <a href="{{route('users.edit', [$userDataValue->id])}}" class="fa fa-edit" title="Edit">Edit</a>&nbsp;
                                    <a href="{{route('users.delete', [$userDataValue->id])}}" class="fa fa-trash text-red" onclick="return confirm('Are you sure you want to delete this record?');" title="Delete">Delete</a>
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