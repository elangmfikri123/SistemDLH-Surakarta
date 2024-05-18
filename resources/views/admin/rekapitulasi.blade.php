@extends('admin.template')
@section('title', 'Daftar Laporan')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Rekapitulasi Bulanan</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Perusahaan Sudah Melaporkan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table1" id="table1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center sorting_asc">No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Status</th>
                                            <th>Laporan</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                    @foreach ($perusahaan as $key => $p)
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $p->nib->nama_perusahaan }}</td>
                                        <td>{{ date_format(date_create($p->created_at), 'F') }}</td>
                                        <td>{{ date_format(date_create($p->created_at), 'Y') }}</td>
                                        <td><span class="badge badge-success">Sudah Melaporkan</span></td>
                                        <td>
                                            <div class="dropdown d-inline mr-2">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    Laporan
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start"
                                                    style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    @foreach ($p->laporan as $laporan)
                                                        <a class="dropdown-item"
                                                            href="{{ url('admin/laporan/' . $laporan->id . '/detail') }}">{{ $laporan->jenis_sampling }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Perusahaan Belum Melaporakan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table1" id="table1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center sorting_asc">No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                    @foreach ($perusahaan_no as $key => $p)
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $p->nib->nama_perusahaan }}</td>
                                        <td>{{ date_format(date_create($p->created_at), 'F') }}</td>
                                        <td>{{ date_format(date_create($p->created_at), 'Y') }}</td>
                                        <td><span class="badge badge-danger">Belum Melaporkan</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
