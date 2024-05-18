@extends('admin.template')
@section('title', 'Daftar Laporan')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Cetak Laporan</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="text-dark">Laporan Kualitas Air Limbah Tanggal {{ $mulai }} Sampai
                                {{ $akhir }}</h4>
                            <div>
                                <button class="btn btn-success" onclick="fnExcelReport()"><i class="fas fa-print"></i>Export
                                    Excel</button>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="laporan">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center sorting_asc">No</th>
                                            <th>No. Laporan</th>
                                            <th>Perusahaan</th>
                                            <th>Laboratorium</th>
                                            <th>Nama Petugas</th>
                                            <th>Jenis Sampling</th>
                                            <th>Parameter</th>
                                            <th>Tanggal Sampling</th>
                                            <th>Debit Inlet</th>
                                            <th>Debit Outlet</th>
                                            <th>Debit Air Baku</th>
                                            <th>pH</th>
                                            <th>Suhu</th>
                                            <th>TSS</th>
                                            <th>TDS</th>
                                            <th>BOD</th>
                                            <th>COD</th>
                                            <th>Amoniak (NH3₋N)</th>
                                            <th>Minyak & Lemak</th>
                                            <th>Total Caliform</th>
                                            <th>Bakteri Caliform</th>
                                            <th>MBAS</th>
                                            <th>Sulfida (S)</th>
                                            <th>Nitrat (NO3-N)</th>
                                            <th>Nitrit (NO2-N)</th>
                                            <th>Phosphat (PO4-P)</th>
                                            <th>Fenol Total</th>
                                            <th>Khrom Total (Cr)</th>
                                            <th>Seng (ZN)</th>
                                            <th>Klorida</th>
                                            <th>Klor Bebas</th>
                                            <th>Fluorida (F)</th>
                                            <th>Warna</th>
                                            <th>Produksi</th>
                                            <th>Jumlah Hunian</th>
                                            <th>Jumlah BED</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                    @foreach ($laporan as $key => $lap)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $lap->kode }}</td>
                                            <td>{{ $lap->perusahaan->nib->nama_perusahaan }}</td>
                                            <td>{{ $lap->laboratorium->nama_lab }}</td>
                                            <td>{{ $lap->nama_petugas }}</td>
                                            <td>{{ $lap->jenis_sampling }}</td>
                                            <td>{{ $lap->parameter }}</td>
                                            <td>{{ $lap->tanggal_sampling }}</td>
                                            <td>{{ $lap->jmlh_inlet }}</td>
                                            <td>{{ $lap->jmlh_outlet }}</td>
                                            <td>{{ $lap->jmlh_debit }}</td>
                                            <td>{{ $lap->jmlh_ph }}</td>
                                            <td>{{ $lap->jmlh_suhu }}</td>
                                            <td>{{ $lap->jmlh_tss }}</td>
                                            <td>{{ $lap->jmlh_tds }}</td>
                                            <td>{{ $lap->jmlh_bod }}</td>
                                            <td>{{ $lap->jmlh_cod }}</td>
                                            <td>{{ $lap->jmlh_amoniak }}</td>
                                            <td>{{ $lap->jmlh_minyak }}</td>
                                            <td>{{ $lap->jmlh_caliform }}</td>
                                            <td>{{ $lap->jmlh_bakteri }}</td>
                                            <td>{{ $lap->jmlh_mbas }}</td>
                                            <td>{{ $lap->jmlh_sulfida }}</td>
                                            <td>{{ $lap->jmlh_nitrat }}</td>
                                            <td>{{ $lap->jmlh_nitrit }}</td>
                                            <td>{{ $lap->jmlh_pshospat }}</td>
                                            <td>{{ $lap->jmlh_fenol }}</td>
                                            <td>{{ $lap->jmlh_khorm }}</td>
                                            <td>{{ $lap->jmlh_seng }}</td>
                                            <td>{{ $lap->jmlh_klorida }}</td>
                                            <td>{{ $lap->jmlh_klor }}</td>
                                            <td>{{ $lap->jmlh_fluorida }}</td>
                                            <td>{{ $lap->jmlh_warna }}</td>
                                            <td>{{ $lap->jmlh_produksi }}</td>
                                            <td>{{ $lap->jmlh_hunian }}</td>
                                            <td>{{ $lap->jmlh_bed }}</td>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function fnExcelReport() {
            var tab_text = "<table border='2px'><tr>";
            var textRange;
            var j = 0;
            tab = document.getElementById('laporan'); // id of table

            for (j = 0; j < tab.rows.length; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            }

            tab_text = tab_text + "</table>";
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
            tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
            {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa = txtArea1.document.execCommand("SaveAs", true,
                    "Laporan Baku Mutu {{ $mulai . ' - ' . $akhir }}.xls");
            } else {
                var a = document.createElement('a');
                var data_type = 'data:application/vnd.ms-excel';
                var filename = "Laporan Baku Mutu {{ $mulai . ' - ' . $akhir }}"
                a.href = data_type + ', ' + encodeURIComponent(tab_text);
                a.download = filename + '.xls';
                a.click();
            } //other browser not tested on IE 11 
        }

        document.getElementById("tglawal").addEventListener("input", function() {
            document.getElementById("tglakhir").min = this.value;
        });
        document.getElementById("tglakhir").addEventListener("input", function() {
            document.getElementById("tglawal").max = this.value;
        });

        function laporanView() {
            var awal = $('#tglawal').val();
            var akhir = $('#tglakhir').val();
            if (awal == '' || awal == null || akhir == '' || akhir == null) {
                Swal.fire('Peringatan!', 'Tanggal tidak lengkap, silahkan lengkapi', 'warning');
            } else {
                window.open('{{ url('cetak/laporan') }}/' + awal + '/' + akhir, '_self');
            }

        }

        function laporanExport() {
            var awal = $('#tglawal').val();
            var akhir = $('#tglakhir').val();
            if (awal == '' || awal == null || akhir == '' || akhir == null) {
                Swal.fire('Peringatan!', 'Tanggal tidak lengkap, silahkan lengkapi', 'warning');
            } else {
                window.open('{{ url('cetak/laporan') }}/' + awal + '/' + akhir + '/export', '_self');
            }

        }
    </script>
@endsection
