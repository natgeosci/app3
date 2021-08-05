@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{ route('providers.index') }}">Back</a>
            <div class="card">
                <div class="card-header">Add New Contract</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contracts.store') }}">
                        @csrf

                        <div class="form-group">
                            <input id="provider_id" name="provider_id" type="hidden" value="{{ array_values(request()->route()->parameters)[0] }}">
                        </div>

                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="name" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row ml-auto mr-auto">
                            <label for='products'>Products</label>
                            <select id="products" class="custom-select select2-multi @error('products') is-invalid @enderror" autocomplete="products" autofocus name="products[]" multiple>
                                @foreach ($products as $prod)
                                    <option class="showCat" value="{{ $prod->id }}">{{ $prod->name }}</option>
                                @endforeach
                            </select>
                            @error('products')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
