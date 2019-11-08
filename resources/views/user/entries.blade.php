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
                    @guest
                        @if($tweet->hidden)
                            @continue
                        @endif
                    @endguest
                    @auth
                        @if($tweet->hidden && Auth::user()->twitter_username !== $tweet->user->name)
                            @continue
                        @endif
                    @endauth
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-body">
                            <p class="card-text">{{ $tweet->text }}</p>
                            @auth
                                @if(Auth::user()->twitter_username === $tweet->user->name)
                                    <button
                                        class="btn btn-link unhide-twitter-status {{ $tweet->hidden ? '' : 'd-none' }}"
                                        data-url="{{ route('unHideTweet', [$tweet->id]) }}">
                                        {{ __('Unhide') }}
                                    </button>
                                    <button
                                        class="btn btn-link hides-twitter-status {{ $tweet->hidden ? 'd-none' : '' }}"
                                        data-url="{{ route('hideTweet', [$tweet->id]) }}">
                                        {{ __('Hide') }}
                                    </button>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </aside>
        </div>
    </section>
@endsection
