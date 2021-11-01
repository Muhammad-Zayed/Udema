<!-- Main -->
<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
<li ><a href="{{route('dashboard.home')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
<li>
    <a href="#"><i class="icon-users4"></i> <span>Users</a>
    <ul>
        <li><a href="{{route('dashboard.users.index')}}">All Users</a></li>
        <li><a href="{{route('dashboard.users.create')}}">Add New User</a></li>
    </ul>
</li>

<li>
    <a href=""> <i class="icon-cart-add "></i><span>Categories</a>
    <ul>
        <li><a href="{{route('dashboard.categories.index')}}">All Categories</a></li>
        <li><a href="{{route('dashboard.categories.create')}}">Add New Category</a></li>
    </ul>
</li>

<li>
    <a href="#"> <i class="icon-cart"></i><span>Courses</a>
    <ul>
        <li><a href="{{route('dashboard.courses.index')}}">All Courses</a></li>
        <li><a href="{{route('dashboard.courses.create')}}">Add New Course</a></li>
    </ul>
</li>