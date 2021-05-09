<nav id="sidebarMenu" style="Background-color:lightseagreen" class="col-md-3 col-lg-2 d-md-block sidebar collapse background ">
    <div class="position-sticky pt-3 ">

        <ul class="nav flex-column item-hover ">
            @if (auth()->user()->role == 'admin')
                <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href="{{route('dashboard')}}">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href="{{route('enrollingCourseList')}}">
                        <i class="fas fa-list"></i>
                        Enrolling Course List
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{route('course')}}">
                        <i class="far fa-file-alt"></i>
                        Courses
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{route('submittedAssignment')}}">
                        <i class="fas fa-list"></i>
                        Submitted Assignment List
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{route('lesson')}}">
                        <i class="far fa-file-alt"></i>
                      Lessons
                    </a>

                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{route('student')}}">
                        <i class="fas fa-user-graduate"></i>
                        Students
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{route('topic')}}">
                        <i class="fas fa-play-circle"></i>
                        Topics
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{route('assignment')}}">
                        <i class="fab fa-adn"></i>
                        Assignment
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{route('author')}}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Author
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href={{route('report')}}>
                        <i class="fas fa-chart-bar"></i>
                      Sell Reports
                    </a>
                  </li>
            @endif
        </ul>
    </div>
</nav>
