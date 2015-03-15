@extends('app')

@section('title') Leaderboard | DaWhimsiCo @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1 style="font-size:6em" class="live-data" data-source="{{ url('users/count/all') }}" data-interval="20000"></h1>
                        <p class="lead">users registered</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1 style="font-size:6em" class="live-data" data-source="{{ url('users/count/active') }}" data-interval="1000"></h1>
                        <p class="lead">users active</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1 style="font-size:6em" class="live-data" data-source="{{ url('attempts/count') }}" data-interval="5000"></h1>
                        <p class="lead">attempts made</p>
                    </div>
                </div>

                <div class="text-right">
                    {!! $users->render() !!}
                </div>

                <table class="table table-hover leaderboard">
                    <tr>
                        <th>Rank</th>
                        <th>User</th>
                        <th>Score</th>
                    </tr>
                    @for($rank = 1; $rank <= sizeof($users); $rank++)
                        <?php
                        $user = $users[$rank - 1];
                        $actualRank = $users->perPage() * ($users->currentPage() - 1) + $rank;
                        $rowClass = ($actualRank === 1)? 'row-large ': ' ';
                        $rowClass .= ($user == Auth::user())? 'current ': ' ';
                        ?>

                        <tr class="{{ $rowClass }}">
                            <td>
                                #{{ $actualRank }}
                            </td>
                            <td>
                                @include('partials.user', ['user' => $user, 'large' => ($actualRank == 1)])
                            </td>
                            <td>
                                {{ $user->score }}
                            </td>
                        </tr>
                    @endfor
                </table>

                <div class="text-right">
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop