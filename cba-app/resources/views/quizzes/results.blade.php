@extends('layouts.app')

@section('content')
    <style>
        .container {
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .text{
            color: #003C43;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th {
            background-color: #003C43;
            color: #fff;
            text-align: center;
            vertical-align: middle;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .excellent {
            color: green;
            font-weight: bold;
        }

        .good {
            color: orange;
            font-weight: bold;
        }

        .average {
            color: blue;
            font-weight: bold;
        }

        .fail {
            color: red;
            font-weight: bold;
        }
    </style>

    <div class="container">
        <h1 class="text">Results</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Attempted Questions</th>
                    <th>Correctly Answered Questions</th>
                    <th>Score</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result['user']->name }}</td>
                        <td>{{ $result['totalAttempted'] }}</td>
                        <td>{{ $result['totalCorrect'] }}</td>
                        @php
                            $percentage = $result['totalAttempted'] > 0 ? round(($result['totalCorrect'] / $result['totalAttempted']) * 100, 0) : 0;
                        @endphp
                        <td>{{ $percentage }}%</td>
                        <td class="
                            @if($percentage >= 90) excellent
                            @elseif($percentage >= 70 && $percentage <= 89) good
                            @elseif($percentage >= 50 && $percentage <= 69) average
                            @else fail
                            @endif
                        ">
                            @if($percentage >= 90)
                                Excellent
                            @elseif($percentage >= 70 && $percentage <= 89)
                                Good
                            @elseif($percentage >= 50 && $percentage <= 69)
                                Average
                            @else
                                Fail
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection