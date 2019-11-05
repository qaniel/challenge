@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <article class="col-md-8">
                <header>
                    <h1>{{ __('Dashboard') }}</h1>
                </header>
                @foreach($userEntries as $entry)
                    @component('components.entry-card')
                        @slot('title'){{ $entry['title'] }}@endslot
                        @slot('userEntriesLink'){{ route('showUserEntries', [$entry['user']['id']]) }}@endslot
                        @slot('user'){{ $entry['user']['name'] }}@endslot
                        @slot('date'){{ $entry['created_at'] }}@endslot
                        @slot('content'){{ $entry['content'] }}@endslot
                        @slot('showEntryLink'){{ route('showEntry', [$entry['id']]) }}@endslot
                        @slot('editLink')
                            <a href="{{ route('showEditForm', [$entry['id']]) }}" class="card-link">
                                {{ __('Edit') }}
                            </a>
                        @endslot
                    @endcomponent
                @endforeach
            </article>
        </div>
    </section>
@endsection
