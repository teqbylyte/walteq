<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <div class="me-auto">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="Search"><x-feathericon-search /></span>
                        <input type="search" class="form-control" wire:model="search" placeholder="Search..." aria-describedby="Search" aria-label="Search">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th>Email</th>
                        <th>Wallet ID</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($wallets as $wallet)
                        <tr>
                            <td><a href="mailto:{{$wallet->email}}">{{ $wallet->email }}</a></td>
                            <td>{{ $wallet->unique_id }}</td>
                            <td><span class="fw-bolder text-success">@money($wallet->balance)</span></td>
                            <td>
                                <x-wallet-badge :status="$wallet->status" />
                            </td>
                            <td>
                                <div class="dropdown @if($loop->last) dropup @endif">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light"
                                            data-bs-toggle="dropdown"
                                    >
                                        <x-feathericon-more-vertical />
                                    </button>
                                    <div class="dropdown-menu @unless($loop->last) dropdown-menu-end @endunless">
                                        @unless($wallet->status == 'ACTIVE')
                                            <a class="dropdown-item text-success" href="#">
                                                <span>Activate</span>
                                            </a>
                                        @endunless

                                        @unless($wallet->status == 'SUSPENDED')
                                            <a class="dropdown-item text-warning" href="#">
                                                <span>Suspend</span>
                                            </a>
                                        @endunless

                                        @unless($wallet->status == 'INACTIVE')
                                            <a class="dropdown-item text-danger" href="#">
                                                <span>Deactivate</span>
                                            </a>
                                        @endunless
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer pb-0">
                {{ $wallets->links() }}
            </div>
        </div>
    </div>
</div>
