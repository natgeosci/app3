@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>{{ $product->name }}</h3>
            <div class="col-md-8">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Contracts</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>
                                @foreach ($product->contracts as $contract)
                                    <a href="{{ route('contracts.show', $contract->id) }}">{{ $contract->name }}</a> <br>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection