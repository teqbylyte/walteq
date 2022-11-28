@extends('layouts/contentLayoutMaster')

@section('title', 'Wallets')

@section('content')
    <div class="row">
        <div class="col-12">
            <p>List of all wallets on the system</p>
        </div>
    </div>

    <livewire:wallets-table />
@endsection
