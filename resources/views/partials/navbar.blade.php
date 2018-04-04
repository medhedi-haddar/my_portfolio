


<nav class="navbar navbar-expand-lg navbar navbar-dark initial fixed-top">

    <a class="navbar-brand" href="#">
    The illusionist
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
        <ul class="navbar-nav ">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About me</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Work</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="#" alt="skills">Skills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Career</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            @if(Auth::check())
                <li class="nav-item"><a class="btn btn-outline-info btn-sm ml-2 my-2 my-sm-0 nav-link" href="{{route('portfolio.index')}}">Dashboard</a></li>
                <li class="nav-item"><a class="btn btn-outline-danger btn-sm ml-2 my-2 my-sm-0 nav-link" href="{{route('logout')}}"
                                        onclick="event.preventDefault();
                    document.getElementById('logout.form').submit();">Logout</a></li>
                <form id="logout.form" action="{{route('logout')}}" method="post" style="display: none;">
                    {{csrf_field()}}
                </form>
            @endif
        </ul>

    </div>
</nav>