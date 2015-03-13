@extends('app')

@section('title')Admin | DaWhimsiCo @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
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
                    <div class="panel-heading">Recent registrations</div>
                    <div class="panel-body">
                        <table class="table live-table table-striped table-condensed" data-source="{{ url('/users/recent') }}" data-interval="20000">
                            <thead>
                            <th data-field="id">Id</th>
                            <th data-field="name">Name</th>
                            <th data-field="email">Email</th>
                            </thead>
                        </table>
                    </div>
                </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Recent attempts</div>
                <div class="panel-body">
                    <table id="attempts" class="table live-table table-striped table-condensed" data-source="{{ url('/attempts') }}" data-interval="7000">
                        <thead>
                        <th data-field="level_id">Level</th>
                        <th data-field="user.name">User</th>
                        <th data-field="user.email">Email</th>
                        <th data-field="answer">Attempt</th>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
@stop

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css" type="text/css" />
@stop

@section('scripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
        $(function() {
            $('.live-table').each(function() {
                var fields = $(this).find("th");
                var columns = [];
                var $this = $(this);
                for(var i = 0; i < fields.length; i++) columns.push({"data": $(fields[i]).data('field')});

                console.log($this.data('source'));
                $this.dataTable({
                    "ajax":     $this.data('source'),
                    "paging":   false,
                    "ordering": false,
                    "info":     false,
                    "filter":   false,
                    "columns":  columns
                });

                setInterval(function() {
                    $this.dataTable()._fnAjaxUpdate();
                }, $this.data("interval"));
            });


            $('.live-data').each(function() {
                var $this = $(this);
                $.ajax({
                    url: $this.data('source')
                }).success(function(data) {
                    $this.html(data);
                });

                setInterval(function() {
                    $.ajax({
                        url: $this.data('source')
                    }).success(function(data) {
                        $this.html(data);
                    });
                }, $this.data('interval'));
            });

        });
    </script>
@stop

