@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <article class="col-md-8">
                <header class="text-center">
                    <h1>{{ __('What\'s Going On?') }}</h1>
                </header>
                {{ $entries->links() }}
                @foreach($entries as $entry)
                    @component('components.entry-card')
                        @slot('title'){{ $entry['entry']['title'] }}@endslot
                        @slot('userEntriesLink'){{ route('showUserEntries', [$entry['user']['id']]) }}@endslot
                        @slot('user'){{ $entry['user']['name'] }}@endslot
                        @slot('date'){{ $entry['entry']['created_at'] }}@endslot
                        @slot('content'){{ $entry['entry']['content'] }}@endslot
                        @slot('showEntryLink'){{ route('showEntry', [$entry['entry']['id']]) }}@endslot
                        @slot('editLink')
                            @if(auth()->user()->id === $entry['user']['id'])
                                <a href="{{ route('showEditForm', [$entry['entry']['id']]) }}" class="card-link">
                                    {{ __('Edit') }}
                                </a>
                            @endif
                        @endslot
                    @endcomponent
                @endforeach
                {{ $entries->links() }}
            </article>
        </div>
    </section>
@endsection
