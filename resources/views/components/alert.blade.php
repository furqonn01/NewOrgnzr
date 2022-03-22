@if ($message = Session::get('success'))
<div class="alert-box success-alert">
    <div class="alert">
        <h4 class="alert-heading">Berhasil</h4>
        <p class="text-medium">
            {{ $message }}
        </p>
    </div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert-box danger-alert">
    <div class="alert">
        <h4 class="alert-heading">Error</h4>
        <p class="text-medium">
            {{ $message }}
        </p>
    </div>
</div>
@endif
