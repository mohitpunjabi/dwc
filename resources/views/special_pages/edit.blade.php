@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" id="levelForm">
                <div class="panel panel-default">
                    <div class="panel-heading">Update level: {{ $special_page->title }}</div>

                    <div class="panel-body">
                        {!! Form::model($special_page, ['method' => 'PATCH', 'route' => ['special_pages.update', $special_page->id], 'files' => true]) !!}
                        @include('special_pages._form', [
                            'buttonText' => 'Update'
                        ])
                        {!! Form::close(); !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop