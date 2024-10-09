@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
<!-- Display Success Message -->
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($staff as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->phoneNo }}</td>
                            <td>
                                <a class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $employee->id }}">Edit</a>
                                <form action="{{ route('staff.destroy', $employee->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Staff</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Edit Form -->
                                        <form action="{{ route('staff.update', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <!-- Name -->
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
                                            </div>
                                            
                                            <!-- Email -->
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                                            </div>

                                            <!-- Department -->
                                            <div class="form-group">
                                                <label for="department">Department:</label>
                                                <select name="department" class="form-control">
                                                    <option value="Application" {{ $employee->department == 'Application' ? 'selected' : '' }}>Application</option>
                                                    <option value="Database" {{ $employee->department == 'Database' ? 'selected' : '' }}>Database</option>
                                                    <option value="Infra" {{ $employee->department == 'Infra' ? 'selected' : '' }}>Infra</option>
                                                </select>
                                            </div>

                                            <!-- Phone Number -->
                                            <div class="form-group">
                                                <label for="phoneNo">Phone Number:</label>
                                                <input type="text" name="phoneNo" class="form-control" value="{{ $employee->phoneNo }}">
                                            </div>

                                            <!-- Save Changes Button -->
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                        <!-- End Edit Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Edit Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>

        {!! $staff->links() !!}
    </div>
    <!-- Content Row -->
</div>
@endsection
