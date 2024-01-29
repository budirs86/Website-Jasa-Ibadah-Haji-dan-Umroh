<div class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="widget">
            <h3>Contact</h3>
                @php
                    $alamat = DB::table('alamat')->where('unit_id', $unit)->first();
                @endphp
                  <p class="info1">{{ $alamat? $alamat->alamat : 'Alamat' }}, {{ $alamat? $alamat->kota : 'Kota' }}, {{ $alamat? $alamat->provinsi : 'Provinsi' }},  {{ $alamat? $alamat->kode_pos : 'Kode Pos' }}</p>

            <address>{{$alamat? $alamat->alamat : 'Alamat'}}</address>
            <ul class="list-unstyled links">
              <li><a href="#">{{ $alamat->telepon? $alamat->telepon : 'No Telepon' }}</a></li>
              <li><a href="#">{{ $alamat->fax? $alamat->fax : 'No Fax' }}</a></li>
              <li>
                <a href="mailto:{{ $alamat->email }}">{{ $alamat->email? $alamat->email : 'Alamat Email' }}</a>
              </li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-6">
          <div class="widget">
            <img src="{{asset('tema/haji/images/logohaji.png')}}" width="200px" alt=""><br>
            <p>Perusahaan berdiri secara resmi pada Tahun 2000 dengan nama PT. Namira. Kami adalah Perusahaan yang bergerak di bidang Jasa Umrah & Haji, Jasa Land Arrangement Saudi, Provider Visa Umrah & Haji Furoda, Paket Umrah Plus, Paket Haji Furoda dan Paket Haji Khusus. Sebuah perusahaan travel yang berkepentingan di Negara yang berpusat di Kingdom of Saudi Arabia. Telah Melayani kurang lebih 20 Travel Umrah & Haji di Indonesia.</p>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /.col-lg-4 -->
        {{-- <div class="col-lg-4">
          <div class="widget">
            <h3>Links</h3>
            <ul class="list-unstyled links">
              <li><a href="#">Our Vision</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>

            <ul class="list-unstyled social">
              <li>
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-linkedin"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-pinterest"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-dribbble"></span></a>
              </li>
            </ul>
          </div>
          <!-- /.widget -->
        </div> --}}
        <!-- /.col-lg-4 -->
      </div>
      <!-- /.row -->

      <div class="row mt-5">
        <div class="col-12 text-center">
          <!--
            **==========
            NOTE:
            Please don't remove this copyright link unless you buy the license here https://untree.co/license/
            **==========
          -->

          <p>
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            . All Rights Reserved. &mdash; Developed By
            <a href="https://garudacms.com" style="color:red ">GarudaCMS</a>
            <!-- License information: https://untree.co/license/ -->
          </p>
          {{-- <div>
            Distributed by
            <a href="https://garudacms.com/" target="_blank">budirs86@gmail.com</a>
          </div> --}}
        </div>
      </div>
    </div>
    <!-- /.container -->
  </div>
