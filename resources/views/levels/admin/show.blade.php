@extends('app')

@section('title'){{ $level->title or ''}}@stop

@section('content')
    <div class="container">
        @include('partials.ad')

        <div class="row">
            <div class="col-md-4">
                @if($level->image)
                    <div>
                        <img class="center-block img-responsive level-image" src="{{ $level->image }}" title="{{ $level->image_tooltip or '' }}" />
                    </div>
                @endif
                <br />
                <p class="text-center lead">{!! $level->hint or '' !!}</p>

                <p class="text-center lead">
                    <?php $rating = $level->avg_rating ?>
                    @for($i = 0; $i < round($rating); $i++)
                        <img src="{{ asset('favico.png') }}" height="25" />
                    @endfor
                    ({{ $level->avg_rating }})
                </p>

                <div>
                    <a href="{{ route('levels.edit', $level->id) }}" class="btn btn-primary btn-block level-edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <br>
                    <h3 class="level-answer page-header"><i class="glyphicon glyphicon-check"></i> {{ $level->answer }}</h3>

                    @if($level->prize)
                        <blockquote class="level-prize">
                            {!! $level->prize !!}
                        </blockquote>
                    @endif

                    <p class="level-solution">{!! $level->solution !!}</p>

                </div>
            </div>

            <div class="col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">Recent attempts</div>
                    <div class="panel-body">
                        <table id="attempts" class="table live-table table-striped table-condensed" data-source="{{ url('levels', $level->id).'/attempts' }}" data-interval="3000">
                            <thead>
                            <th>User</th>
                            <th>Attempt</th>
                            <th>When</th>
                            </thead>

                            <tbody>
                            <tr>
                                <td>
                                    <div class="user">
                                        <div class="user-image hidden-sm hidden-xs" data-field="user.image"></div>
                                        <div class="user-details">
                                            <p class="user-name" data-field="user.name_link_tag"></p>
                                            <p class="user-score" data-field="user.email"></p>
                                        </div>
                                    </div>
                                </td>
                                <td data-field="answer"></td>
                                <td data-field="from_now"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Top attempts</div>
                    <div class="panel-body">
                        <table id="attempts" class="table live-table table-striped table-condensed" data-source="{{ url('levels', $level->id).'/attempts/top' }}" data-interval="30000">
                            <thead>
                            <th>Attempt</th>
                            <th>Count</th>
                            </thead>

                            <tbody>
                            <tr>
                                <td data-field="answer"></td>
                                <td data-field="count"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $('.live-table').liveTable();
        });
    </script>
@stop