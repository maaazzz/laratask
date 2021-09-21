@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show my-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ session('success') }}</strong>
</div>
@endif

@foreach ($errors->all() as $error)
    <li class="text-danger">{{ $error }}</li>
@endforeach
