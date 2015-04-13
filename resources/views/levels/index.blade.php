@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="page-header">
                All levels
                @if(Auth::user()->is_admin)
                    <a class="btn btn-default" href="{{ route("levels.create") }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                    <small><a href="{{ url("admin/hints") }}">View all image hints</a></small>
                @endif
            </h1>

            @if($levels->isEmpty())
                <span>There are no levels to solve.</span>
            @endif
            <div class="text-center">
                @include('partials.wonderfulad')
                <br>
            </div>
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
                        @if(Auth::user()->is_admin)
                            <p class="level-hint">
                                <?php $rating = $level->avg_rating ?>
                                @for($i = 0; $i < round($rating); $i++)
                                    <img src="{{ asset('favico.png') }}" height="15" />
                                @endfor
                                ({{ $level->avg_rating }})
                            </p>
                        @endif
                    </a>
                </div>
            @endforeach
            @include('partials.ad')
        </div>
    </div>
@stop