
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection

@section('content')
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="row match-height">

            <div class="col-lg-4 col-12">
                <div class="card earnings-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="card-title mb-1">Earnings</h4>
                                <div class="font-small-2">This Month</div>
                                <h5 class="mb-1">$4055.56</h5>
                                <p class="card-text text-muted font-small-2">
                                    <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span>
                                </p>
                            </div>
                            <div class="col-6">
                                <div id="earnings-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $statistics->wallet_count }}</h4>
                                        <p class="card-text font-small-3 mb-0">Wallets</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $statistics->transactions_count }}</h4>
                                        <p class="card-text font-small-3 mb-0">Transactions</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <i data-feather="activity" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $statistics->avg_daily }}</h4>
                                        <p class="card-text font-small-3 mb-0">Daily Avg.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <span class="fs-3">₦</span>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">{{ $statistics->income }}</h4>
                                        <p class="card-text font-small-3 mb-0">Income</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->

            <!-- Transaction Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-transaction">
                    <div class="card-header">
                        <h4 class="card-title">Transactions</h4>
                        <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-primary rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Wallet Transfer</h6>
                                    <small>Starbucks</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-danger">- $74</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-success rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Bank Transfer</h6>
                                    <small>Add Money</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">+ $480</div>
                        </div>
                        <div class="transaction-item">
                            <div class="d-flex">
                                <div class="avatar bg-light-danger rounded float-start">
                                    <div class="avatar-content">
                                        <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                    </div>
                                </div>
                                <div class="transaction-percentage">
                                    <h6 class="transaction-title">Wallet Funding</h6>
                                    <small>Add Money</small>
                                </div>
                            </div>
                            <div class="fw-bolder text-success">+ $590</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Transaction Card -->

            <!-- Revenue Report Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-revenue-budget">
                    <div class="row mx-0">
                        <div class="col-md-8 col-12 revenue-report-wrapper">
                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-50 mb-sm-0">Ledger Summary</h4>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center me-2">
                                        <span class="bullet bullet-success font-small-3 me-50 cursor-pointer"></span>
                                        <span>Credit</span>
                                    </div>
                                    <div class="d-flex align-items-center ms-75">
                                        <span class="bullet bullet-danger font-small-3 me-50 cursor-pointer"></span>
                                        <span>Debit</span>
                                    </div>
                                </div>
                            </div>
                            <div id="revenue-report-chart"></div>
                        </div>
                        <div class="col-md-4 col-12 budget-wrapper">
                            <div class="btn-group"></div>
                            <h2 class="mb-25">$25,852</h2>
                            <div class="d-flex justify-content-center">
                                <span class="fw-bolder me-25">Budget:</span>
                                <span>56,800</span>
                            </div>
                            <div id="budget-chart"></div>
                            <button type="button" class="btn btn-primary">Increase Budget</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Revenue Report Card -->

        </div>

        <div class="card">
            <div class="card-header justify-content-between">
                <h5 class="my-0">Last 10 wallet transactions.</h5>
                <a href="{{ route('transactions.index') }}" class="btn btn-primary"> View all</a>
            </div>
            <div class="row match-height">
                <!-- Company Table Card -->
                <div class="col-12">
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Wallet ID</th>
                                            <th>Amount</th>
                                            <th>Previous Balance</th>
                                            <th>New Balance</th>
                                            <th>Reference</th>
                                            <th>Type</th>
                                            <th>Transaction</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>
                                <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ $transaction->wallet->email }}">
                                    {{ $transaction->wallet->unique_id }}
                                </span>
                                            </td>
                                            <td><span class="fw-bolder text-success">@money($transaction->amount)</span></td>
                                            <td><span class="fw-bolder text-secondary">@money($transaction->prev_balance)</span></td>
                                            <td><span class="fw-bolder text-primary">@money($transaction->new_balance)</span></td>
                                            <td>{{ $transaction->reference }}</td>
                                            <td>
                                <span @class([ 'badge rounded-pill',
                                      'badge-light-success' => $transaction->action == 'CREDIT',
                                      'badge-light-danger' => $transaction->action == 'DEBIT',
                                ])>
                                    {{ $transaction->action }}
                                </span>
                                            </td>

                                            <td><span class="badge badge-light-primary">{{ str($transaction->type)->replace('_', ' ')}}</span></td>

                                            <td>{{ $transaction->created_at->format('d/m/Y G:i') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Company Table Card -->
            </div>
        </div>
    </section>
    <!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
@endsection
