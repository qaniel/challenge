@extends('layouts.app')
@section('content')
<section class="container">
    <form action="" method="POST">
        @csrf
        <label for="post-title"></label>
        <input id="post-title" class="form-control @error('post-title') is-invalid @enderror" name="post-title"
               type="text" placeholder="{{ __('Post Title') }}"/>

        <label for="post-content"></label>
        <input id="post-content" class="form-control @error('post-content') is-invalid @enderror" name="post-content"
               type="text" placeholder="{{ __('Post Content') }}"/>
    </form>
</section>
@endsection
