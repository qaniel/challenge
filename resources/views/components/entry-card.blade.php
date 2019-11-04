@foreach($userEntries as $entry)
    <article class="card mb-2">
        <header class="card-header">
            <h5>{{ $entry['entry']['title'] }}</h5>
            <h6 class="card-subtitle text-muted">
                {{ $entry['entry']['created_at'] }}
            </h6>
        </header>
        <div class="card-body">
            <p class="card-text">{{ $entry['entry']['content'] }}</p>
            <a href="{{ route('showEntry', [$entry['entry']['id']]) }}" class="card-link">{{ __('View') }}</a>
            @auth
                @if(auth()->user()->id === $entry['user']['id'])
                    <a href="{{ route('showEditForm', [$entry['entry']['id']]) }}"
                       class="card-link">{{ __('Edit') }}</a>
                @endif
            @endauth
        </div>
        <div class="card-footer text-muted">
            <a class="text-decoration-none text-dark" href="{{ route('showUserEntries', [$entry['user']['id']]) }}">{{ __('By:') }}
                <strong>{{ $entry['user']['name'] }}</strong></a>
        </div>
    </article>
@endforeach
