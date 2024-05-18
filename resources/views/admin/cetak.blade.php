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
                        <div class="card-header">
                            <h4 class="text-dark">Seleksi Laporan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="label">Mulai Tanggal</label>
                                        <input class="form-control " placeholder="Dari Tanggal" type="date"
                                            name="tglawal" id="tglawal">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <input class="form-control " placeholder="Sampai Tanggal" type="date"
                                            name="tglakhir" id="tglakhir">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Bidang Perusahaan</label>
                                        <select id="bidang" name="bidang" class="form-control" class="custom-select">
                                            <option selected value="all">Semua Bidang</option>
                                            @foreach ($bidang as $bidang)
                                                <option <?php if (isset($_GET['bidang'])) {
                                                    if ($_GET['bidang'] == $bidang->id) {
                                                        echo "selected='selected'";
                                                    }
                                                } ?> value="{{ $bidang->id }}">
                                                    {{ $bidang->nama_bidang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Lokasi Sampling</label>
                                        <select id="lokasi" name="lokasi" class="form-control" class="custom-select">
                                            <option selected value="all">Semua Lokasi</option>
                                            <option value="Inlet">Inlet</option>
                                            <option value="Outlet">Outlet</option>
                                            <option value="Titik Pantau">Titik Pantau</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group pt-4 mt-1">
                                        <button class="btn btn-success" onclick="laporanView()">Tampilkan</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Daftar Laporan</h4>
                            <a class="btn btn-icon btn-success" type="button" href="{{ url('/export') }}"
                                target="_blank"><i class="fas fa-print"></i>Export Excel</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center sorting_asc">No</th>
                                            <th>No. Laporan</th>
                                            <th>Perusahaan</th>
                                            <th>Laboratorium</th>
                                            <th>Nama Petugas</th>
                                            <th>Lokasi Sampling</th>
                                            <th>Jenis Sampel</th>
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
                                            <th>Amoniak (NH₃₋N)</th>
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
        document.getElementById("tglawal").addEventListener("input", function() {
            document.getElementById("tglakhir").min = this.value;
        });
        document.getElementById("tglakhir").addEventListener("input", function() {
            document.getElementById("tglawal").max = this.value;
        });

        function laporanView() {
            var awal = $('#tglawal').val();
            var akhir = $('#tglakhir').val();
            var bidang = $('#bidang').val();
            var lokasi = $('#lokasi').val();
            if (awal == '' || awal == null || akhir == '' || akhir == null || bidang == '' || bidang == null || lokasi ==
                '' || lokasi == null) {
                Swal.fire('Peringatan!', 'Tanggal tidak lengkap, silahkan lengkapi', 'warning');
            } else {
                window.open('{{ url('cetak/laporan') }}/' + awal + '/' + akhir + '/' + bidang + '/' + lokasi, '_self');
            }

        }
    </script>
@endsection
