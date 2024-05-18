@extends('admin.template')
@section('title', 'Input Form Batas Maksimum')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Batas Maksimum - {{ $laporan->kode }}</h1>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center py-2">Hasil Sampling</h5>
                            <div class="row">
                                <div class="col-sm-5 col-md-6">
                                    <table class="table table-bordered table-striped table-sm">
                                        <tbody>
                                            <tr>
                                                <th class="col-5" scope="col">Debit Air Limbah (Inlet)</th>
                                                <td>{{ $laporan->jmlh_inlet }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Debit Air Limbah (Outlet)</th>
                                                <td>{{ $laporan->jmlh_outlet }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Debit Air Baku</th>
                                                <td>{{ $laporan->jmlh_debit }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">pH</th>
                                                <td>{{ $laporan->jmlh_ph }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Suhu</th>
                                                <td>{{ $laporan->jmlh_suhu }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">TSS</th>
                                                <td>{{ $laporan->jmlh_tss }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">TDS</th>
                                                <td>{{ $laporan->jmlh_tds }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">BOD</th>
                                                <td>{{ $laporan->jmlh_bod }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">COD</th>
                                                <td>{{ $laporan->jmlh_cod }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Amoniak (NH₃₋N)</th>
                                                <td>{{ $laporan->jmlh_amoniak }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Minyak & Lemak</th>
                                                <td>{{ $laporan->jmlh_minyak }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Total Caliform</th>
                                                <td>{{ $laporan->jmlh_caliform }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Bakteri Caliform</th>
                                                <td>{{ $laporan->jmlh_bakteri }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">MBAS</th>
                                                <td>{{ $laporan->jmlh_mbas }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                    <table class="table table-bordered table-striped table-sm">
                                        <tbody>
                                            <tr>
                                                <th class="col-5" scope="col">Sulfida (S)</th>
                                                <td>{{ $laporan->jmlh_sulfida }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Nitrat (NO3-N)</th>
                                                <td>{{ $laporan->jmlh_nitrat }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Nitrit (NO2-N)</th>
                                                <td>{{ $laporan->jmlh_nitrit }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Phosphat (PO4-P)</th>
                                                <td>{{ $laporan->jmlh_pshospat }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Fenol Total</th>
                                                <td>{{ $laporan->jmlh_fenol }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Khrom Total (Cr)</th>
                                                <td>{{ $laporan->jmlh_khorm }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Seng (ZN)</th>
                                                <td>{{ $laporan->jmlh_seng }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Klorida</th>
                                                <td>{{ $laporan->jmlh_klorida }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Klor Bebas</th>
                                                <td>{{ $laporan->jmlh_klor }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Fluorida (F)</th>
                                                <td>{{ $laporan->jmlh_fluorida }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Warna</th>
                                                <td>{{ $laporan->jmlh_warna }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Jumlah Produksi</th>
                                                <td>{{ $laporan->jmlh_produksi }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Jumlah Hunian</th>
                                                <td>{{ $laporan->jmlh_hunian }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Jumlah Bed</th>
                                                <td>{{ $laporan->jmlh_bed }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Form Maksimum Kadar</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">pH
                                    </label>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_ph[bawah]" type="text" class="form-control"
                                            placeholder="Batas Minimum">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_ph[atas]" type="text" class="form-control"
                                            placeholder="Batas Maksimum">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Suhu</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_suhu[bawah]" type="text" class="form-control"
                                            placeholder="Batas Minimum">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_suhu[atas]" type="text" class="form-control"
                                            placeholder="Batas Maksimum">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amoniak
                                        (NH₃₋N)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_amoniak[bawah]" type="text" class="form-control"
                                            placeholder="Batas Minimum">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_amoniak[atas]" type="text" class="form-control"
                                            placeholder="Batas Maksimum">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phosphat
                                        (PO4-P)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_pshospat[bawah]" type="text" class="form-control"
                                            placeholder="Batas Minimum">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_pshospat[atas]" type="text" class="form-control"
                                            placeholder="Batas Maksimum">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">TSS</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_tss[bawah]" type="text" class="form-control"
                                            placeholder="Batas Minimum">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_tss[atas]" type="text" class="form-control"
                                            placeholder="Batas Maksimum">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">BOD</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_bod[bawah]" type="text" class="form-control"
                                            placeholder="Batas Minimum">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_bod[atas]" type="text" class="form-control"
                                            placeholder="Batas Maksimum">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">COD</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_cod[bawah]" type="text" class="form-control"
                                            placeholder="Batas Minimum">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <input name="jmlh_cod[atas]" type="text" class="form-control"
                                            placeholder="Batas Maksimum">
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-icon btn-dark mr-2" type="reset">Reset</button>
                            <button class="btn btn-icon btn-success" type="submit">Tambahkan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
@push('script')
    <script>
        $("[name='jmlh_ph[atas]']").val(
            '{{ $batasuji['jmlh_ph'] ? $batasuji['jmlh_ph']->batas_atas : '9' }}'
        );
        $("[name='jmlh_ph[bawah]']").val(
            '{{ $batasuji['jmlh_ph'] ? $batasuji['jmlh_ph']->batas_bawah : '6' }}'
        );

        $("[name='jmlh_suhu[atas]']").val(
            '{{ $batasuji['jmlh_suhu'] ? $batasuji['jmlh_suhu']->batas_atas : '30' }}'
        );
        $("[name='jmlh_suhu[bawah]']").val(
            '{{ $batasuji['jmlh_suhu'] ? $batasuji['jmlh_suhu']->batas_bawah : '0' }}'
        );

        $("[name='jmlh_amoniak[atas]']").val(
            '{{ $batasuji['jmlh_amoniak'] ? $batasuji['jmlh_amoniak']->batas_atas : '0,1' }}'
        );
        $("[name='jmlh_amoniak[bawah]']").val(
            '{{ $batasuji['jmlh_amoniak'] ? $batasuji['jmlh_amoniak']->batas_bawah : '0' }}'
        );

        $("[name='jmlh_pshospat[atas]']").val(
            '{{ $batasuji['jmlh_pshospat'] ? $batasuji['jmlh_pshospat']->batas_atas : '2' }}'
        );
        $("[name='jmlh_pshospat[bawah]']").val(
            '{{ $batasuji['jmlh_pshospat'] ? $batasuji['jmlh_pshospat']->batas_bawah : '0' }}'
        );

        $("[name='jmlh_tss[atas]']").val(
            '{{ $batasuji['jmlh_tss'] ? $batasuji['jmlh_tss']->batas_atas : '30' }}'
        );
        $("[name='jmlh_tss[bawah]']").val(
            '{{ $batasuji['jmlh_tss'] ? $batasuji['jmlh_tss']->batas_bawah : '0' }}'
        );

        $("[name='jmlh_bod[atas]']").val(
            '{{ $batasuji['jmlh_bod'] ? $batasuji['jmlh_bod']->batas_atas : '80' }}'
        );
        $("[name='jmlh_bod[bawah]']").val(
            '{{ $batasuji['jmlh_bod'] ? $batasuji['jmlh_bod']->batas_bawah : '0' }}'
        );

        $("[name='jmlh_cod[atas]']").val(
            '{{ $batasuji['jmlh_cod'] ? $batasuji['jmlh_cod']->batas_atas : '30' }}'
        );
        $("[name='jmlh_cod[bawah]']").val(
            '{{ $batasuji['jmlh_cod'] ? $batasuji['jmlh_cod']->batas_bawah : '0' }}'
        );
    </script>
@endpush
