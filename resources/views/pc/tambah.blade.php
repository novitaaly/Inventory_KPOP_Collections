<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Photo Card</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{url("/album")}}"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo" srcset="" style="width: 150px; height:150px"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item  active">
                            <a href="{{url("/album")}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Album</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{url("/logout")}}" class='sidebar-link'>
                                <i class="bi bi-door-open"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tambah Photocard</h3>
                            <p class="text-subtitle text-muted">Photocard K-Pop</p>
                        </div>
                        
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Album</a></li>
                                    <li class="breadcrumb-item"><a href="{{url("album/detail/".$id_album)}}">Detail Album</a></li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Photocard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Photocard</h4>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success mx-4">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('fail'))
                        <div class="alert alert-danger mx-4">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="member">Member</label>
                                                <input type="text"  class="form-control" id="member" name="member" placeholder="Member" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="idol">Idol Group</label>
                                                <input type="text"  class="form-control" id="idol" name="idol" placeholder="Idol Group" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <input type="text"  class="form-control" id="type" name="type" placeholder="Type" required>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2022 &copy; </p>
            </div>
            <div class="float-end">
                <p>Inventory K-pop Collection</p>
            </div>
        </div>
    </footer>
        </div>
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/mazer.js')}}"></script>
</body>

</html>
