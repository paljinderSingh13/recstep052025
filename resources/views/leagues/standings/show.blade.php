@extends('leagues.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">League Details</div>

                <div class="card-body">
                    <div class="mb-3">
                        <h4>{{ $league->name }}</h4>
                    </div>

                    <div class="mb-3">
                        <strong>Sports:</strong> {{ $league->sports }}
                    </div>

                    <div class="mb-3">
                        <strong>Type:</strong> {{ $league->type }}
                    </div>

                    <div class="mb-3">
                        <strong>Location:</strong> {{ $league->location }}
                    </div>

                    <div class="mb-3">
                        <strong>Time:</strong> {{ $league->time->format('H:i') }}
                    </div>

                    @if($league->url)
                    <div class="mb-3">
                        <strong>Website:</strong> <a href="{{ $league->url }}" target="_blank">{{ $league->url }}</a>
                    </div>
                    @endif

                    <div class="mb-3">
                        <strong>Created By:</strong> {{ $league->user->name }}
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('leagues.index') }}" class="btn btn-secondary">Back to List</a>
                        
                        @can('update', $league)
                        <div>
                            <a href="{{ route('leagues.edit', $league->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('leagues.destroy', $league->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection