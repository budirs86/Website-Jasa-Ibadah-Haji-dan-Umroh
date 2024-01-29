@include('tema.wolio.header')
<main>
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  {{-- <div class="feature-img">
                     <img class="img-fluid" src="{{ asset('tema/wolio/assets/img/blog/single_blog_1.png')}}" alt="">
                  </div> --}}
                  <div class="blog_details">
                     <h2>{{ $pengumuman->title }}
                     </h2>
                     <p>{!! html_entity_decode($pengumuman->content) !!}</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
                @include('tema.wolio.right_widget')
            </div>
         </div>

      </div>
   </section>
   <!--================ Blog Area end =================-->

</main>
@include('tema.wolio.footer')

