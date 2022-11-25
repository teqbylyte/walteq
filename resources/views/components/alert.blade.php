@props(['message' => null , 'dismiss' => true])
@if(session()->has(['alert-message', 'alert-status']) || !is_null($message))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <div class="alert-body">
            {{ session('alert-message') ?? (session('alert-status') ?? $message)}}
        </div>

        @if($dismiss)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif
    </div>
@endif

@if(session()->has('alert-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-body">
            {{ session('alert-success')}}
        </div>
        @if($dismiss)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif
    </div>
@endif

@if(session()->has('alert-error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-body">
            {{ session('alert-error')}}
        </div>
        @if($dismiss)
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif
    </div>
@endif
