<section class="container">
    @if($message = Session::get('success'))
        <div class="alert alert-success"><strong>{{ __('Success: ') }}</strong> {{ $message }}</div>
    @endif
    @if($message = Session::get('warning'))
        <div class="alert alert-warning"><strong>{{ __('Warning: ') }}</strong> {{ $message }}</div>
    @endif
    @if($message = Session::get('error'))
        <div class="alert alert-danger"><strong>{{ __('Error: ') }}</strong> {{ $message }}</div>
    @endif
    @if($message = Session::get('info'))
        <div class="alert alert-info"><strong>{{ __('Info: ') }}</strong> {{ $message }}</div>
    @endif
</section>
