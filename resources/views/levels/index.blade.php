@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="page-header">
                All levels
                @if(Auth::user()->is_admin)
                    <a class="btn btn-default" href="{{ route("levels.create") }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                @endif
            </h1>

            @if($levels->isEmpty())
                <span>There are no levels to solve.</span>
            @endif

            @foreach($levels as $level)
                <div class="col-md-2 col-sm-4 col-xs-6 col-lg-2 level-thumbnail">
                    @if(Auth::user()->is_admin)
                            <a href="{{ route('levels.edit', $level->id) }}" class="btn btn-primary btn-block level-edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    @endif
                    <a class="level-link" href="{{ route('levels.show', $level->id).'/'.$level->slug }}">
                        <div class="level-image" style="background-image: url('{{ $level->image }}')"></div>
                        <h4 class="level-title">
                            <span class="label label-success level-points">+{{ $level->points }}</span>
                            {{ $level->title }}
                        </h4>
                        <p class="level-hint">{!! $level->hint !!}</p>
                    </a>
                </div>
            @endforeach
            @include('partials.ad')
        </div>
    </div>
@stop