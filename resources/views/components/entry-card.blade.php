@foreach($userEntries as $entry)
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
                <a href="{{ route('showEditForm', [$entry['id']]) }}" class="card-link">{{ __('Edit') }}</a>
            @endauth
        </div>
        <div class="card-footer text-muted">
            {{ __('By:') }} <strong>{{ $entry['user']['name'] }}</strong>
        </div>
    </article>
@endforeach
