@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <article class="col-md-8">
                <header class="text-center mb-5">
                    <h1>{{ $entry['title'] }}</h1>
                </header>
                <p class=""> {{ $entry['content'] }} </p>
            </article>
        </div>
    </section>
@endsection
