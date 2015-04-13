@extends('app')

@section('title')Admin | DaWhimsiCo @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading" data-toggle="collapse" data-parent=".row" data-target="#ratings">Feedback</div>
                    <div id="ratings" class="panel-body panel-collapse collapse in">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <th>User</th>
                            <th>Feedback</th>
                            <th>When</th>
                            </thead>
                            <tbody>
                            @foreach($feedbacks as $feedback)
                                <tr>
                                    <td>
                                        <div class="user">
                                            <div class="user-image hidden-sm hidden-xs"><img src="{{ $feedback->user->gravatar }}"></div>
                                            <div class="user-details">
                                                <p class="user-name"><a href="{{ url('users/' . $feedback->user->id) }}">{{ $feedback->user->name }}</a></p>
                                                <p class="user-score">{{ $feedback->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $feedback->feedback }}</td>
                                    <td>{{ $feedback->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1 style="font-size:4em" class="live-data" data-source="{{ url('users/count/all') }}" data-interval="20000">0</h1>
                        <p class="lead">users registered</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1 style="font-size:4em" class="live-data" data-source="{{ url('users/count/active') }}" data-interval="1000">0</h1>
                        <p class="lead">users active</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1 style="font-size:4em" class="live-data" data-source="{{ url('attempts/count') }}" data-interval="5000">0</h1>
                        <p class="lead">attempts made</p>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent=".row" data-target="#visits">Recent page visits</div>
                    <div id="visits" class="panel-body panel-collapse collapse in">
                        <table class="table live-table table-striped table-condensed" data-source="{{ url('/special_pages/visits') }}" data-interval="20000">
                            <thead>
                            <th>User</th>
                            <th>Page</th>
                            <th>When</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="user">
                                        <div class="user-image hidden-sm hidden-xs"></div>
                                        <div class="user-details">
                                            <p class="user-name" data-field="name"></p>
                                            <p class="user-score" data-field="email"></p>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-default" data-field="slug"></span></td>
                                <td data-field="from_now"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent=".row" data-target="#ratings">Recent ratings</div>
                    <div id="ratings" class="panel-body panel-collapse collapse in">
                        <table class="table live-table table-striped table-condensed" data-source="{{ url('/ratings') }}" data-interval="20000">
                            <thead>
                            <th>Level</th>
                            <th>User</th>
                            <th>Rating</th>
                            <th>When</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td data-field="level_id"></td>
                                <td>
                                    <div class="user">
                                        <div class="user-image hidden-sm hidden-xs" data-field="user.image"></div>
                                        <div class="user-details">
                                            <p class="user-name" data-field="user.name_link_tag"></p>
                                            <p class="user-score" data-field="user.email"></p>
                                        </div>
                                    </div>
                                </td>
                                <td data-field="stars"></td>
                                <td data-field="from_now"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" data-parent=".row" data-target="#registrations">Recent registrations</div>
                    <div id="registrations" class="panel-body panel-collapse collapse in">
                        <table class="table live-table table-striped table-condensed" data-source="{{ url('/users/recent') }}" data-interval="20000">
                            <thead>
                                <th>Id</th>
                                <th>User</th>
                                <th>When</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-field="id"></td>
                                    <td>
                                        <div class="user">
                                            <div class="user-image hidden-sm hidden-xs" data-field="image"></div>
                                            <div class="user-details">
                                                <p class="user-name" data-field="name_link_tag"></p>
                                                <p class="user-score" data-field="email"></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-field="from_now"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-7">

            <div class="panel panel-primary">
                <div class="panel-heading">Recent attempts</div>
                <div class="panel-body">
                    <table id="attempts" class="table live-table table-striped table-condensed" data-source="{{ url('/attempts') }}" data-interval="3000">
                        <thead>
                            <th>Level</th>
                            <th>User</th>
                            <th>Attempt</th>
                            <th>When</th>
                        </thead>

                        <tbody>
                            <tr>

                                <td data-field="level_id"></td>
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
        </div>
    </div>
@stop

@section('styles')
    <style type="text/css">
        [data-field=level_id] {
            font-size: 1.2em;
            font-weight: 400;
            cursor: pointer;
        }
        [data-field=level_id]:hover {
            text-decoration: underline;
        }
    </style>
@stop

@section('scripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>

    <script type="text/javascript">

        $(function() {
            $(".live-table").liveTable();
            $('body').on('click', '[data-field=level_id]', function(e) {
                window.location = '{{ url('levels') }}/'+$(this).html();
            });
        });
    </script>

@stop

