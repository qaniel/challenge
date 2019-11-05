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
                    @component('components.entry-card')
                        @slot('title'){{ $entry['title'] }}@endslot
                        @slot('userEntriesLink'){{ route('showUserEntries', [$user['id']]) }}@endslot
                        @slot('user'){{ $user['name'] }}@endslot
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
                {{ $entries->links() }}
            </article>
        </div>
    </section>
@endsection
