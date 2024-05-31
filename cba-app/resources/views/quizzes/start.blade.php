@extends('layouts.app')

@section('content')
<style>
     body {
        background-color: #f8f9fa;
    }
    .container{
        background-color: #FFFF; /* Warm tone color */
        border-radius: 15px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 10px;
        width: 1200px;
        height: 700px;
    }
    .card{
    
        background-color:#F6E9B2 ; /* Warm tone color */
        width: 800px;
        height: 500px;
        
    }
    .welcome{
        text-align: center;
        color: #ff7f0e;
        font-family: 'Comic Sans MS', cursive, sans-serif; /* Fun font family */
       font-size: 40px;
       margin-top: 50px;
    }
    .header{
        text-align: center;
        color: #ff7f0e;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 700;
        font-size: xx-large;
        
    }
    .card-footer {
        text-align: center;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    }
   
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    <h2 class="header">Welcome to the Quiz! 🌟</h2>
                </div>

                <div class="card-body">
                    <p class="welcome">Sharpen Your Pencils!</p>
                    <img src="{{ asset('images/quiz-sign.jpg') }}" class="img-fluid mx-auto d-block" alt="Quiz Start Image" style="max-width:400px;">
                </div>

                <div class="card-footer ">
                    <a href="{{ route('quiz.index') }}" class="btn btn-success btn-lg">Start Quiz 🚀</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
