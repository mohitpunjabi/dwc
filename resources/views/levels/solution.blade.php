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

                @if($showRating)
                    <br/>

                    <div class="panel panel-default">
                        <div class="panel-heading">Rate this level to continue</div>

                        <div class="panel-body">
                            <div class="text-left rating">
                                {!! Form::open(['url' => ['levels', $level->id, 'rate']]) !!}
                                @for ($i = 5; $i >= 1; $i--)
                                    <button type="submit" value="{{ $i }}" name="rating" class="rating-star"> </button>
                                @endfor
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@stop
