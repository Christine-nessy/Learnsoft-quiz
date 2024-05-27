<!-- Answer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::text('answer', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Question Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question_id', 'Question Id:') !!}
    {!! Form::number('question_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Is Correct Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('is_correct', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('is_correct', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('is_correct', 'Is Correct', ['class' => 'form-check-label']) !!}
    </div>
</div>