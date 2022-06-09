@extends('admin.layouts.app')
@section('title') {{ trans('Add Faculties') }} @endsection
@section('page_title') {{ trans('Add Faculties') }} @endsection
@section('styles')
@endsection
@section('content')
<section  style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        @include('admin.layouts.message')

        <div class="card shadow-2-strong" style="border-radius: 1rem;">
        {!! Form::open(array('route' => 'do_login','method'=>'POST')) !!}
        <input type="hidden" name="id" value="@if(isset($singleRecord) && !empty($singleRecord)){{$singleRecord->id}}@endif">

          @csrf
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">Permission</h3>
            <div class="form-outline mb-4">
                {!! Form::text('name', null, array('placeholder' => 'Enter Permission Name','class' => 'form-control form-control-lg')) !!}
                @if (isset($errors) && $errors->has('name'))
                    <span class="text-red">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-outline mb-4">
                {!! Form::text('module', null, array('placeholder' => 'Module','class' => 'form-control form-control-lg')) !!}
                @if (isset($errors) && $errors->has('module'))
                    <span class="text-red">{{ $errors->first('module') }}</span>
                @endif
            </div>
            <div class="form-outline mb-4">
                {!! Form::text('description', null, array('placeholder' => 'Enter Description','class' => 'form-control form-control-lg')) !!}
            </div>
            <!-- Checkbox -->
            
            <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
            
          </div>
        {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection