@extends('app')

@section('title')Admin | DaWhimsiCo @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1 style="font-size:6em" class="live-data" data-source="{{ url('users/count/all') }}" data-interval="20000">0</h1>
                        <p class="lead">users registered</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1 style="font-size:6em" class="live-data" data-source="{{ url('users/count/active') }}" data-interval="1000">0</h1>
                        <p class="lead">users active</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <h1 style="font-size:6em" class="live-data" data-source="{{ url('attempts/count') }}" data-interval="5000">0</h1>
                        <p class="lead">attempts made</p>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">Recent ratings</div>
                    <div class="panel-body">
                        <table class="table live-table table-striped table-condensed" data-source="{{ url('/ratings') }}" data-interval="20000">
                            <thead>
                            <th>Level</th>
                            <th>User</th>
                            <th>Rating</th>
                            <th>On</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td data-field="level_id"></td>
                                <td>
                                    <div class="user">
                                        <div class="user-image hidden-sm hidden-xs" data-field="user.image"></div>
                                        <div class="user-details">
                                            <p class="user-name" data-field="user.name"></p>
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
                    <div class="panel-heading">Recent registrations</div>
                    <div class="panel-body">
                        <table class="table live-table table-striped table-condensed" data-source="{{ url('/users/recent') }}" data-interval="20000">
                            <thead>
                                <th>Id</th>
                                <th>User</th>
                                <th>On</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-field="id"></td>
                                    <td>
                                        <div class="user">
                                            <div class="user-image hidden-sm hidden-xs" data-field="image"></div>
                                            <div class="user-details">
                                                <p class="user-name" data-field="name"></p>
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
                            <th>On</th>
                        </thead>

                        <tbody>
                            <tr>

                                <td data-field="level_id"></td>
                                <td>
                                    <div class="user">
                                        <div class="user-image hidden-sm hidden-xs" data-field="user.image"></div>
                                        <div class="user-details">
                                            <p class="user-name" data-field="user.name"></p>
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
@stop

@section('styles')
    <style type="text/css">
        .live-table tbody tr:first-child {
            display: none;
        }
    </style>
@stop

@section('scripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        $.fn.extend({
            liveTable: function() {
                return $(this).each(function() {
                    var $this = $(this);
                    var $tbody = $this.find('tbody');
                    var $tr = $tbody.find('tr').first();
                    var interval = $this.data('interval');
                    var source = $this.data('source');

                    var _updateData = function(data) {
                        var $rows = [$tr];
                        for(var i = 0; i < data.length; i++) {
                            var $newTr = $tr.clone();
                            $newTr.find('[data-field]').each(function() {
                                var keys = $(this).data('field').split(".");
                                var newData = data[i];
                                for(var j = 0; j < keys.length; j++) newData = newData[keys[j]];
                                $(this).html(newData);
                            });

                            $rows.push($newTr);
                        }

                        $tbody.html($rows);
                    };

                    var _fetchData = function() {
                        $.ajax({
                            url: source
                        }).success(function(data) {
                            _updateData(data);
                            setTimeout(_fetchData, interval);
                        });
                    };

                    _fetchData();
                });
            }
        });

        $(function() {
            $(".live-table").liveTable();

            $('.live-data').each(function() {
                var $this = $(this);
                var source = $this.data('source');
                var interval = $this.data('interval');
                var _updateData = function(data) {
                    $this.html(data);
                };

                var _fetchData = function() {
                    $.ajax({
                        url: source
                    }).success(function(data) {
                        _updateData(data);
                        setTimeout(_fetchData, interval);
                    });
                };

                _fetchData();
            });

        });
    </script>
@stop

