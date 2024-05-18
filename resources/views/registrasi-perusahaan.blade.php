@extends('layout.template')
@section('title', 'Form Registrasi Perusahaan')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Registrasi Perusahaan</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Form Registrasi Perusahaan</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('/store-perusahaan') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="1" name="status_id" class="form-control">
                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-5">
                                        <label>No Izin Kegiatan Usaha (NIB)</label>
                                        <input name="no_izin" type="text" class="form-control"
                                            value="{{ $nib->no_izin }}" readonly>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Nama Perusahaan</label>
                                        <input name="nama_perusahaan" type="text" class="form-control"
                                            value="{{ $nib->nama_perusahaan }}" readonly>
                                    </div>
                                </div>

                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-5">
                                        <label>Kecamatan</label>
                                        <select name="kecamatan_id" id="kecamatan" class="form-control" required>
                                            <option value="" disabled selected>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Kelurahan</label>
                                        <select name="kelurahan_id" id="kelurahan" class="form-control" disabled>
                                            <option value="" disabled selected>Pilih Kelurahan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row justify-content-around">

                                    <div class="form-group col-md-5">
                                        <label>Alamat Lengkap</label>
                                        <textarea name="alamat_perusahaan" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Bidang</label>
                                        <select name="bidang_id" class="form-control" required>
                                            <option selected>Pilih Bidang</option>
                                            @foreach ($bidang as $id => $nama_bidang)
                                                <option value="{{ $id }}">{{ $nama_bidang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-5">
                                        <label>Email Perusahaan</label>
                                        <input name="email_perusahaan" type="email" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>No Handphone Perusahaan</label>
                                        <input name="telf_perusahaan" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-5">
                                        <label>Penanggung Jawab PPA</label>
                                        <input name="personil_ppa" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Penanggung Jawab IPAL</label>
                                        <input name="personil_ipal" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-5">
                                        <label>Titik Koordinat Perusahaan</label>
                                        <input name="tikor_perusahaan" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>TitiK Koordinat IPAL</label>
                                        <input name="tikor_ipal" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-5">
                                        <label>Titik Koordinat OUTFALL</label required>
                                        <input name="tikor_oval" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>TitiK Koordinat PANTAU</label>
                                        <input name="tikor_pantau" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-5">
                                        <label>File Berkas NIB (Pdf,Doc)</label>
                                        <input name="filescan_perusahaan" type="file" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Foto Perusahaan (Png,Jpg,Jpeg)</label>
                                        <input name="foto_perusahaan" type="file" class="form-control" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script>
        $(document).ready(function() {
            load_data('kecamatan');

            function load_data(type, category_id = '') {
                $('#' + type).html('<option value="">Pilih ' + type + ' (memuat)</option>');
                console.log('Load Data: ' + category_id);
                $.ajax({
                    url: "lokasi-administrasi",
                    method: "POST",
                    data: {
                        type: type,
                        category_id: category_id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '';
                        console.log(data);

                        if (type == 'kecamatan') {
                            html += '<option value="" selected disabled>Pilih ' + type + '</option>';
                            $.each(data.data, function(key, value) {
                                html += '<option value="' + value.id + '">' + value
                                    .nama_kecamatan + '</option>';
                            });
                            $('#kecamatan').html(html);
                            console.log('kecamatan loaded');
                        } else if (type == 'kelurahan') {
                            html += '<option value="" selected disabled>Pilih ' + type + '</option>';
                            $.each(data.data, function(key, value) {
                                html += '<option value="' + value.id + '">' + value
                                    .nama_kelurahan + '</option>';
                            });
                            $('#kelurahan').html(html);
                            console.log('kelurahan loaded');
                        } else {
                            console.log('waduh ndak tau saya');
                        }
                    }
                })
            }
            $(document).on('change', '#kecamatan', function() {
                var category_id = $('#kecamatan').val();
                load_data('kelurahan', category_id);
                $("#kelurahan").prop("disabled", false);
            });
        });
    </script>
@endsection
