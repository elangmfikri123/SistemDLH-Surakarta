@extends('admin.template')
@section('title', 'Daftar User')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar User</h1>
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
                            <h4 class="text-dark">Data User</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-md" id="table1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center sorting_asc">No</th>
                                            <th class="text-center">Nama User</th>
                                            <th class="text-center">Nama Perusahan</th>
                                            <th class="text-center">NIB</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $u)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-center">{{ $u->name }}</td>
                                                <td class="text-center">
                                                    {{ $u->nib ? $u->nib->nama_perusahaan : 'Tidak ada' }}</td>
                                                <td class="text-center">
                                                    {{ $u->nib ? $u->nib->no_izin : 'Tidak ada' }}</td>
                                                <td class="text-center">{{ $u->email }}</td>
                                                @if ($u->status == 'nonaktif')
                                                    <td class="text-center"><button
                                                            class="btn py-1 btn-danger aktifasi
                                                            aktifasi"
                                                            data-id="{{ $u->id }}">Non-Aktif</button>
                                                    </td>
                                                @elseif ($u->status == 'aktif')
                                                    <td class="text-center"><button class="btn py-1 btn-success aktifasi"
                                                            data-id="{{ $u->id }}">Aktif</button>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" href="#" class="btn btn-danger"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal{{ $u->id }}"><i
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

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/tambah') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">Nama</label>
                            <input id="first_name" type="text" class="form-control" name="name" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control pwstrength"
                                data-indicator="pwindicator" name="password">
                            <div id="pwindicator" class="pwindicator">
                                <div class="bar"></div>
                                <div class="label"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password Konfirmasi</label>
                            <input type="password" class="form-control" id="password_confirmasi" name="password_confirmasi">
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                <label class="custom-control-label" for="agree">I agree with the terms and
                                    conditions</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer br">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($users as $u)
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal{{ $u->id }}"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Laboratorium</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus {{ $u->name }}?</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <a href="{{ url('/admin/' . $u->id . '/user-delete') }}" class="btn btn-danger">Hapus</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('status'))
            Swal.fire('Update Sukses!', '{{ session('status') }}', 'success');
        @endif
        $(document).on('click', '.aktifasi', function() {
            var id = $(this).attr("data-id");
            Swal.fire({
                title: "Ubah Status User?",
                text: "ID User : " + id,
                icon: "question",
                confirmButtonColor: "#47c363",
                confirmButtonText: "Ubah",
                cancelButtonText: "Batal",
                showCancelButton: true,
            }).then((result) => {
                window.location = window.location.href + '/' + id + '/aktifasi';
            });
        });
    </script>
@endsection
