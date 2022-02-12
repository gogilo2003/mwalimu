@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')
<subjects/>
@endsection
@push('js')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush
