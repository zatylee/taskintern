@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card -->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image -->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block -->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button -->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card -->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    {{-- Display success message if it exists in the session --}}
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('update.profile', ['id' => auth()->user()->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <!-- Display the user's name -->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Name</label>
                            <input class="form-control" id="inputUsername" type="text" name="name" placeholder="Enter your username" value="{{ auth()->user()->name }}">
                        </div>
                        <!-- Display the user's email address -->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Enter your email address" value="{{ auth()->user()->email }}" readonly>
                        </div>
                        <!-- Hidden input for user ID -->
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <!-- Save changes button -->
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
