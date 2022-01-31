@extends('merchant.layouts.app')

@section('main_section')

<div class="container">
    <!-- Title -->
    <div class="hk-pg-header align-items-top">
        <div>
            <h2 class="hk-pg-title font-weight-600 mb-10">Officers List</h2>
        </div>
    </div>
    <!-- /Title -->
    <!-- Row -->
    @include('messages')
    <div class="row">

        <div class="col-xl-12">
            <div class="hk-row">
            
                <div class="col-lg-12">
                    
                    
					<div class="table-wrap mb-20">
                                    <div class="table-wrap">
                                        <table id="datable_3" class="table table-hover w-100 display">
                                            <thead>
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th>Username</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (App\Officer::where('merchant_id', Auth::user()->id)->orderBy('id', 'asc')->get() as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>                            
                                                    <td><a href="{{ route('merchant.officerShow', $user->id ) }}">{{$user->username}}</a></td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>{{ $user->status == 1? 'Active' : 'Inactive'}}</td>
                                                    <td>
                                                        <form action="{{ route('merchant.officerStatus', $user->id) }}" method="POST">
                                                            @csrf
                                                            
                                                            <input type="submit" value="{{ $user->status == 1? 'Inactive' : 'Activate'}}" class="btn btn-info btn-sm">
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>


@endsection
