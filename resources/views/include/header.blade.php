<header class="header text-center">	   
    @auth
        <h1 class="blog-name pt-lg-4 mb-0"><a href="index.html">{{ auth()->user()->username; }}</a></h1>
    @endauth 
    
    <nav class="navbar navbar-expand-lg navbar-dark" >
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navigation" class="collapse navbar-collapse flex-column" >
            @auth    
            <div class="profile-section pt-3 pt-lg-0">
                <div class="bio mb-3">{{ auth()->user()->email }}</div>
                <hr> 
            </div>
            
            <ul class="navbar-nav flex-column text-left">
                <li class="nav-item {{ Request::is('/') ? 'active': ''}}">
                    <a class="nav-link" href="{{ route('index') }}"><i class="fas fa-home fa-fw mr-2"></i>Blog Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('/blog-index') ? 'active': ''}}">
                    <a class="nav-link" href="{{ route('blogIndex') }}"><i class="fas fa-bookmark fa-fw mr-2"></i> My Blog Post</a>
                </li>
                <li class="nav-item {{ Request::is('/blog-create') ? 'active': ''}}">
                    <a class="nav-link" href="{{ route('createBlog') }}"><i class="fas fa-plus fa-fw mr-2"></i> Create Blog Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-user fa-fw mr-2"></i>LogOut</a>
                </li>
            </ul>
            @endauth
            @guest
            <div class="my-2 my-md-3">
                <a class="btn btn-primary" href="{{ route('getLoginPage') }}">Login</a>
            </div>
            <div class="my-2 my-md-3">
                <a class="btn btn-primary" href="{{ route('getRegisterPage') }}">Register</a>
            </div>
            @endguest
        </div>
    </nav>
</header>