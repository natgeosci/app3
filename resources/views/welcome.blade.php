@extends('layouts.app')

@section('content')
    <ul>
        <li>
            <a href="{{ route('providers.index') }}">Providers</a>
        </li>
        <li>
            <a href="{{ route('products.index') }}">Products</a>
        </li>
        <li>
            <a href="{{ route('contracts.index') }}">Contract</a>
        </li>
        <li>
            <a href="{{ route('activity') }}"><strong>Activity</strong></a>
        </li>
    </ul>
@endsection