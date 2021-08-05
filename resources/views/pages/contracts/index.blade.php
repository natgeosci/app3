@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3>Contracts</h3>
        <div class="col-md-8">
        <a href="{{ route('welcome') }}">Back</a>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Provider</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contracts as $contract)
                        <tr>
                            <th scope="row">{{ $contract->id }}</th>
                            <td>
                                <a href="{{ route('contracts.show', $contract->id) }}">{{ $contract->name }}</a>    
                            </td>
                            @isset ($contract->provider->name)
                                <td>
                                    <a href="{{ route('providers.show', $contract->provider->id) }}">{{ $contract->provider->name }}</a>    
                                </td>
                            @else
                                <td>Provider deleted</td>
                            @endisset
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
            <a href="{{ route('trashed_contracts') }}" class="btn btn-outline-secondary btn-block">Trash</a>
        </div>
    </div>
</div>
@endsection
