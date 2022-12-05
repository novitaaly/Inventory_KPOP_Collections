<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
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
                            <h3>Album</h3>
                            <p class="text-subtitle text-muted">Album K-Pop</p>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary rounded-pill" href="album/tambah">TAMBAH</a>
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
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tittle</th>
                            <th>Idol Group</th>
                            <th>Type</th>
                            <th>Release Year</th>
                            <th>Photocard</th>
                            <th>Poster</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($albums as $album)
                            <tr>
                                <td>{{$album->ID_ALBUM}}</td>
                                <td>{{$album->ALBUM_TITTLE}}</td>
                                <td>{{$album->IDOL_GROUP}}</td>
                                <td>{{$album->ALBUM_TYPE}}</td>
                                <td>{{$album->RELEASE_YEAR}}</td>
                                <td>{{$album->jumlah_pc}}</td>
                                <td>{{$album->jumlah_poster}}</td>
                                <td>                                    
                                    <a href="album/ubah/{{$album->ID_ALBUM}}" class="btn btn-warning">
                                        EDIT
                                    </a>
                                    <a href="album/detail/{{$album->ID_ALBUM}}" class="btn btn-info">
                                        DETAIL
                                    </a>
                                    <a href="album/hapus/{{$album->ID_ALBUM}}" class="btn btn-danger">
                                        DELETE
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
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
    let jquery_datatable = $("#table1").DataTable()
</script>

    <script src="{{asset('assets/js/mazer.js')}}"></script>
</body>

</html>
