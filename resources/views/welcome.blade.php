@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @component('components.entry-card', ['userEntries' => $entries])
                @endcomponent
            </div>
        </div>
    </section>
@endsection
