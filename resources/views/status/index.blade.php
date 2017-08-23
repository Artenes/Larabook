@extends('layouts.default')

@section('content')

    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            @include('status.partials.publish-status-form')

            @include('status.partials.statuses')

        </div>

    </div>

@endsection
