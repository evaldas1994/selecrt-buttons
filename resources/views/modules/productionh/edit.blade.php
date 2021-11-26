@extends('layouts.app')

@section('content')
    <livewire:productionh.edit
        :productionsh="$productionsh"
        :stores="$stores"
        :templates="$templates"
        :productionGroups="$productionGroups"
        :stockOperationGroups="$stockOperationGroups"
    />
@endsection
