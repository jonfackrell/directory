@extends('layouts.app')

@section('content')

    @can('update', $product)
        <div class="container">
            <div class="row">
                <div class="col-md-2 offset-md-10">
                    <div class="btn-group" role="group" aria-label="Edit">
                        <a class="btn btn-secondary" href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
    @endcan

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card">
                <div class="container card-body">
                    <div class="row">
                        <div class="col-md-2">
                            @if(!empty($product->logo_url))
                                <img src="{{ $product->logo_url }}" class="hit-image align-self-start mr-3" alt="{{ $product->name }}">
                            @else
                                <img src="https://placeimg.com/160/120/tech/sepia?{{ $product->name }}zw3" class="hit-image align-self-start mr-3" alt="{{ $product->name }}">
                            @endif
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <h1 class="card-title">
                                {{ $product->name }}
                            </h1>
                            <h6>
                                by <a href="{{ route('search') }}?{{ urlencode('dFR[company.name][0]') }}={{ $product->company->name }}">{{ $product->company->name }}</a>
                            </h6>
                            <div class="row">
                                <div class="col">
                                    <div class="star-ratings-sprite">
                                        <span style="width:{{ $product->averageRate() }}%" class="star-ratings-sprite-rating"></span>
                                    </div>
                                    <span class="total-comment-count">({{ $product->totalCommentsCount() }})</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="row justify-content-center">
            <div class="col-md-10 card">
                <div class="container  card-body">
                    <div class="row bootstrap snippets">
                        <div class="col-md-6 col-md-offset-2 col-sm-12">
                            <div class="comment-wrapper">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Comments
                                    </div>
                                    <div class="panel-body">
                                        @auth
                                            <textarea class="form-control" placeholder="write a comment..." rows="3"></textarea>
                                            <br>
                                            <button type="button" class="btn btn-info pull-right">Post</button>
                                        @else
                                            <div class="clearfix">&nbsp;</div>
                                            <p>
                                                <a href="{{ route('login') }}">{{ __('Login') }}</a> to post a comment.
                                            </p>
                                        @endauth
                                        @if($product->comments->count() > 0)
                                            <div class="clearfix"></div>
                                            <hr>
                                            <ul class="media-list">
                                                @foreach($product->comments as $comment)
                                                <li class="media">
                                                    <a href="#" class="pull-left">
                                                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                                    </a>
                                                    <div class="media-body">
                                    <span class="text-muted pull-right">
                                        <small class="text-muted">30 min ago</small>
                                    </span>
                                                        <strong class="text-success">@MartinoMont</strong>
                                                        <div>
                                                            {!! $comment->comment !!}
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($ads->count() > 0)
            <div class="clearfix">&nbsp;</div>
            <div class="row justify-content-center">
                <div class="col-md-10 card">
                    <div class="container  card-body">
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
        @endif
    </div>
@endsection

@push('scripts')



@endpush
