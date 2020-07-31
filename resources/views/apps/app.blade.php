<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('assets/apps/css/main.css')}}">
    <!-- Syyle -->
    @yield('style')
    <title>Sistem Pakar Covid-19!</title>
  </head>
  <body>
    
    <div class="app">
        <div class="row">
            <div class="col-md-4 left-side app-bg-primary py-3 pr-0">
                <div class="content px-5">
                    <div class="row date-time">
                        <div class="col">
                            <h6 class="date app-text-primary pt-2" id="date">
                                
                            </h6>
                        </div>
                        <div class="col text-right">
                            <h3 class="time app-text-primary" id="time">
                                
                            </h3>
                        </div>
                    </div>
                    <div class="covid-img">
                        <img class="img-fluid" src="{{asset('assets/apps/images/covid.png')}}" alt="fight-covid">
                    </div>
                    <div class="app-info">
                        <h1 class="app-title h5 app-text-primary">
                            Selamat Datang di
                            SISTEM PAKAR DIAGNOSA COVID-19
                            BERBASIS WEB DENGAN METODE
                            CERTAINTY FACTOR
                        </h1>
                        <div class="app-subtitle-box">
                            <p class="app-subtitle text-light mt-4">
                                Dengan adanya aplikasi ini masyarakat tidak harus
                                pergi ke rumah sakit untuk melakukan pemeriksaan,
                                cukup dengan menggunakan aplikasi ini akan
                                memberikan kemungkinan/prediksi apakah pengguna
                                (berpeluang) terpapar covid-19 atau tidak dan akan
                                memberikan saran kepada pengguna berdasaran hasil
                                yang di berikan.
                            </p>
                        </div>
                        <svg>
                            <clipPath id="wave" clipPathUnits="objectBoundingBox">
                                <path class="st0" d="M1,0c0,0-0.3,0.1-0.5,0.1S0.3,0,0,0.1V1h1L1,0z" />
                            </clipPath>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="col-md-8 right-side py-3">
                @yield('content')
                
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/apps/js/app.js') }}"></script>
    @yield('script')
  </body>
</html>