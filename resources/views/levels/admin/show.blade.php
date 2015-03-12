@extends('app')

@section('title'){{ $level->title or ''}}@stop

@section('content')
    <div class="container">
        @include('partials.ad')

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                @if($level->image)
                    <div>
                        <img class="center-block img-responsive level-image" src="{{ $level->image }}" alt="{{ $level->image_tooltip or '' }}" />
                    </div>
                @endif
                <br />
                <p class="text-center lead">{!! $level->hint or '' !!}</p>
            </div>

            <div class="col-md-5">
                <h3 class="level-answer page-header"><i class="glyphicon glyphicon-check"></i> {{ $level->answer }}</h3>
                <p class="level-solution">{!! $level->solution !!}</p>

                <a href="{{ route('levels.edit', $level->id) }}" class="btn btn-primary btn-block level-edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                <p>
                    <strong>Average rating:</strong> {{ $rating or '-' }}
                </p>

            </div>
        </div>
    </div>
@stop

