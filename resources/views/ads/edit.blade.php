@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 card">
                <div class="container card-body">
                    {!! Form::open()->route('ad.update', ['ad' => $ad])->put()->fill($ad) !!}
                        {!! Form::text('name', 'Name') !!}
                        {!! Form::textarea('content', 'Content') !!}
                        <div class="row">
                            <div class="col">
                                {!! Form::text('starts_at', 'Starts')->value($ad->starts_at->format('m/d/Y')) !!}
                            </div>
                            <div class="col">
                                {!! Form::text('ends_at', 'Ends')->value($ad->ends_at->format('m/d/Y')) !!}
                            </div>
                        </div>
                        {!! Form::submit("Save") !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('#content').summernote({
            height: 300
        });

        $('#starts_at').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });

        $('#ends_at').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
    </script>
@endpush