@extends('layouts.master')

@section('title', 'Transaction')

@section('content')
    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">

            @livewire('components.order.widget')

            @livewire('components.order.table')
        </div>
    </div>
    <!-- End Content -->
@endsection
