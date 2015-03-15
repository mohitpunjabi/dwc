@extends('app')

@section('meta-description'){{ $level->hint or 'There is but one rule. Hunt, or be hunted.'}}@stop

@section('title'){{ $level->title or ''}}@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-lg-offset-3 col-sm-offset-1 col-sm-10">
                @if($level->prize)
                    <div class="alert alert-info alert-dismissable">
                        Solve this level and get exciting prizes.
                    </div>
                @endif
                @if($level->image)
                    <div>
                        <img class="center-block img-responsive level-image glyphicon" src="{{ $level->image }}" alt="{{ $level->image_tooltip or '' }}" title="{{ $level->image_tooltip or '' }}" />
                    </div>
                @endif
                <br/>

                <p class="lead text-center">{!! $level->hint or '' !!}</p>
                    {!! Form::open(['url' => ['levels', $level->id, 'attempt']]) !!}
                    <div class="input-group input-group-lg">
                        {!! Form::text('answer', null, ['class' => 'form-control', 'placeholder' => 'Your answer', 'tabindex' => '1', 'autofocus' => 'true', 'data-allowed-chars' => $level->answer_format ]) !!}
                        <div class="input-group-btn">
                            <button class=" btn btn-primary" type="submit" tabindex="2">Go</button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                @if($errors->any())
                    <div class="alert alert-danger level-alert">
                        {{ $errors->first() }}
                    </div>
                @endif


                @unless(Auth::user()->chats->isEmpty())
                        <br>
                        <div class="panel">

                            <div class="panel-body">
                                <table id="chats" class="table live-table table-striped table-condensed" data-source="{{ url('users', Auth::user()->id).'/chats' }}" data-interval="5000">

                                    <tbody>
                                    <tr>
                                        <td data-field="message"></td>
                                        <td data-field="from_now"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                @endunless


            </div>
        </div>
    </div>

@stop

@section('comments')
<!---------------------------------------
{{ $level->source }}
----------------------------------------->
@stop

@section('scripts')
    <script type="text/javascript">
        $(function() {
            $('.live-table').liveTable()
        });
    </script>
@stop