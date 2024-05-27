<!-- need to remove -->
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

<!-- <li class="nav-item">
    <a href="{{ route('results.index') }}" class="nav-link {{ Request::is('results*') ? 'active' : '' }}">
        <i class="fa-regular fa-square-poll-vertical"></i>
        <p>Results</p>
    </a> -->
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
<li class="nav-item">
    <a href="{{ route('quizzes.index') }}" class="nav-link {{ Request::is('quiz-setting-index*') ? 'active' : '' }}">
    <i class="fas fa-solid fa-clipboard"></i>
        <p>Quiz Category</p>
    </a>
</li>


