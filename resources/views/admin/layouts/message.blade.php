@if(session()->has('success_msg'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ session()->get('success_msg') }}
    </div>
@endif

@if(session()->has('error_msg'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session()->get('error_msg') }}
    </div>
@endif