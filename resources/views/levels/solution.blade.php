@extends('app')

@section('title'){{ $level->title or ''}}@stop

@section('content')
    <div class="col-lg-6 col-lg-offset-3 col-sm-offset-1 col-sm-10">
        @if($level->image)
            <div>
                <img class="center-block img-responsive" src="{{ $level->image }}" style="max-height:150px"/>
            </div>
        @else
            <br/><br/>
        @endif
        <br/>

        <p class="text-center">{!! $level->hint or '' !!}</p>

        <div class="alert alert-success">
            <h3 class="media-heading">{{ $level->answer }}</h3>
            <p>{!! $level->solution !!}</p>
        </div>

        <div class="text-center rating">
            {!! Form::open(['url' => ['levels', $level->id, 'rate']]) !!}
                @for ($i = 1; $i <= 5; $i++)
                    <button type="submit" value="{{ $i }}" name="rating" class="rating-star"> </button>
                @endfor
            {!! Form::close() !!}
        </div>
    </div>

<style type="text/css">

    .rating {
        direction: rtl;
    }

    .rating-star {
        display: inline-block;
        width: 60px;
        height: 60px;
        border: 0;
        background: transparent;
        background: url({{ url('img/logo-without-text.png') }}) center center no-repeat;
        opacity: 0.25;
    }

    .rating-star:hover {
        opacity: 1;
    }

    .rating-star:hover + .rating-star,
    .rating-star:hover + .rating-star + .rating-star,
    .rating-star:hover + .rating-star + .rating-star + .rating-star,
    .rating-star:hover + .rating-star + .rating-star + .rating-star + .rating-star {
        opacity: 1;
    }
</style>
@stop
