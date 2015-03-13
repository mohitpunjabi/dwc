@extends('app')

@section('title'){{ $level->title or ''}}@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-lg-offset-3 col-sm-offset-1 col-sm-10">
                @if($level->prize)
                    <div class="alert alert-info alert-dismissable">
                        Solve this level and get a prize from Ebay or something.
                    </div>
                @endif
                @if($level->image)
                    <div>
                        <img class="center-block img-responsive level-image glyphicon" src="{{ $level->image }}" alt="{{ $level->image_tooltip or '' }}" title="{{ $level->image_tooltip or '' }}" />
                    </div>
                @endif
                <br/>

                <p class="lead text-center">{!! $level->hint or '' !!}</p>
                    @if($level->id > 1)
                        {!! Form::open(['url' => ['levels', $level->id, 'attempt']]) !!}
                        <div class="input-group input-group-lg">
                            {!! Form::text('answer', null, ['class' => 'form-control', 'placeholder' => 'Your answer', 'tabindex' => '1', 'autofocus' => 'true', 'data-allowed-chars' => $level->answer_format ]) !!}
                            <div class="input-group-btn">
                                <button class=" btn btn-primary" type="submit" tabindex="2">Go</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    @endif

                @if($errors->any())
                    <div class="alert alert-danger level-alert">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>
        </div>
        @include('partials.ad')
    </div>

@stop

@section('comments')
<!---------------------------------------
{{ $level->source }}
----------------------------------------->
@stop