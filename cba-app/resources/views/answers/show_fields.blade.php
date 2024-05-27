<!-- Answer Field -->
<div class="col-sm-12">
    {!! Form::label('answer', 'Answer:') !!}
    <p>{{ $answer->answer }}</p>
</div>

<!-- Question Id Field -->
<div class="col-sm-12">
    {!! Form::label('question_id', 'Question Id:') !!}
    <p>{{ $answer->question_id }}</p>
</div>

<!-- Is Correct Field -->
<div class="col-sm-12">
    {!! Form::label('is_correct', 'Is Correct:') !!}
    <p>{{ $answer->is_correct }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $answer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $answer->updated_at }}</p>
</div>

