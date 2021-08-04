@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                    @foreach ($providers as $provider)
                        <tr>
                            <th scope="row">{{ $provider->id }}</th>
                            <td>{{ $provider->name }}</td>  
                            <td>
                                <a href="{{ route('providers.edit', $provider) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('providers.destroy', $provider) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('providers.create') }}" class="btn btn-primary btn-block">Add New Provider</a>
        </div>
    </div>
</div>
@endsection
