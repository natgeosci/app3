@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{ route('products.index') }}">Back</a>
            <div class="card">
                <div class="card-header">Add New Contract</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contracts.store') }}">
                        @csrf

                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="name" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="provider_id" class="col-md-4 col-form-label text-md-right">Select Provider</label>

                            <div class="col-md-8">

                                <select id="provider_id" type="text" class="custom-select @error('provider_id') is-invalid @enderror" name="provider_id" autocomplete="provider_id">
                                    @foreach ($contracts as $contract)
                                        <option value="{{ $contract->id }}">{{ $contract->name }}</option>
                                    @endforeach
                                </select>

                                @error('provider_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
