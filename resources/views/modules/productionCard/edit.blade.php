@extends('layouts.app')

@section('content')
    <livewire:production-card.edit :productionCard="$productionCard" :stocks="$stocks" :productionCardComponents="$productionCardComponents" :types="$types"/>
{{--    <livewire:production-card-component.create :productionCard="$productionCard" :stocks="$stocks" :types="$types"/>--}}
@endsection
