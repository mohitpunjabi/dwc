@extends('app')

@section('meta-description'){{ $page->hint or 'There is but one rule. Hunt, or be hunted.'}}@stop

@section('og-image'){{ $page->og_image or asset('img/logo-without-text.png')}}@stop

@section('title'){{ $page->title or ''}}@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-lg-offset-3 col-sm-offset-1 col-sm-10">
                @if($page->image)
                    <div>
                        <img class="center-block img-responsive level-image glyphicon" src="{{ $page->image }}" alt="{{ $page->image_tooltip or '' }}" title="{{ $level->image_tooltip or '' }}" />
                    </div>
                @endif
                <br/>

                <h2 class="lead text-center">{!! $page->hint or '' !!}</h2>

            </div>
        </div>
        @include('partials.ad')
    </div>

@stop

@section('comments')
<!---------------------------------------
{{ $page->source }}
----------------------------------------->
@stop