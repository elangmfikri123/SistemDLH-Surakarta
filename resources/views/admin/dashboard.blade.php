@extends('admin.template')
@section('title', 'Dashboard')
@section('content')


    <link rel="stylesheet" href="{{ asset('template/assets/css/maps.css') }}">
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBTsDbkE1p3lDFY0TMmuVEUPgn0a9AMu_w" type="text/javascript">
    </script>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Admin</h1>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pengguna</h4>
                            </div>
                            <div class="card-body">
                                {{ $user }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Perusahaan</h4>
                            </div>
                            <div class="card-body">
                                {{ $pers }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Laboratorium</h4>
                            </div>
                            <div class="card-body">
                                {{ $laboratorium }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Lokasi Perusahaan Surakarta</h4>
                        </div>
                        <div class="card-body">
                            <div class="map-container">
                                <div id="mapsssss" style="width: 100%; height: 400px;"></div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-body">
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        var locations = [
            @foreach ($perusahaan as $per)
                ['{{ $per->nib->nama_perusahaan }}', {{ $per->tikor_perusahaan }}],
            @endforeach

        ];

        var map = new google.maps.Map(document.getElementById('mapsssss'), {
            zoom: 13,
            center: new google.maps.LatLng(-7.555719, 110.821865),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>
@endsection
