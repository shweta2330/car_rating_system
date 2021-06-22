
@extends('layout/app')
@section('section')
                        <!-- Authentication -->
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-dropdown-link>
</form>
                    

<section class="sections random-product">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                @foreach($car_list as $car )
                <div class="col-md-4">
                    <div class="card">
                        <a href="{{url('car-detail/'.$car['id'])}}"><img class="card-img-top" src="{{asset('uploads/'.$car['photos'])}}" alt="Card image cap"></a>
                        <div class="card-body">
                            <h5 class="card-title">
                              <span>Brand:</span> {{ $car['brand'] }}
                            </h5>
                        </div>
                        <div class="card-footer">
                            <div class=""><span>Description:</span>{{ $car['description'] }}</div>
                            <div class="float-left">
                                <a href="#" class="text-danger"><span>Mileage:</span>{{ $car['mileage'] }}</a>
                                <br>
                                <small class="text-muted"><span>Seats:</span>{{ $car['seats'] }}</small>
                                <small class="text-muted"><span>Price:</span>{{ $car['price'] }}</small>
                                <small class="text-muted"><span>Mileage Rating:</span>{{ $car['avg_mileage'] }}</small>
                                <small class="text-muted"><span>Maintnance rating :</span>{{ $car['avg_maintenance_cost'] }}</small>
                                <small class="text-muted"><span>Comfort:</span>{{ $car['avg_comfort'] }}</small>
                            </div>
                        </div>

                    </div>
                </div><!--.col-->
                @endforeach
                <!--.col-->
                <!--.col-->
            </div><!--.row-->
        </div><!--.container-->
    </div><!--.container-fluid-->
</section>
@endsection