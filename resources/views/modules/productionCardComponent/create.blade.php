@extends('layouts.app')

@section('content')
    <livewire:production-card-component.create :productionCard="$productionCard" :stocks="$stocks" :types="$types"/>
@endsection
