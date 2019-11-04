@extends('layouts.app')
@section('content')
    <section class="container">
        <article>
            <header>
                <h1>{{ $entry['title'] }}</h1>
            </header>
            <p> {{ $entry['content'] }} </p>
        </article>
    </section>
@endsection
