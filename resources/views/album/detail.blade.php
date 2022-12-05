<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Album</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/all.min.css')}}">
    <style>
        table.dataTable td{
            padding: 15px 8px;
        }
        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>
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
                            <h3>Detail Album</h3>
                            <p class="text-subtitle text-muted">Album K-Pop</p>
                        </div>
                        
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Album</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Album</li>
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
                        <h4 class="card-title">Detail Album</h4>
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
                            <div class="row">
                                <div class="col-6">
                                    <h6>Tittle</h6>
                                    <p>{{$album->ALBUM_TITTLE}}</p>
                                </div>
                                <div class="col-6">
                                    <h6>Idol Group</h6>
                                    <p>{{$album->IDOL_GROUP}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6>Type</h6>
                                    <p>{{$album->ALBUM_TYPE}}</p>
                                </div>
                                <div class="col-6">
                                    <h6>Release Year</h6>
                                    <p>{{$album->RELEASE_YEAR}}</p>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h1 class="text-center">Photo Card</h1>
                                    @if ($message = Session::get('success_pc'))
                                        <div class="alert alert-success mx-4">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('fail_pc'))
                                        <div class="alert alert-danger mx-4">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Member</th>
                                                    <th>Idol Group</th>
                                                    <th>Type</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pcs as $pc)
                                                    <tr>
                                                        <td>{{$pc->ID_PC}}</td>
                                                        <td>{{$pc->MEMBER}}</td>
                                                        <td>{{$pc->IDOL_GROUP}}</td>
                                                        <td>{{$pc->PC_TYPE}}</td>
                                                        <td>
                                                            <a href="{{url("pc/ubah/".$pc->ID_PC)}}" class="btn btn-warning">
                                                                EDIT
                                                            </a>
                                                            <a href="{{url("pc/hapus/".$pc->ID_PC)}}" class="btn btn-danger">
                                                                DELETE
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <a class="btn btn-primary rounded-pill" href="{{url("pc/tambah/$album->ID_ALBUM")}}">TAMBAH PHOTO CARD</a>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h1 class="text-center">Poster</h1>
                                    @if ($message = Session::get('success_poster'))
                                        <div class="alert alert-success mx-4">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('fail_poster'))
                                        <div class="alert alert-danger mx-4">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table" id="table2">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Member</th>
                                                    <th>Idol Group</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($posters as $poster)
                                                    <tr>
                                                        <td>{{$poster->ID_POSTER}}</td>
                                                        <td>{{$poster->MEMBER}}</td>
                                                        <td>{{$poster->IDOL_GROUP}}</td>
                                                        <td>
                                                            <a href="{{url("poster/ubah/".$poster->ID_POSTER)}}" class="btn btn-warning">
                                                                EDIT
                                                            </a>
                                                            <a href="{{url("poster/hapus/".$poster->ID_POSTER)}}" class="btn btn-danger">
                                                                DELETE
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <a class="btn btn-primary rounded-pill" href="{{url("poster/tambah/$album->ID_ALBUM")}}">TAMBAH POSTER</a>
                                </div>
                            </div>
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
    
<script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendors/fontawesome/all.min.js')}}"></script>
<script>
    // Jquery Datatable
    let jquery_datatable1 = $("#table1").DataTable()
    let jquery_datatable2 = $("#table2").DataTable()
</script>

    <script src="{{asset('assets/js/mazer.js')}}"></script>
</body>

</html>
