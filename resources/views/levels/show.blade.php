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
        {!! Form::open(['url' => ['levels/answer', $level->id]]) !!}
            <div class="input-group input-group-lg">
                <input type="text" placeholder="Your answer" class="form-control" data-allowed-chars="{{ $level->answer_format }}" />
                <div class="input-group-btn">
                    <button class=" btn btn-primary" type="submit">Go</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop