@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="page-header">
                All Special Pages <a class="btn btn-default" href="{{ route("special_pages.create") }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
            </h1>

            @if($pages->isEmpty())
                <span>There are no pages.</span>
            @endif

            @foreach($pages as $page)
                <div class="col-md-2 col-sm-4 col-xs-6 col-lg-2 level-thumbnail">
                    <a href="{{ route('special_pages.edit', $page->id) }}" class="btn btn-primary btn-block level-edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a class="level-link" href="{{ url($page->slug) }}">
                        <div class="level-image" style="background-image: url('{{ $page->image }}')"></div>
                        <h4 class="level-title">
                            {{ $page->title }}
                        </h4>
                        <p class="level-hint">{!! $page->hint !!}</p>
                        <p><span class="badge badge-default">/{{ $page->slug }}</span></p>
                    </a>
                </div>
            @endforeach

            @include('partials.ad')
        </div>
    </div>
@stop