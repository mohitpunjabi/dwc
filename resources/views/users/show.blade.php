@extends('app')

@section('title'){{ $user->name . ' | DaWhimsiCo'}}@stop

@section('content')
    <div class="container">
        @include('partials.ad')

        <div class="row">
            <div class="col-md-2">
                <div>
                    <img class="center-block img-responsive level-image" src="{{ $user->gravatar }}" title="{{ $user->name }}" />
                </div>
                <div class="text-center"><strong>{{ $user->name }}</strong></div>
                <div class="text-center">{{ $user->email }}</div>
                <div class="text-center">Level {{ $user->level_id }}</div>
                <div class="text-center">Last seen {{ $user->updated_at->diffForHumans() }}</div>

                <div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Recent attempts</div>
                    <div class="panel-body">
                        <table id="attempts" class="table live-table table-striped table-condensed" data-source="{{ url('users', $user->id).'/attempts' }}" data-interval="3000">
                            <thead>
                            <th>Level</th>
                            <th>Attempt</th>
                            <th>When</th>
                            </thead>

                            <tbody>
                            <tr>
                                <td data-field="level_id"></td>
                                <td data-field="answer"></td>
                                <td data-field="from_now"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">

                <div>
                    {!! Form::label('message', 'Chat message - coming soon') !!}
                    {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Chat message - coming soon', 'rows' => 3]) !!}
                    <label class="help-block"></label>
                </div>
                <button class="btn btn-block btn-primary">Send message</button>

                <br><br>


                <div class="panel panel-info">
                    <div class="panel-heading">Chats</div>
                    <div class="panel-body">

                    </div>
                </div>
                
                
                
                <div class="panel panel-default">
                    <div class="panel-heading">Recent ratings</div>
                    <div class="panel-body">
                        <table id="attempts" class="table live-table table-striped table-condensed" data-source="{{ url('users', $user->id).'/ratings' }}" data-interval="60000">
                            <thead>
                            <th>Level</th>
                            <th>Rating</th>
                            </thead>

                            <tbody>
                            <tr>
                                <td data-field="level_id"></td>
                                <td data-field="rating"></td>
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