@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ route('welcome') }}">Back</a>
            <div class="col-md-4">
                @if (count($lastActivity))
                    <h2 class="text-center">Last Activity</h2>
                    @foreach ($lastActivity as $log)
                        <div class="card mb-3">
                            <div class="card-header">
                                {{ $log->updated_at->toDayDateTimeString() }}<br>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Details</h5>
                                @isset($log->properties['attributes'])
                                    <ul>
                                        <li>model: <strong>{{ $log->subject_type }}</strong> -> <strong>{{ $log->properties['attributes']['name'] }}</strong></li>
                                        <li>id_model: <strong>{{ $log->subject_id }}</strong></li>
                                        <li>action: <strong>{{ $log->description }}</strong></li>
                                    </ul>
                                @else
                                    <ul>
                                        <li>model: <strong>{{ $log->subject_type }}</strong> -> <strong>{{ $log->properties['attributes']['name'] }}</strong></li>
                                        <li>id_model: <strong>{{ $log->subject_id }}</li>
                                        <li>action: <strong>{{ $log->description }}</li>
                                    </ul>
                                @endisset
                            </div>
                        </div>
                    @endforeach
                @else 
                    <div class="text-center">
                        <h2>No activity yet!</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection