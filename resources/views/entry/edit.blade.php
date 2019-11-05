@extends('layouts.app')
@section('content')
    <section class="container">
        <header>
            <h1>{{ __('Edit Entry:') }} {{ $title }}</h1>
        </header>
        <form action="{{ route('updateEntry', [$id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">{{ __('Entry Title') }}</label>
                <input id="title" class="form-control @error('title') is-invalid @enderror" name="title"
                       type="text" placeholder="{{ __('Entry Title') }}" value="{{ $title }}"/>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">{{ __('Entry Content') }}</label>
                <textarea id="content" class="form-control @error('content') is-invalid @enderror"
                       name="content"
                          type="text" placeholder="{{ __('Entry Content') }}" value="{{ $content }}"></textarea>
                @error('content')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">{{ __('Update Entry') }}</button>
            </div>
        </form>
    </section>
@endsection
