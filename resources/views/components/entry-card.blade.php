<article class="card mb-2">
    <header class="card-header">
        <h5>{{ $title }}</h5>
        <h6 class="card-subtitle text-muted">
            <a class="text-decoration-none text-dark"
               href="{{ $userEntriesLink }}">{{ __('By:') }}
                <strong>
                    {{ $user }}
                </strong>
            </a> {{ __('on') }} {{ $date }}
        </h6>
    </header>
    <div class="card-body">
        <p class="card-text">{{ $content }}</p>
        <a href="{{ $showEntryLink }}" class="card-link">{{ __('View') }}</a>
        @auth
            {{ $editLink }}
        @endauth
    </div>
</article>
