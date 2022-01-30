@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a class="btn btn-outline-secondary" href="{{ route('contracts.index') }}">Back</a>
            <div class="card mt-4">
                <div class="card-header">Edit {{ $contract->name }} Contract</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contracts.update', $contract) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $contract->name }}" placeholder="name" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for='products'>Products</label>
                            <select id="products" class="custom-select select2-multi @error('products') is-invalid @enderror" autocomplete="products" autofocus name="products[]" multiple>
                                @foreach ($products as $prod)
                                    <option value="{{$prod->id}}" {{ in_array($prod->id,$selected_products)?'selected':''}}> {{$prod->name}}</option>
                                @endforeach
                            </select>
                            @error('products')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for='provider_id'>Provider</label>
                            <select id="provider_id" class="custom-select @error('provider_id') is-invalid @enderror" autocomplete="provider_id" autofocus name="provider_id">
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}" {{ old('provider_id', $contract->provider_id) == $provider->id?'selected':''}}>{{ $provider->name }}</option>
                                @endforeach
                            </select>
                            @error('provider_id')
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
