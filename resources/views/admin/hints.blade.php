@extends('app')

@section('content')
    <div class="container">
        <div class="row">
                @foreach($hints as $hint)
                    <?php $hint = str_replace('\\', '/', (string) $hint); ?>
                    <div class="col-md-3 text-center">
                        <a class="text-center" href="{{ asset($hint) }}">
                            <img src="{{ asset($hint) }}" class="img img-responsive center-block" />
                            <br>
                            <p class="text-center"><code>{{ $hint }}</code></p>
                        </a>
                    </div>

                @endforeach
        </div>
    </div>
@stop