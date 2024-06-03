<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('questions.index') }}" class="nav-link {{ Request::is('questions*') ? 'active' : '' }}">
        <i class="fa-solid fa-question"></i>
        <p>Questions</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('answers.index') }}" class="nav-link {{ Request::is('answers*') ? 'active' : '' }}">
        <i class="fa-solid fa-a"></i>
        <p>Answers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('quiz.start') }}" class="nav-link {{ Request::is('quiz*') ? 'active' : '' }}">
        <i class="fas fa-solid fa-feather"></i>
        <p>Quiz</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('all.user.results') }}" class="nav-link {{ Request::is('results*') ? 'active' : '' }}">
        <i class="fas fa-regular fa-star"></i>
        <p>Results</p>
    </a>
</li>
<!-- <li class="nav-item">
    <a href="{{ route('videos.store') }}" class="nav-link {{ Request::is('videos*') ? 'active' : '' }}">
        <i class="fas fa-regular fa-star"></i>
        <p>Learning Materials</p>
    </a>
</li> -->
<li class="nav-item">
    <a href="{{ route('media.index') }}" class="nav-link {{ Request::is('media*') ? 'active' : '' }}">
    <i class="fas fa-regular fa-star"></i>
        <p>Learning Materials</p>
    </a>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle {{ Request::is('quiz-setting-index*') ? 'active' : '' }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-solid fa-clipboard"></i>
        <p>Quiz Category </p>
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('quizzes.index') }}">Grade 1</a>
        <a class="dropdown-item" href="{{ route('quizzes.index') }}">Grade 2</a>
        <a class="dropdown-item" href="{{ route('quizzes.index') }}">Grade 3</a>
        <a class="dropdown-item" href="{{ route('quizzes.index') }}">Grade 4</a>
        <a class="dropdown-item" href="{{ route('quizzes.index') }}">Grade 5</a>
        <a class="dropdown-item" href="{{ route('quizzes.index') }}">Grade 6</a>
        <a class="dropdown-item" href="{{ route('quizzes.index') }}">Grade 7</a>
        <a class="dropdown-item" href="{{ route('quizzes.index') }}">Grade 8</a>
    </div>
</li>

<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom CSS for the navigation -->
<style>
    .nav-item.dropdown .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #343a40;
        color: white;
        border: none;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        margin-top: 0;
    }

    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-item {
        color: white;
        padding: 10px 20px;
        transition: background-color 0.2s;
    }

    .dropdown-item:hover {
        background-color: #495057;
        color: white;
    }

    .dropdown-item:focus, .dropdown-item:active {
        background-color: #6c757d;
        color: white;
    }
</style>


