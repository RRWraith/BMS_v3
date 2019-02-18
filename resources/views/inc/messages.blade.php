@if(count($errors) > 0)
@foreach ($errors->all() as $error)
    <div id="ERROR_COPY"class="alert alert-danger">
        {{$error}}
    </div>
@endforeach
<link rel="stylesheet" href="../node_modules/sweetaler2/dist/sweetalert2.min.css">
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
		
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
