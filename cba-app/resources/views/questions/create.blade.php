
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
            
                    <h1>
                    Create Questions
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

        
            {!! Form::open(['route' => 'QA.store', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}


            <div class="card-body">

                <div class="row">
                    @include('questions.fields')
                    <div class="form-group px-3">
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image', ['class' => 'form-control-file', 'accept' => 'image/jpeg, image/jpg, image/png, image/gif, image/svg+xml']) !!}
        </div>
       
                </div>
            </div>
            <div class="card-body">

            <div class="row">
            @include('answers.fields')
            </div>
            <div class="row">
            @include('answers.fields')
            </div>
            <div class="row">
            @include('answers.fields')
            </div>
            <div class="row">
            @include('answers.fields')
            </div>

        </div>
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('questions.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
