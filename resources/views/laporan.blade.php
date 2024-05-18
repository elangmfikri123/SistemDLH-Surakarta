@extends('layout.template')
@section('title', 'Laporan')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Daftar Laporan</h4>
                            <div class="buttons">
                                <a class="btn btn-success float-right" href="{{ url('/laporan/baru') }}">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="table1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center sorting_asc">No</th>
                                            <th>No. Laporan</th>
                                            <th>Perusahaan</th>
                                            <th>Jenis Sampling</th>
                                            <th>Tanggal Sampling</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                    @foreach ($laporan as $key => $lap)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $lap->kode }}</td>
                                            <td>{{ $lap->perusahaan->nib->nama_perusahaan }}</td>
                                            <td>{{ $lap->jenis_sampling }}</td>
                                            <td>{{ $lap->tanggal_sampling }}</td>
                                            @if ($lap->status_id == 1)
                                                <td><span class="badge badge-warning">{{ $lap->status->status }}</span>
                                                </td>
                                            @elseif ($lap->status_id == 2)
                                                <td><span class="badge badge-success">{{ $lap->status->status }}</span>
                                                </td>
                                            @elseif ($lap->status_id == 3)
                                                <td><span class="badge badge-danger">{{ $lap->status->status }}</span>
                                                </td>
                                            @endif
                                            <td>
                                                <div class="text center">
                                                    <a href="{{ url('laporan/' . $lap->id . '/detail') }}"
                                                        class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ url('laporan/' . $lap->id . '/edit') }}"
                                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button type="button" href="#" class="btn btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#deleteModal{{ $lap->id }}"><i
                                                            class="fa fa-trash"></i></button>
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
        </section>
    </div>



    @foreach ($laporan as $lap)
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal{{ $lap->id }}" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus laporan No.Registrasi {{ $lap->kode }}?</p>
                    </div>
                    <div class="modal-footer br">
                        <a href="{{ url('/admin/' . $lap->id . '/hapus') }}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
