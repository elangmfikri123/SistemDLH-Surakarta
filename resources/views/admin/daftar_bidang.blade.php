@extends('admin.template')
@section('title', 'Daftar Bidang')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Bidang</h1>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Daftar Bidang</h4>
                            <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa fa-plus"></i> Tambah
                            </button> &nbsp
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center sorting_asc">No</th>
                                            <th class="text-center">Nama Bidang</th>
                                            <th class="text-center">Jumlah Perusahaan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bidang as $key => $b)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-center">{{ $b->nama_bidang }}</td>
                                                <td class="text-center">{{ $b->perusahaan->count() }}</td>
                                                <td class="text-center">
                                                    <div class="text-center">
                                                        <button type="button" href="#" class="btn btn-primary"
                                                            data-toggle="modal"
                                                            data-target="#detailModal{{ $b->id }}"><i
                                                                class="fa fa-eye"></i></button>
                                                        <button type="button" href="#" class="btn btn-warning"
                                                            data-toggle="modal"
                                                            data-target="#updateModal{{ $b->id }}"><i
                                                                class="far fa-edit"></i></button>
                                                        <button type="button" href="#" class="btn btn-danger"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal{{ $b->id }}"><i
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

    {{-- modal create --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/bidang') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Bidang</label>
                            <input name="nama_bidang" type="text" class="form-control" placeholder="Nama Bidang">
                        </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    @foreach ($bidang as $b)
        <div class="modal fade" tabindex="-1" role="dialog" id="updateModal{{ $b->id }}" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Bidang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/' . $b->id . '/bidang') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama Bidang</label>
                                <input name="nama_lab" type="text" class="form-control" placeholder="Nama Laboratorium"
                                    value="{{ $b->nama_bidang }}">
                            </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($bidang as $b)
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal{{ $b->id }}"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Bidang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus {{ $b->nama_bidang }}?</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <a href="{{ url('/admin/' . $b->id . '/bidang-delete') }}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($bidang as $b)
        <div class="modal fade" tabindex="-1" role="dialog" id="detailModal{{ $b->id }}"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Daftar Perusahaan Bidang </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="col-md">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center sorting_asc">No</th>
                                    <th class="text-center">Nama Perusahaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($b->perusahaan as $key => $perusahaan)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-center">{{ $perusahaan->nib->nama_perusahaan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
