@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card">
                <div class="container card-body">
                    {!! Form::open()->route('product.update', ['product' => $product])->put()->fill($product) !!}
                    {!! Form::text('name', 'Name') !!}
                    {!! Form::textarea('description', 'Description') !!}
                    {!! Form::submit("Save") !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

    <script>
        $('#description').summernote({
            height: 500
        });

    </script>
@endpush