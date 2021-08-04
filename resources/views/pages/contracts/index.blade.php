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
                    @foreach ($contracts as $contract)
                        <tr>
                            <th scope="row">{{ $contract->id }}</th>
                            <td>{{ $contract->name }}</td>
                            <td>
                                <a href="{{ route('contracts.edit', $contract) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('contracts.destroy', $contract) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('contracts.create') }}" class="btn btn-primary btn-block">New Contract</a>
        </div>
    </div>
</div>
@endsection
