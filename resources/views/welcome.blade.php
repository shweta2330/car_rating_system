
@extends('layout/app')
@section('section')


<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
               @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>


@endif
                <img class="logo-alt" src="{{ asset('assets/images/download.jpg') }}" alt="Logo" title="Happy Clips" height="500"  width="500" />
                        </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>
@endsection