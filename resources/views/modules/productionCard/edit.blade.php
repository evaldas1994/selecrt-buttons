@extends('layouts.app')

@section('content')
    <livewire:production-card.edit :productionCard="$productionCard" :stocks="$stocks" :productionCardComponents="$productionCardComponents"/>
@endsection
