@extends('app')

@section('title') Leaderboard | DaWhimsiCo @stop

@section('content')
    <div class="container">
        <h1 class="page-header">Leaderboard</h1>
        @for($rank = 1; $rank <= sizeof($users); $rank++)
            <?php $user = $users[$rank - 1]; ?>
            <div class="row">
                <div class="col-xs-2 col-sm-offset-1 rank">
                    @if($rank == 1) <h1>#{{ $rank }}</h1> @else #{{ $rank }} @endif
                </div>
                <div class="col-xs-8">
                    <div class="user @if($rank == 1) user-large @endif">
                        <img class="user-image img-responsive" src="{{ $user->gravatar }}" />
                        <p class="user-name">{{ $user->name }}</p>
                        <p class="user-score">Level {{ $user->level_id }}</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@stop