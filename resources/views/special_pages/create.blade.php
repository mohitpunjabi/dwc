@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" id="levelForm">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a level</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'special_pages.store', 'files' => true]) !!}
                            @include('special_pages._form', [
                                'buttonText' => 'Create'
                            ])
                        {!! Form::close(); !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop