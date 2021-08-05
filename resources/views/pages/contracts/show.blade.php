@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>{{ $contract->name }}</h3>
            <div class="col-md-8">
                <a href="{{ route('contracts.index') }}" class="btn btn-outline-secondary">Back</a>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Contract</th>
                            <th scope="col">Provider</th>
                            <th scope="col">Products</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $contract->id }}</th>
                            <td>{{ $contract->name }}</td>
                            <td>{{ $contract->provider->name }}</td>
                            <td>
                                @foreach ($contract->products as $prod)
                                    {{ $prod->name }} <br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('contracts.edit', $contract) }}">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection