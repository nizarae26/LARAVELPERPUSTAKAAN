@extends('layouts.app')
@include('admin-lte/flash')
@section('buku')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard/peminjam') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" style="cursor: pointer" saria-haspopup="true" aria-expanded="false"
                            v-pre>
                            Kategori
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown"
                            style="cursor: pointer">
                            <a class="dropdown-item" href="/semuaBuku/">Semua Kategori</a>
                            <div class="dropdown-divider"></div>
                            @foreach ($kategori as $item)
                                <a class="dropdown-item" href="/pilihBuku/{{ $item->id }}">{{ $item->nama }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav ">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" style="cursor: pointer" saria-haspopup="true" aria-expanded="false"
                            v-pre>
                            Penerbit
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown"
                            style="cursor: pointer">
                            <a class="dropdown-item" href="/semuaPenerbit/">Semua Penerbit</a>
                            <div class="dropdown-divider"></div>
                            @foreach ($penerbit as $item)
                                <a class="dropdown-item" href="/pilihBuku/{{ $item->id }}">{{ $item->nama }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" style="cursor: pointer" saria-haspopup="true" aria-expanded="false"
                            v-pre>
                            Data
                        </a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown"
                            style="cursor: pointer">
                            <a class="dropdown-item" href="/detailPinjam">Data Pinjam</a>
                            {{-- <div class="dropdown-divider"></div>
                            @foreach ($kategori as $item)
                                <a class="dropdown-item" href="/pilihBuku/{{ $item->id }}">{{ $item->nama }}</a>
                            @endforeach --}}
                        </div>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                {{-- @foreach ($data as $item) --}}
                <h1>Detail Pinjam</h1>
                {{-- @endforeach --}}
            </div>
        </div>

        {{-- @if ($detailbuku)
            <div class="row">
                <div class="col-md-4">
                    <img src="/storage/{{$data->sampul}}" alt="">
                </div>
            </div>
        @endif --}}


        {{-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Peminjaman</h3>
            </div> --}}
        <!-- /.card-header -->
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-body rounded" style="background-color: white">
                    {{-- <div class="table-responsive rounded"> --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Peminjaman</th>
                                <th>Peminjam</th>
                                <th>Buku</th>
                                <th>Tanggal Pinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->kode_pinjam }}
                                    </td>
                                    <td> {{ $row->peminjam_id }}</td>
                                    <td> {{ $row->buku->judul }}</td>
                                    <td>{{ $row->tanggal_pinjam }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Peminjaman</th>
                                <th>Peminjam</th>
                                <th>Buku</th>
                                <th>Tanggal Pinjam</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="row justify-content-center">
                        <div>{{ $data->links() }}</div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>



            <!-- /.container-fluid -->

            <!-- /.card-body -->
        </div>






        <script>
            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                    return null;
                }
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
            integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
        <script src="/sbadmin2/sweetalert.min.js"></script>


        {{-- @include('admin-lte.script') --}}
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
        @include('sweetalert::alert')

        @stack('js')
        <!-- Bootstrap core JavaScript-->
        <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
            integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
        <script src="/sbadmin2/sweetalert.min.js"></script>

        <script src="/sbadmin2/vendor/jquery/jquery.min.js"></script>
        <script src="/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/sbadmin2/js/sb-admin-2.min.js"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="/sbadmin2/vendor/jquery/jquery.min.js"></script>
        <script src="/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/sbadmin2/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="/sbadmin2/js/demo/datatables-demo.js"></script>
    @endsection