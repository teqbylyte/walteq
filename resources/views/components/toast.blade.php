<!-- BEGIN: Notification Content -->

@if(session()->has(['message', 'status']))
    <div id="toast-container" class="toast-container toast-top-right">
        <div class="toast toast-info" aria-live="polite" style="display: block;">
            <button type="button" class="toast-close-button" role="button">×</button>
            <div class="toast-title">Info!</div>
            <div class="toast-message">{{ session('message') ?? session('status') }}</div>
        </div>
    </div>
@endif

@if(session()->has('success'))
    <div id="toast-container" class="toast-container toast-top-right">
        <div class="toast toast-success" aria-live="polite" style="display: block;">
            <button type="button" class="toast-close-button" role="button">×</button>
            <div class="toast-title">Success!</div>
            <div class="toast-message">{{ session('success') }}</div>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div id="toast-container" class="toast-container toast-top-right">
        <div class="toast toast-error" aria-live="polite" style="display: block;">
            <button type="button" class="toast-close-button" role="button">×</button>
            <div class="toast-title">Failed!</div>
            <div class="toast-message">{{ session('error') }}</div>
        </div>
    </div>
@endif
