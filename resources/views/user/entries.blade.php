@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row">
            <article class="col-md-8">
                <header class="mb-5">
                    <h1>{{ $user['name'] }} {{ __('content') }}:</h1>
                </header>
                {{ $entries->links() }}
                @foreach($entries as $entry)
                    @component('components.entry-card')
                        @slot('title'){{ $entry['title'] }}@endslot
                        @slot('userEntriesLink'){{ route('showUserEntries', [$user['id']]) }}@endslot
                        @slot('user'){{ $user['name'] }}@endslot
                        @slot('date'){{ $entry['created_at'] }}@endslot
                        @slot('content'){{ $entry['content'] }}@endslot
                        @slot('showEntryLink'){{ route('showEntry', [$entry['id']]) }}@endslot
                        @slot('editLink')
                            @auth
                                @if(auth()->user()->id === $user['id'])
                                    <a href="{{ route('showEditForm', [$entry['id']]) }}" class="card-link">
                                        {{ __('Edit') }}
                                    </a>
                                @endif
                            @endauth
                        @endslot
                    @endcomponent
                @endforeach
                {{ $entries->links() }}
            </article>
            <aside class="col-md-4">
                @foreach($tweets as $tweet)
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-body">
                            <p class="card-text">{{ $tweet->text }}</p>
                            <button class="btn btn-link hides-twitter-status" data-url="{{ route('hideTweet', [$tweet->id]) }}">{{ __('Hide') }}</button>
                            <button class="btn btn-link unhide-twitter-status" data-url="{{ route('unHideTweet', [$tweet->id]) }}">{{ __('Unhide') }}</button>
                        </div>
                    </div>
                @endforeach
            </aside>
        </div>
    </section>
@endsection
