
@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Temporary Deleted Products</h3>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table mt-4">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Products</th>
                            <th scope="col">Deleted On</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->deleted_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('restore_products', $product) }}" class="btn btn-success">Restore</a>
                                </td>
                                <td>
                                    <a href="{{ route('permanently_delete_products', $product) }}" class="btn btn-danger">Permanently Delete Products</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
