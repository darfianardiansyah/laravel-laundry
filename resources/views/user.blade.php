@extends('layouts.master')

@section('title', 'User Management')

@section('content')
    <!-- Content -->
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">

            @livewire('components.user.widget')

            @livewire('components.user.table')
        </div>
    </div>
    <!-- End Content -->
@endsection
