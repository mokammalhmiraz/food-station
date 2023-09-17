@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        Welcome, {{ Auth::user()->name }}
                    </p>

                    <p>
                        Your email is, {{ Auth::user()->email }}
                    </p>

                    {{ __('You are logged in!') }}

                    @php
                        // print_r( {{ Auth::user()->name='Miraz' }} == true )
                    @endphp
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
