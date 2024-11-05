<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
     data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ url('admin') }}">Pages</a>
                </li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $slot }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $slot }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="" class="nav-link text-white font-weight-bold px-0">
                        <img width="32" height="32" class="rounded-circle me-1"
                             src="{{ \Illuminate\Support\Facades\Auth::user()->filename != null ? asset('user/' . \Illuminate\Support\Facades\Auth::user()->filename) : asset('user/default-picture.png') }}">
                        <span class="d-sm-inline d-none">{{ \Illuminate\Support\Facades\Auth::user()->username }}</span>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center mx-3">
                    <a href="#" class="nav-link text-white p-0" id="dropdownMenuButton"
                       data-bs-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton"
                        data-bs-popper="static">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="{{ url('admin/profile') }}">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">Profile</span>
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="">
                            <form method="GET" action="{{ route('logout') }}" role="form">
                                @csrf
                                <button type="submit" class="dropdown-item border-radius-md">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">Logout</span>
                                            </h6>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
