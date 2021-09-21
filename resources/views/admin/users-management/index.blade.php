@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @include('admin.users-management.alerts')

            <h3 class="text-center text-muted">Customers</h3>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#customerModal">
                Add Customer
            </button>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('dashboard.edit',$customer->id) }}">Edit</a> |
                                <a href="{{ route('dashboard.delete',$customer->id) }}" onclick="return confirm('Are you sure to delete {{ $customer->name }}')">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <strong class="text-center">No Data Found !!</strong>
                    @endforelse
                        {{ $customers->links() }}
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.users-management.create-modal')
@endsection
