@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="input-group">
    {!! Form::label('slug', url('levels/'.$levelId).'/', ['class' => 'input-group-addon']) !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Level URL']) !!}
</div>
<label class="help-block">Must contain alphabets, number, hyphens or underscores</label>

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
    {!! Form::label('answer_format', 'Characters allowed in answer') !!}
    {!! Form::text('answer_format', null, ['class' => 'form-control', 'placeholder' => 'Characters allowed in answer']) !!}
    <label class="help-block">Must be a valid regular expression. Eg: <code>[a-z]</code> for alphabets only, <code>[a-z0-9]</code> for alphabets or numbers, <code>[abcde42]</code> if only <code>a, b, c, d, e, 4, 2</code> are allowed, and so on.</label>
</div>

<div>
    {!! Form::label('answer', 'Answer') !!}
    {!! Form::text('answer', null, ['class' => 'form-control', 'placeholder' => 'Answer']) !!}
    <label class="help-block">Must be a valid sentence of the regex given above.</label>
</div>

<div>
    {!! Form::label('points', 'Points') !!}
    {!! Form::text('points', null, ['class' => 'form-control', 'placeholder' => 'Points']) !!}
    <label class="help-block">Must be an integer.</label>
</div>

<div>
    {!! Form::label('solution', 'Solution') !!}
    {!! Form::textarea('solution', null, ['class' => 'form-control', 'placeholder' => 'Solution']) !!}
    <label class="help-block">Solution of the level. HTML allowed (and encouraged).</label>
</div>

<div>
    <button class="btn btn-block btn-primary" type="submit">{{ $buttonText }}</button>
</div>