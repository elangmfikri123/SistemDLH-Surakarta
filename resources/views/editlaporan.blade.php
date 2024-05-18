@extends('layout.template')
@section('title', 'Form Edit Laporan')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Laporan </h1>
                {{-- {{ dd($laporan) }} --}}
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Form Hasil Sampling</h4>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" value="1" name="status_id" class="form-control">
                                <input class="form-control" name="kode" type="hidden" value="{{ $kode }}">

                                <div class="form-group row mb-4">
                                    <label for="perusahaan"
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                        Perusahaan</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input id="perusahaan" type="text" required="required" class="form-control boxed"
                                            value="{{ $perusahaan->nib->nama_perusahaan }}" readonly>
                                        <input id="perusahaan" name="perusahaan_id" type="hidden" required="required"
                                            class="form-control boxed" value="{{ $perusahaan->id }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="laboratorium-option"
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Laboratorium</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select id="laboratorium-option" name="laboratorium_id" class="form-control"
                                            class="custom-select" required>
                                            <option value="" disabled selected>Pilih Laboratorium</option>
                                            @foreach ($lab as $id => $nama_lab)
                                                <option value="{{ $id }}"
                                                    {{ $id == $laporan->laboratorium_id ? 'selected' : '' }}>
                                                    {{ $nama_lab }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Petugas
                                        Sampling</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input name="nama_petugas" type="text" class="form-control"
                                            value="{{ $laporan->nama_petugas }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="sampling-option"
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi
                                        Sampling</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select id="sampling-option" name="jenis_sampling" class="form-control"
                                            class="custom-select">
                                            <option selected>Pilih Lokasi</option>
                                            <option value="Inlet"
                                                {{ $laporan->jenis_sampling == 'Inlet' ? 'selected' : '' }}>Inlet</option>
                                            <option value="Outlet"
                                                {{ $laporan->jenis_sampling == 'Outlet' ? 'selected' : '' }}>Outlet</option>
                                            <option value="Titik Pantau"
                                                {{ $laporan->jenis_sampling == 'Titik Pantau' ? 'selected' : '' }}>Titik
                                                Pantau</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Sampel
                                        Air</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input name="parameter" type="text" class="form-control"
                                            value="{{ $laporan->parameter }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
                                        Sampling</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input name="tanggal_sampling" type="date" class="form-control"
                                            value="{{ $laporan->tanggal_sampling }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload File Hasil
                                        Sampling (Pdf,Doc,Docx)</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input name="filescan_laporan" type="file" class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Debit Air Limbah (Inlet)</label>
                                        <input type="text" class="form-control" name="jmlh_inlet"
                                            value={{ $laporan->jmlh_inlet }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Debit Air Limbah (Outlet)</label>
                                        <input type="text" class="form-control" name="jmlh_outlet"
                                            value={{ $laporan->jmlh_outlet }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Debit Air Baku</label>
                                        <input type="text" class="form-control" name="jmlh_debit"
                                            value={{ $laporan->jmlh_debit }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>pH</label>
                                        <input type="text" class="form-control" name="jmlh_ph"
                                            value={{ $laporan->jmlh_ph }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Suhu</label>
                                        <input type="text" class="form-control" name="jmlh_suhu"
                                            value={{ $laporan->jmlh_suhu }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>TSS</label>
                                        <input type="text" class="form-control" name="jmlh_tss"
                                            value={{ $laporan->jmlh_tss }}>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>TDS</label>
                                        <input type="text" class="form-control" name="jmlh_tds"
                                            value={{ $laporan->jmlh_tds }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>COD</label>
                                        <input type="text" class="form-control" name="jmlh_cod"
                                            value={{ $laporan->jmlh_cod }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>BOD</label>
                                        <input type="text" class="form-control" name="jmlh_bod"
                                            value={{ $laporan->jmlh_bod }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Amoniak (NH₃₋N)</label>
                                        <input type="text" class="form-control" name="jmlh_amoniak"
                                            value={{ $laporan->jmlh_amoniak }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Minyak & Lemak</label>
                                        <input type="text" class="form-control" name="jmlh_minyak"
                                            value={{ $laporan->jmlh_minyak }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Total Coliform</label>
                                        <input type="text" class="form-control" name="jmlh_caliform"
                                            value={{ $laporan->jmlh_caliform }}>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Bakteri Coliform</label>
                                        <input type="text" class="form-control" name="jmlh_bakteri"
                                            value={{ $laporan->jmlh_bakteri }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>MBAS</label>
                                        <input type="text" class="form-control" name="jmlh_mbas"
                                            value={{ $laporan->jmlh_mbas }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Sulfida ( S )</label>
                                        <input type="text" class="form-control" name="jmlh_sulfida"
                                            value={{ $laporan->jmlh_sulfida }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Nitrat (NO3-N)</label>
                                        <input type="text" class="form-control" name="jmlh_nitrat"
                                            value={{ $laporan->jmlh_nitrat }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Nitrit (NO2-N)</label>
                                        <input type="text" class="form-control" name="jmlh_nitrit"
                                            value={{ $laporan->jmlh_nitrit }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Phosphat (PO4-P)</label>
                                        <input type="text" class="form-control" name="jmlh_pshospat"
                                            value={{ $laporan->jmlh_pshospat }}>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Fenol Total</label>
                                        <input type="text" class="form-control" name="jmlh_fenol"
                                            value={{ $laporan->jmlh_fenol }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Khrom Total (Cr)</label>
                                        <input type="text" class="form-control" name="jmlh_khorm"
                                            value={{ $laporan->jmlh_khorm }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Seng (ZN)</label>
                                        <input type="text" class="form-control" name="jmlh_seng"
                                            value={{ $laporan->jmlh_seng }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Klorida</label>
                                        <input type="text" class="form-control" name="jmlh_klorida"
                                            value={{ $laporan->jmlh_klorida }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Klor Bebas</label>
                                        <input type="text" class="form-control" name="jmlh_klor"
                                            value={{ $laporan->jmlh_klor }}>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Fluorida (F)</label>
                                        <input type="text" class="form-control" name="jmlh_fluorida"
                                            value={{ $laporan->jmlh_fluorida }}>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Warna</label>
                                        <input type="text" class="form-control" name="jmlh_warna"
                                            value={{ $laporan->jmlh_warna }}>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Jumlah Produksi</label>
                                        <input type="text" class="form-control" name="jmlh_produksi"
                                            value={{ $laporan->jmlh_produksi }}>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Jumlah Hunian</label>
                                        <input type="text" class="form-control" name="jmlh_hunian"
                                            value={{ $laporan->jmlh_hunian }}>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Jumlah Bed</label>
                                        <input type="text" class="form-control" name="jmlh_bed"
                                            value={{ $laporan->jmlh_bed }}>
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-lg btn-success" type="submit">Perbarui</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
