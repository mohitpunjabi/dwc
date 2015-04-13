@extends('app')

@section('title'){{ $user->name . ' | DaWhimsiCo'}} @stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                <h1 class="text-center" style="font-size: 20vw">{{ $user->rank }}</h1>
                @if($user->has_finished)
                    <p><b>Congratulations!</b> You have successfully completed the online treasure hunt, DaWhimsiCo!
                        You should be proud, but mostly humbled that you were privileged enough to do so.</p>
                    <p>You haven't been disqualified. It's all whimsical!</p>

                @endif

                <hr />
                @if($user->feedback)
                    <div>
                        <h4>Thanks for your feedback.</h4>
                        {{ $user->feedback->feedback }}
                        <hr/>
                    </div>
                @else
                    {!! Form::open(['url' => ['users', $user->id, 'feedback']]) !!}
                    <div>
                        <p>
                            Hello {{ $user->name }}, We enjoyed having you playing our hunt. It was enjoyable for us and we hope it was the same for you.
                            However, we would love to have some comments from your side. How was the hunt?
                            Which levels did you really like/hate?
                            Anything you would like to suggest for future levels?
                        </p>

                        {!! Form::textarea('feedback', null, ['class' => 'form-control', 'placeholder' => 'Your feedback']) !!}
                        <label class="help-block"></label>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Send feedback</button>
                    {!! Form::close() !!}
                @endif
                <br>

                <p>
                    Thank you for your time. See you in another life!
                </p>

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