
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



@if (Session::has('my_success'))
    <div class="alert alert-success pb-3 alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ Session::get('my_success') }}</p>
    </div>
@endif



@if (Session::has('my_error'))
    <div class="alert alert-danger pb-3 alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ Session::get('my_error') }}</p>
    </div>
@endif