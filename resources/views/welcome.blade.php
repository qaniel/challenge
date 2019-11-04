@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{ $entries->links() }}
                @component('components.entry-card', ['userEntries' => $entries])
                @endcomponent
                {{ $entries->links() }}
            </div>
        </div>
    </section>
@endsection
