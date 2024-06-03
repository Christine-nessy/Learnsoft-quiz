@extends('layouts.app')

@section('content')

<style>
        .card-body{
            margin-bottom: 100px;
        }
        .card-container {
          
            max-height: max-content;
            display: flex;
            justify-content: space-around;
        }
        .card {
            width: 18rem;
            height: 17rem;
        }
        .btn{
            margin-bottom: 400px;
            background-color: green;
            color: white;

        }
        .card-img{
            height: 10rem;
            margin-bottom: 5%;
            width: 14rem;
            margin-left: 10%;
            margin-top: 10%;

        }
        .container-fluid {
            
            margin-top: 30px;
            text-align: center;
            padding: 50px;
            border-radius: 10px;
            background-color:#003C43 ;
            max-height: max-content;
        }

        .text-white-50 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 5%;
        }

        @media (max-width: 768px) {
            .text-white-50 {
                font-size: 28px;
            }
        }

    </style>
    <div class="container-fluid">
        <h1 class="text-white-50">Welcome Back Learner!!</h1>

        <div class="card-container">
            <!-- Card 1 -->
            <div class="card">
                <img class="card-img" src="{{ asset('images/logo.jpeg') }}"  alt="Card image cap">
                <div class="card-body">
                    <!-- <h5 class="card-title">Card Title 1</h5> -->
                    <!-- <p class="card-text">QUIZ</p> -->
                    <a href="{{ route('quiz.start') }}" class="btn ">QUIZ</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <img class="card-img" src="{{ asset('images/little.jpeg')}}" alt="Card image cap">
                <div class="card-body">
                    <!-- <h5 class="card-title">Card Title 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="{{ route('media.index') }}" class="btn">Materials</a>
                </div>
            </div>
        </div>
    </div>

@endsection