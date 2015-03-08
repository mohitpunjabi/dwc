@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="page-header">All levels <a class="btn btn-default" href="{{ route("levels.create") }}"><i class="glyphicon glyphicon-plus"></i> Create</a></h1>

            @if($levels->isEmpty())
                <span>There are no levels to solve.</span>
            @endif

            @foreach($levels as $level)
                <div class="col-md-2 col-sm-4">
                    <img class="img-responsive" src="{{ $level->image }}" alt="{{ $level->image_tooltip }}" style="height: 200px"/>

                    <h4>
                        <span class="label label-success">+{{ $level->points }}</span>
                        <a href="{{ route('levels.show', $level->id).'/'.$level->slug }}">{{ $level->title }}</a>
                    </h4>

                    <p>{!! $level->hint !!}</p>
                    <div>
                        <a href="{{ route('levels.edit', $level->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        {!! Form::open(['route' => ['levels.destroy', $level->id], 'method' => 'delete', 'style' => 'display: inline']) !!}
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        {!! Form::close() !!}
                    </div>
                    <br/>
                </div>

            @endforeach
        </div>
    </div>
@stop
