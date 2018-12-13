@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {!!Form::route('search')->get()->open()!!}
                {!!Form::text('q', null) !!}
            {!!Form::close()!!}
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="container">
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-sm">
                                <a href="{{ route('search') }}?{{ urlencode('dFR[categories.name][0]') }}={{ $category->name }}">
                                    {{ $category->name }} ({{ $category->products_count }})
                                </a>
                            </div>
                        @endforeach
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
