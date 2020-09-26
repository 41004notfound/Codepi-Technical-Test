@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>{{ env('APP_NAME') ?? 'Codepi Technical Test' }}</h1>
            <hr>
        </div>
        <div class="col-12 col-md-3">
            <!-- Categories Listing - Livewire Component -->
            <livewire:listing-categories />
        </div>
        <div class="col-12 col-md-6">
            <!-- Products Listing - Livewire Component -->
            <livewire:listing-products />
        </div>
        <div class="col-12 col-md-3">
            <!-- Characteristics Listing - Livewire Component -->
            <livewire:listing-characteristics />
        </div>
    </div>
</div>
@endsection
