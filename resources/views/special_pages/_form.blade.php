@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div>
    {!! Form::label('slug', 'The URL') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Level URL']) !!}
    <label class="help-block"><strong>Warning:</strong> This should not be equal to the URL for any level. Or the site will break down. Must contain alphabets, number, hyphens or underscores.</label>
</div>

<div>
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
    <label class="help-block">Title of the level. Will appear on the title bar.</label>
</div>

<div>
    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image', null, ['class' => 'form-control', 'placeholder' => 'Image', 'accept' => 'image/*']) !!}
    <label class="help-block">A .png, .jpg or a .gif file</label>
</div>

<div>
    {!! Form::label('image_tooltip', 'Image Tooltip') !!}
    {!! Form::text('image_tooltip', null, ['class' => 'form-control', 'placeholder' => 'Image Tooltip']) !!}
    <label class="help-block">Tooltip for the image</label>
</div>

<div>
    {!! Form::label('hint', 'Text hint') !!}
    {!! Form::text('hint', null, ['class' => 'form-control', 'placeholder' => 'Text hint']) !!}
    <label class="help-block">Must contain at most 255 characters.</label>
</div>

<div>
    {!! Form::label('source', 'Source') !!}
    {!! Form::textarea('source', null, ['class' => 'form-control', 'placeholder' => 'Source code hint']) !!}
    <label class="help-block">Source code hint.</label>
</div>

<div>
    {!! Form::label('og_image', 'The Facebook link hint image') !!}
    {!! Form::file('og_image', null, ['class' => 'form-control', 'placeholder' => 'Image', 'accept' => 'image/*']) !!}
    <label class="help-block">A .png, .jpg or a .gif file</label>
</div>


<div>
    <button class="btn btn-block btn-primary" type="submit">{{ $buttonText }}</button>
</div>