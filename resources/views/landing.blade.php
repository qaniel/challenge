@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <article class="col-md-8">
                <header class="text-center">
                    <h1>{{ __('What\'s Going On?') }}</h1>
                </header>
                {{ $entries->links() }}
                @component('components.entry-card', ['userEntries' => $entries])
                @endcomponent
                {{ $entries->links() }}
            </article>
        </div>
    </section>
@endsection
