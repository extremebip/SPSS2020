<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesheets.css') }}">

    <title>@yield('title')</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark">
          <a class="navbar-brand" href="/"><img src="{{ asset('storage/assets/logos/spss-logo.png') }}" width="50px" height="50px"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/lomba">Lomba</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/seminar">Seminar</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/password/change">Ubah Sandi</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      Keluar
                  </a>
                  {{ Form::open(['route' => 'logout', 'id' => 'logout-form', 'style' => 'display:none;']) }}
                  {{ Form::close() }}
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    @yield('content')

    <footer>
      <div class="container">
        <div class="row">
          <div class="footer-content col-md-4 col-sm-12">
            <span class="footer-content-title text-white font-weight-bold">Sekretariat</span>
            <div class="sekretariat-content text-white">
              <img src="{{ asset('storage/assets/logos/himstat-logo.png') }}" width="80px" height="100px">
              <div class="address">
                <article class="footer-content-details text-white">HIMPUNAN MAHASISWA STATISTIKA</article>
                <article class="footer-content-details text-white">Universitas Bina Nusantara Kampus Syahdan</article>
                <article class="footer-content-details text-white">Jl. Kyai H. Syahdan No. 9</article>
              </div>
            </div>
          </div>
          <div class="footer-content col-md-4 col-sm-6">
            <div class="medium-padding-left">
              <span class="footer-content-title text-white font-weight-bold">Media Sosial</span>
              <div class="social-media-content">
                <a href="https://www.facebook.com/himstat/"><img src="{{ asset('storage/assets/logos/logo_facebook.png')  }}" width="20px" height="20px"></a>
                <a href="https://www.instagram.com/himstat/"><img src="{{ asset('storage/assets/logos/logo_instagram.png')  }}" width="20px" height="20px"></a>
                <a href="https://twitter.com/himstat/"><img src="{{ asset('storage/assets/logos/logo_twitter.png')  }}" width="20px" height="20px"></a>
              </div>
            </div>
          </div>
          <div class="footer-content col-md-4 col-sm-6">
            <span class="footer-content-title text-white font-weight-bold">Narahubung</span>
            <table>
              <tr>
                <th style="width: 10%;"></th>
                <th style="width: 90%;"></th>
              </tr>
              <tr>
                <td><img src="{{ asset('storage/assets/logos/logo_phone.png')  }}" width="20px" height="20px"></td>
                <td><span class="footer-content-details text-white">Lorem Ipsum (0800 0000 0000)</span></td>
              </tr>
              <tr>
                <td><img src="{{ asset('storage/assets/logos/logo_phone.png')  }}" width="20px" height="20px"></td>
                <td><span class="footer-content-details text-white">Lorem Ipsum (0800 0000 0000)</span></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </footer>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/countdown.js') }}"></script>

    @yield('script')
  </body>
</html>