@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="padding-left: 0px;padding-right: 0px;">
                <div class="container" style="padding-left: 0px;padding-right: 0px;">
                    {!!Form::route('search')->get()->open()!!}
                        {!!Form::text('q', null)->placeholder('Search...') !!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="row justify-content-center">
            <div class="col-md-10 card">
                <div class="container card-body">
                    <div class="row ">
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
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="row justify-content-center">
            <div class="col-md-10 card">
                <div class="container card-body">
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
