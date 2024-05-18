@extends('layout.template')
@section('title', 'Daftar Laporan')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <th class="col-2" scope="col">No. Laporan</th>
                                            <td>{{ $laporan->kode }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-2" scope="col">Nama Perusahaan</th>
                                            <td>{{ $laporan->perusahaan->nib->nama_perusahaan }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-2" scope="col">Nama Laboratorium</th>
                                            <td>{{ $laporan->laboratorium->nama_lab }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-5" scope="col">Petugas Sampling</th>
                                            <td>{{ $laporan->nama_petugas }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-5" scope="col">Jenis Sampel</th>
                                            <td>{{ $laporan->jenis_sampling }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-5" scope="col">Jenis Parameter</th>
                                            <td>{{ $laporan->parameter }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-5" scope="col">Tanggal Pengambilan Sampel</th>
                                            <td>{{ $laporan->tanggal_sampling }}</td>
                                        </tr>
                                        <tr>
                                            <th class="col-5" scope="col">Status</th>
                                            @if ($laporan->status_id == 1)
                                                <td><span class="badge badge-warning">{{ $laporan->status->status }}</span>
                                                </td>
                                            @elseif ($laporan->status_id == 2)
                                                <td><span class="badge badge-success">{{ $laporan->status->status }}</span>
                                                </td>
                                            @elseif ($laporan->status_id == 3)
                                                <td><span class="badge badge-danger">{{ $laporan->status->status }}</span>
                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

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
                                                <td>{{ $laporan->jmlh_ph }}
                                                    @if (!$batasuji['jmlh_ph_normal'])
                                                        <i class="text-danger">- Melebihi Baku Mutu</i>
                                                    @else
                                                        <i>- Normal</i>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Suhu</th>
                                                <td>{{ $laporan->jmlh_suhu }}
                                                    @if (!$batasuji['jmlh_suhu_normal'])
                                                        <i class="text-danger">- Melebihi Baku Mutu</i>
                                                    @else
                                                        <i>- Normal</i>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">TSS</th>
                                                <td>{{ $laporan->jmlh_tss }}
                                                    @if (!$batasuji['jmlh_tss_normal'])
                                                        <i class="text-danger">- Melebihi Baku Mutu</i>
                                                    @else
                                                        <i>- Normal</i>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">TDS</th>
                                                <td>{{ $laporan->jmlh_tds }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">BOD</th>
                                                <td>{{ $laporan->jmlh_bod }}
                                                    @if (!$batasuji['jmlh_bod_normal'])
                                                        <i class="text-danger">- Melebihi Baku Mutu</i>
                                                    @else
                                                        <i>- Normal</i>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">COD</th>
                                                <td>{{ $laporan->jmlh_cod }}
                                                    @if (!$batasuji['jmlh_cod_normal'])
                                                        <i class="text-danger">- Melebihi Baku Mutu</i>
                                                    @else
                                                        <i>- Normal</i>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-5" scope="col">Amoniak (NH₃₋N)</th>
                                                <td>{{ $laporan->jmlh_amoniak }}
                                                    @if (!$batasuji['jmlh_amoniak_normal'])
                                                        <i class="text-danger">- Melebihi Baku Mutu</i>
                                                    @else
                                                        <i>- Normal</i>
                                                    @endif
                                                </td>
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
                                                <td>{{ $laporan->jmlh_pshospat }}
                                                    @if (!$batasuji['jmlh_pshospat_normal'])
                                                        <i class="text-danger">- Melebihi Baku Mutu</i>
                                                    @else
                                                        <i>- Normal</i>
                                                    @endif
                                                </td>
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
                        <div class="card-body">
                            <h5 class="text-center pb-2">Feedback</h5>

                            <table class="table table-bordered table-striped table-sm">
                                <tbody>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th style="width: 20%">Tanda Terima</th>
                                    </tr>
                                    @foreach ($laporan->feedback as $no => $feedback)
                                        <tr>
                                            <th>{{ $no + 1 }}</th>
                                            <td class="text-wrap">{{ $feedback->deskripsi }}</td>
                                            <td>
                                                @isset($feedback->file_lampiran)
                                                    <a href="{{ url('/download', $feedback->file_lampiran) }}"><button
                                                            type="button" class="btn btn-primary btn-sm"><i
                                                                class="fa fa-download"></i>Download
                                                        </button></a>
                                                @endisset

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn px-4 btn-success float-right" onclick="history.back()">Kembali</button>
                </div>
        </section>
    </div>
@endsection
