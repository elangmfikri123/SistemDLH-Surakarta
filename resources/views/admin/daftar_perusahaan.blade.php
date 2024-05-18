@extends('admin.template')
@section('title', 'Daftar Perusahaan')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Perusahaan</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Daftar Perusahaan</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center sorting_asc">No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Alamat</th>
                                            <th>Kelurahan</th>
                                            <th>Telfon</th>
                                            <th>Berkas</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                    @foreach ($perusahaan as $key => $p)
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $p->nib->nama_perusahaan }}</td>
                                        <td>{{ $p->alamat_perusahaan }}</td>
                                        <td>{{ $p->kelurahan->nama_kelurahan }}</td>
                                        <td>{{ $p->telf_perusahaan }}</td>
                                        <td>
                                            <a href="{{ url('/download', $p->filescan_perusahaan) }}"><button type="button"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-download"></i>Download
                                                </button></a>
                                        </td>
                                        @if ($p->status_id == 1)
                                            <td><span class="badge badge-warning">{{ $p->status->status }}</span></td>
                                        @elseif ($p->status_id == 2)
                                            <td><span class="badge badge-success">{{ $p->status->status }}</span></td>
                                        @elseif ($p->status_id == 3)
                                            <td><span class="badge badge-danger">{{ $p->status->status }}</span></td>
                                        @endif
                                        <td>
                                            <div class="text-center">
                                                <button type="button" href="#" class="btn btn-primary"
                                                    data-toggle="modal" data-target="#detailModal{{ $p->id }}"><i
                                                        class="fa fa-eye"></i></button>
                                                <button type="button" href="#" class="btn btn-danger"
                                                    data-toggle="modal" data-target="#deleteModal{{ $p->id }}"><i
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

    @foreach ($perusahaan as $p)
        <div class="modal fade" tabindex="-1" role="dialog" id="detailModal{{ $p->id }}" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-3" style="max-width: none;">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Pimpinan/Pemilik</h5>
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <th class="col-2" scope="col">Nama Pemilik</th>
                                                    <td>{{ $p->pimpinan->nama_pimpinan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-2" scope="col">Alamat</th>
                                                    <td>{{ $p->pimpinan->alamat_pimpinan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">No. Handphone</th>
                                                    <td>{{ $p->pimpinan->telf_pimpinan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Email</th>
                                                    <td>{{ $p->pimpinan->email_pimpinan }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3" style="max-width: none;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('fotoperusahaan/' . $p->foto_perusahaan) }}" style="width: 100%"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Perusahaan</h5>
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <th class="col-5" scope="col">No. Izin Kegiatan Usaha</th>
                                                    <td>{{ $p->nib->no_izin }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Nama Perusahaan</th>
                                                    <td>{{ $p->nib->nama_perusahaan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Alamat Lengkap</th>
                                                    <td>{{ $p->alamat_perusahaan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Kelurahan</th>
                                                    <td>{{ $p->kelurahan->nama_kelurahan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Kecamatan</th>
                                                    <td>{{ $p->kecamatan->nama_kecamatan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Bidang</th>
                                                    <td>{{ $p->bidang->nama_bidang }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Email</th>
                                                    <td>{{ $p->email_perusahaan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">No. Handphone</th>
                                                    <td>{{ $p->telf_perusahaan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Penanggung Jawab PPA</th>
                                                    <td>{{ $p->personil_ppa }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Penanggung Jawab IPAL</th>
                                                    <td>{{ $p->personil_ipal }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Titik Koordinat Perusahaan</th>
                                                    <td>{{ $p->tikor_perusahaan }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Titik Koordinat IPAL</th>
                                                    <td>{{ $p->tikor_ipal }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Titik Koordinat OUTFALL</th>
                                                    <td>{{ $p->tikor_oval }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-5" scope="col">Titik Koordinat PANTAU</th>
                                                    <td>{{ $p->tikor_pantau }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/status_setuju/{{ $p->id }}" type="button" class="btn btn-success">Setujui</a>
                        <a href="/status_tolak/{{ $p->id }}" type="button" class="btn btn-danger">Tolak</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach

    @foreach ($perusahaan as $p)
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal{{ $p->id }}"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus {{ $p->nama_perusahaan }} ?</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <a href="{{ url('/admin/' . $p->id . '/perusahaan-delete') }}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
