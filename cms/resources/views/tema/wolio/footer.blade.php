<footer>
  <!-- Footer Start-->
  <div class="footer-main footer-bg">
    <br>
      <div class="footer-area">
          <div class="container">
              <div class="row d-flex justify-content-between">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="single-footer-caption mb-50">
                          <div class="single-footer-caption mb-30">
                              <!-- logo -->
                              <div class="footer-logo">
                                <br>
                                  <a href="{{ route('home')}}"><img src="{{ asset('assets/logo/baubaulogo.png')}}" alt="logo footer" width="250px"></a>
                              </div>
                              <div class="footer-tittle">
                                  <div class="footer-pera">
                                    @php
                                        $alamat = DB::table('alamat')->where('unit_id', $unit)->first();
                                    @endphp
                                      <p class="info1">{{ $alamat? $alamat->alamat : 'Alamat' }}, {{ $alamat? $alamat->kota : 'Kota' }}, {{ $alamat? $alamat->provinsi : 'Provinsi' }},  {{ $alamat? $alamat->kode_pos : 'Kode Pos' }}<br>Email: {{ $alamat? $alamat->email : 'Alamat Email' }}<br>Phone: {{ $alamat? $alamat->telepon : 'No Telepon' }}<br>Fax: {{ $alamat? $alamat->fax : 'No Fax' }}</p>
                                  </div>
                              </div>
                              @php
                                  $today = DB::table('berita_views')->where('id_post', 0)->whereDay('created_at', '=', date('d'))->count();
                                  $tomonth = DB::table('berita_views')->where('id_post', 0)->whereMonth('created_at', '=', date('m'))->count();
                                  $toyear = DB::table('berita_views')->where('id_post', 0)->whereYear('created_at', '=', date('Y'))->count();
                                  $toall = DB::table('berita_views')->where('id_post', 0)->count();
                                  $toall = ($toall + 352000)
                              @endphp
                              <table>
                                <tr>
                                <td><span style="color: white">Kunjungan Hari Ini : {{ $today }}</span></td>
                                </tr>
                                <tr>
                                <td><span style="color: white">Kunjungan Bulan Ini : {{ $tomonth }}</span></td>
                                </tr>
                                <tr>
                                <td><span style="color: white">Kunjungan Tahun Ini : {{ $toyear }}</span></td>
                                 </tr>
                                 <tr>
                                <td><h4><span style="color: white">Total Kunjungan : {{ $toall }}</span></h4></td>
                                </tr>
                              </table>
                              {{-- <div class="elfsight-app-07fbcded-718c-4887-ba65-72db0fd72e9a"></div> --}}
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <h6 class="widget-title">Kota Baubau</h6>
                                    <nav class="footer-widget-nav">
                                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63546.289705361436!2d122.57136871298746!3d-5.470988942709329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da474035c058aa1%3A0x92cb0c1ab34ae84a!2sBau-bau%2C%20Murhum%2C%20Bau-Bau%20City%2C%20South%20East%20Sulawesi!5e0!3m2!1sen!2sid!4v1570493037066!5m2!1sen!2sid" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                   </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <!-- footer-bottom aera -->
      <div class="footer-bottom-area footer-bg">
          <div class="container">
              <div class="footer-border">
                  <div class="row d-flex align-items-center">
                      <div class="col-xl-12 ">
                          <div class="footer-copy-right text-center">
                              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Kota Baubau
                                  <label hidden>Developed By budirs86@gmail.com | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a> </label>
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Footer End-->
</footer>

<!-- Search model end -->

<!-- JS here -->
{{-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=HbDCe30h"></script> --}}

<script>
    var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    var bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

    var tanggal = new Date().getDate();
    var xhari = new Date().getDay();
    var xbulan = new Date().getMonth();
    var xtahun = new Date().getYear();

    var hari = hari[xhari];
    var bulan = bulan[xbulan];
    var tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;
    n = hari +', ' + tanggal + ' ' + bulan + ' ' + tahun;
    document.getElementById("date").innerHTML = n;

</script>
    <script src="{{ asset('tema/wolio/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('tema/wolio/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('tema/wolio/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('tema/wolio/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/slick.min.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('tema/wolio/assets/js/gijgo.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('tema/wolio/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/animated.headline.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('tema/wolio/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/jquery.sticky.js')}}"></script>

    <!-- contact js -->
    <script src="{{ asset('tema/wolio/assets/js/contact.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/jquery.form.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/mail-script.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('tema/wolio/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('tema/wolio/assets/js/main.js')}}"></script>
    {{-- <script>
    (function(d){var s = d.createElement("script");s.setAttribute("data-account", "qFdlC7c3V0");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript> --}}

</body>
</html>
