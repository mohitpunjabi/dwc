@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" id="levelForm">
                <div class="panel panel-default">
                    <div class="panel-heading">Update level: {{ $level->title }}</div>

                    <div class="panel-body">
                        {!! Form::model($level, ['method' => 'PATCH', 'route' => ['levels.update', $level->id], 'files' => true]) !!}
                        @include('levels._form', [
                            'levelId'    => $level->id,
                            'buttonText' => 'Update'
                        ])
                        {!! Form::close(); !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop