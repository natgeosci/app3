@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-6 align-self-center">
                <div class="row text-center mb-5">
                    <div class="col">
                        <a href="{{ route('providers.index') }}" class="btn btn-outline-primary btn-lg btn-block border-top border-left">Providers</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-lg btn-block border-bottom border-left">Products</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('contracts.index') }}" class="btn btn-outline-primary btn-lg btn-block border-top border-left">Contract</a>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <a href="{{ route('activity') }}" class="btn btn-outline-primary btn-lg btn-block"><strong>Activity</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection