@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center">Edit {{ $customer->name }} record</h3>
            <form action="{{ route('dashboard.update',$customer->id) }}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-sm-1-12 col-form-label">Name</label>
                        <div class="col-sm-1-12">
                            <input type="text" class="form-control" name="name" id="name" required value="{{ $customer->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="col-sm-1-12">
                            <input type="email" class="form-control" name="email" id="email" required  value="{{ $customer->email }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Update</button>
            </form>
        </div>
    </div>
@endsection
