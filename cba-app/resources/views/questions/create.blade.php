@extends('layouts.app')

@section('content')
<style>
    .container-fluid{
    
    color: #FF6600;
    }
    .card{
        background-color: #003C43 ;
    }
    .form-group{
        color: #ffff;
    }
    .card-footer{
        background-color: #003C43;
    
    }
    .card-footer :hover{
        color: #ffff;
        background-color:orange;
    }
    .btn{
        background-color: #FF6600;
    }
  
  

</style>
    <section class="content-header">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Questions</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            {!! Form::open(['route' => 'QA.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('question', 'Question:') !!}
                    {!! Form::text('question', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Image:') !!}
                    {!! Form::file('image', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('answers', 'Answers:') !!}
                    @php
                        $options = ['A', 'B', 'C', 'D'];
                    @endphp
                    @foreach (range(0, 3) as $index)
                        <div class="form-row align-items-center mb-2">
                            <div class="col-md-9">
                                {!! Form::text("answers[$index][answer]", null, ['class' => 'form-control', 'placeholder' => 'Option ' . $options[$index], 'required']) !!}
                            </div>
                            <div class="col-md-2 form-check form-check-inline ml-3">
                                {!! Form::checkbox("answers[$index][is_correct]", 1, false, ['class' => 'form-check-input', 'id' => "is_correct_$index"]) !!}
                                {!! Form::label("is_correct_$index", 'Correct', ['class' => 'form-check-label']) !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn']) !!}
                <a href="{{ route('questions.index') }}" class="btn">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
