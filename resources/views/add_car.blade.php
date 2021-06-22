@extends('layout/app')
@section('section')
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-dropdown-link>
</form>


<!------ Include the above in your HEAD tag ---------->






<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>    
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <form name="my-form" action="/submit" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Brand</label>
                                    <div class="col-md-6">
                                        <input type="text" id="full_name" class="form-control" name="brand" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Description</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="description" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Mileage</label>
                                    <div class="col-md-6">
                                        <input type="text" id="user_name" class="form-control" name="mileage" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Seats</label>
                                    <div class="col-md-6">
                                        <input type="number" name="seats" id="phone_number" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Price</label>
                                    <div class="col-md-6">
                                        <input type="text" name="price" id="present_address" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Image</label>
                                    <div class="col-md-6">
                                        <input type="file" name="photos" id="present_address" class="form-control" required="">
                                    </div>
                                </div>
                                

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>





@endsection