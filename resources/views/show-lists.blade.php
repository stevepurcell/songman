@extends('layouts.app')

@section('content')
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                            <div class="card-header">
                                <div><h3>Song Lists</h3></div>

                        <div class="card-body">
                            @livewire('show-lists')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection