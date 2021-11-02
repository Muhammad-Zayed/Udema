<nav id="menu" class="main-menu">
    <ul>
        <li><span><a href="{{route('main')}}">Home</a></span>
        </li>
        <li><span><a href="{{route('courses.index')}}">Courses</a></span>
        </li>
        <li><span><a href="{{route('categories.index')}}">Categories</a></span>
        </li>
        </li>
        @if(auth()->check())
            <li>
                <span>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">Logout</a>
                </span>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif

            @if(!(auth()->check()))
                <li><span><a href="{{route('login')}}">
                    Login
                </a></span></li>
            @endif

    </ul>
</nav>
