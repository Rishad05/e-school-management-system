<header>
    <div class="navbar navbar-dark bg-dark shadow-sm  navbar-expand-lg ">
        <div class=" container-fluid ">
            {{-- {{route('homepage')}} --}}
            {{-- <a href="" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>Kodeeo</strong>
            </a> --}}


                  <a class="navbar-brand" href="#">E-school</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto   ">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('viewAllCourse')}}">Courses</a>
                      </li>
                        <li>
                            @auth()
                            <a href="{{route('userProfile')}}" class="btn btn-info">My Profile</a>  <a class="btn btn-primary" href="{{route('userLogout')}}"> Logout</a>
                        @else
                            <a class="btn btn-primary" href="{{route('login.registration.form')}}">Login / Registration</a>
                        @endauth
                        </li>

                      <li class="nav-item">
                        <a class="nav-link" href="#">Feedback</a>
                      </li>

                    </ul>
                  </div>

        </div>
    </div>
</header>
