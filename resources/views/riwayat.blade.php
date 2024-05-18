@extends('layout.template')
@section('title', 'Riwayat Laporan')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Riwayat Laporan</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Riwayat Laporan</h4>
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
                                                </div>
                                            </td>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

@endsection
