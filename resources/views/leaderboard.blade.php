@extends('app')

@section('title') Leaderboard | DaWhimsiCo @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="page-header">Leaderboard</h1>

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