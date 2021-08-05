@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>Contracts</h3>
            <div class="col-md-8">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Contract name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($contracts as $contract)
                        <tr>
                            <th scope="row">{{ $contract->id }}</th>
                            <td>
                                <a href="{{ route('contracts.show', $contract) }}">{{ $contract->name }}</a>
                            </td>
                            <td>
                                <a href="{{ route('contracts.edit', $contract) }}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('contracts.destroy', $contract) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row m-auto">
            <a href="{{ route('providers.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
@endsection