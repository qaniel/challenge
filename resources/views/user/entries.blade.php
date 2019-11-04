@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <article class="col-md-8">
                <header class="mb-5">
                    <h1>{{ $user['name'] }} {{ __('content') }}:</h1>
                </header>
                {{ $entries->links() }}
                @foreach($entries as $entry)
                    <article class="card mb-2">
                        <header class="card-header">
                            <h5>{{ $entry['title'] }}</h5>
                            <h6 class="card-subtitle text-muted">
                                {{ $entry['created_at'] }}
                            </h6>
                        </header>
                        <div class="card-body">
                            <p class="card-text">{{ $entry['content'] }}</p>
                            <a href="{{ route('showEntry', [$entry['id']]) }}" class="card-link">{{ __('View') }}</a>
                            @auth
                                @if(auth()->user()->id === $user['id'])
                                    <a href="{{ route('showEditForm', [$entry['entry']['id']]) }}"
                                       class="card-link">{{ __('Edit') }}</a>
                                @endif
                            @endauth
                        </div>
                        <div class="card-footer text-muted">
                            {{ __('By:') }} <strong>{{ $user['name'] }}</strong>
                        </div>
                    </article>
                @endforeach
                {{ $entries->links() }}
            </article>
        </div>
    </section>
@endsection
