@extends('app')

@section('title'){{ $level->title or ''}}@stop

@section('content')
    <div class="col-lg-6 col-lg-offset-3 col-sm-offset-1 col-sm-10">
        @if($level->image)
            <div>
                <img class="center-block img-responsive" src="{{ $level->image }}" style="max-height:400px"/>
            </div>
        @else
            <br/><br/>
        @endif
        <br/>

        <p class="lead text-center">{!! $level->hint or '' !!}</p>
        {!! Form::open(['url' => ['levels', $level->id, 'attempt']]) !!}
            <div class="input-group input-group-lg">
                {!! Form::text('answer', null, ['class' => 'form-control', 'placeholder' => 'Your answer', 'tabindex' => '1', 'autofocus' => 'true', 'data-allowed-chars' => $level->answer_format ]) !!}
                <div class="input-group-btn">
                    <button class=" btn btn-primary" type="submit" tabindex="2">Go</button>
                </div>
            </div>
        {!! Form::close() !!}

        @if($errors->any())
            <br/>
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
@stop