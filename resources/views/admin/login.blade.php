<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Schema Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.png')}}" >
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              @include('admin.layouts.message')
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                {!! Form::open(array('route' => 'do_login','method'=>'POST')) !!}
                  <div class="form-group">
                    <label>Username or email *</label>
                    {!! Form::text('email', null, array('placeholder' => 'Enter Email','class' => 'form-control p_input')) !!}
                    @if (isset($errors) && $errors->has('email'))
                        <span class="text-red">{{ $errors->first('email') }}</span>
                    @endif
                    <!-- <input type="text" class="form-control p_input"> -->
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    {!! Form::text('password', null, array('placeholder' => 'Enter Password','class' => 'form-control p_input')) !!}
                    @if (isset($errors) && $errors->has('password'))
                        <span class="text-red">{{ $errors->first('password') }}</span>
                    @endif
                    <!-- <input type="text" class="form-control p_input"> -->
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="{{route('register')}}"> Sign Up</a></p>
               {!! Form::close() !!}
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  
    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('public/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('public/assets/js/misc.js') }}"></script>
    <script src="{{ asset('public/assets/js/settings.js') }}"></script>
    <!-- endinject -->
  </body>
</html>