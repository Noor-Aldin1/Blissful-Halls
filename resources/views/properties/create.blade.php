@extends('properties.navigation')

@section('content')
    <h1>Add New Property</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('properties.store') }}" method="POST">
        @csrf
        @include('properties.form')
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

