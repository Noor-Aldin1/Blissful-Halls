@extends('properties.navigation')

@section('content')
    <h1>Edit Property</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('properties.form', ['property' => $property])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

