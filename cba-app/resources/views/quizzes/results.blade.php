@extends('layouts.app')

@section('content')
    <div class="container">
    <h1 class="text-center text-success">Results</h1>
    <table class="table table-bordered " >
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
        <td>
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