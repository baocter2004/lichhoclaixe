<nav class="navbar navbar-expand-lg bg-web">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Đào tạo ôtô
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Học bằng B1</a></li>
                        <li><a class="dropdown-item" href="#">Học bằng B2</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Đào tạo xe máy A1, A2
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Học lái xe máy A1 tại Hà Nội</a></li>
                        <li><a class="dropdown-item" href="#">Học lái xe máy A2 tại Hà Nội</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Luật giao thông</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kinh nghiệm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">App</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('client.students.index') }}" class="nav-link">Student</a>
                </li>
            </ul>
        </div>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>
