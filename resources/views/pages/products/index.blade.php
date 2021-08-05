@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3>Products</h3>
        <div class="col-md-8">
        <a href="{{ route('welcome') }}">Back</a>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', $product) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('products.create') }}" class="btn btn-primary btn-block">New Product</a>
        </div>
    </div>
</div>
@endsection
