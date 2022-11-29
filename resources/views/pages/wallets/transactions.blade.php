@extends('layouts/contentLayoutMaster')

@section('title', 'Wallets')

@section('content')
    <div class="row">
        <div class="col-12">
            <p>List of all wallet transactions carried out</p>
        </div>
    </div>

    <livewire:wallet-transactions-table />
@endsection
