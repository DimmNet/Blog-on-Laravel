<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/">Home</a>
            <a class="nav-link" href="/posts/create">New post</a>

            @if (Auth::check())
                <a class="nav-link ml-auto" href="/logout">{{ Auth::user()->name }}</a>
            @else
                <a class="nav-link ml-auto" href="/login">Sign In</a>
                <a class="nav-link" href="/register">Registration</a>
            @endif
        </nav>
    </div>
</div>