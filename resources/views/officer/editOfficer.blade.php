@extends('officer.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Self Info</h2>
            <p class="text-danger">Leave password empty if you dont want to update</p>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            @include('messages')
            <div class="hk-row">
            
                <div class="col-lg-6">

                    <form action="{{ route('officer.updateOfficer') }}" method="POST">
                        @csrf
                        

                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}" disabled>
                        </div>
                        

                        <div class="form-group">
                            <label for="">Old Password</label>
                            <input type="password" name="old_password" class="form-control" value="">
                        </div>
                        

                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="password" class="form-control" value="">
                        </div>
                        

                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="c_password" class="form-control" value="">
                        </div>
                        

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>
                        

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                        

                        <div class="form-group">
                            <label for="">Confirm Phone</label>
                            <input type="text" name="c_phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                        

                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" id="" cols="30" rows="3" class="form-control">{{ $user->address }}</textarea>
                        </div>
                        

                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
