<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $quiz->title }}</p>
</div>
<!-- Question Field -->

<div class="col-sm-12">
    {!! Form::label('questions', 'Questions:') !!}
    @foreach ($quiz->questions as $question)
        <p>{{ $question->pivot->question_text }}</p>
    @endforeach
</div>


<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $quiz->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $quiz->updated_at}}</p>
</div>
