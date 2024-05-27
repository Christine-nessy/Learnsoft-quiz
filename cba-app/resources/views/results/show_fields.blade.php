<!-- Score Field -->
<div class="col-sm-12">
    {!! Form::label('score', 'Score:') !!}
    <p>{{ $result->score }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $result->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $result->updated_at }}</p>
</div>

