@extends('layouts.app')
@section('title')
   {{ $title }} 
@endsection

@section('content')
    <h1>Liste des pays</h1>
    @foreach ($table as $key => $pays)
        <p><a href="{{ route("single", ($key+1)) }}">{{ $pays}}</a></p>
    @endforeach 
@endsection
    
