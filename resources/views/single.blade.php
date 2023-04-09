@extends('layouts.app')
@section('title')
   {{ $title }} 
@endsection

@section('content')
    <a href="{{ route('accueil') }}">Retour</a>
    <h1>{{ $title }}</h1>
    
@endsection