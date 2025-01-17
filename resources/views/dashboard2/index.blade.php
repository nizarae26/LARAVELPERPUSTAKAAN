@extends('sbadmin2/app')
@section('title', 'Dashboard | Operator')
@section('active-dashboard', 'active')
@section('content')
    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div> --}}


        <div class="row">

            @if ($data)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Data Buku
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ $data->count() }}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width:{{ $data->count() }}%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            @if ($peminjaman)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Buku Belum
                                        Dikonfirmasi
                                    </div>
                                    <?php
                                    $countStatus0 = $peminjaman->where('status', 0)->count();
                                    ?>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ $countStatus0 }}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-secondary" role="progressbar"
                                                    style="width:{{ $countStatus0 }}%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($peminjaman)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Buku Yang Sedang
                                        Dipinjam
                                    </div>
                                    <?php
                                    $countStatus0 = $peminjaman->where('status', 1)->count();
                                    ?>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ $countStatus0 }}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width:{{ $countStatus0 }}%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($peminjaman)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Buku Yang Selesai
                                        Dipinjam
                                    </div>
                                    <?php
                                    $countStatus0 = $peminjaman->where('status', 2)->count();
                                    ?>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                {{ $countStatus0 }}</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width:{{ $countStatus0 }}%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif



            <div class="col-5 mb-3 ">
                <div class="card border-dark rounded shadow h-100 bg-white">
                    <div class="card-header bg-dark">
                        <h3 class="card-title mt-2 text-white">History Buku</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body bg-white rounded">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Buku</th>
                                    <th>Terakhir Ditambahkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($bukunew as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>
                                            {{ $item->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-4 mb-3 ">
                <div class="card border-dark rounded shadow h-100 bg-white">
                    <div class="card-body bg-white rounded">
                        <div>
                            {!! $chart->container() !!}
                        </div>
                        {!! $chart->script() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">

            <div class="col-lg-6">

                <!-- Default Card Example -->
                <div class="card mb-4">
                    <div class="card-header">
                        Default Card Example
                    </div>
                    <div class="card-body">
                        This card uses Bootstrap's default styling with no utility classes added. Global
                        styles are the only things modifying the look and feel of this default card example.
                    </div>
                </div>

                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                    </div>
                    <div class="card-body">
                        The styling for this basic card example is created by using default Bootstrap
                        utility classes. By using utility classes, the style of the card component can be
                        easily modified with no need for any custom CSS!
                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <!-- Dropdown Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="/electro-master/#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="/electro-master/#">Action</a>
                                <a class="dropdown-item" href="/electro-master/#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/electro-master/#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        Dropdown menus can be placed in the card header in order to extend the functionality
                        of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis
                        icon in the card header can be clicked on in order to toggle a dropdown menu.
                    </div>
                </div>

                <!-- Collapsable Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="/electro-master/#collapseCardExample" class="d-block card-header py-3"
                        data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            This is a collapsable card example using Bootstrap's built in collapse
                            functionality. <strong>Click on the card header</strong> to see the card body
                            collapse and expand!
                        </div>
                    </div>
                </div>

            </div>

        </div> --}}
    </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
