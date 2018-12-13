@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container">
                    <div class="row">
                        @foreach($ads as $ad)
                            <div class="col-sm">
                                {!! $ad->content !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')



@endpush
