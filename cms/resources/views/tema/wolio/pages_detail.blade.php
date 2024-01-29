@include('tema.wolio.header')
<main>
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 posts-list">
               <div class="single-post">
                  {{-- <div class="feature-img">
                     <img class="img-fluid" src="{{ asset('tema/wolio/assets/img/blog/single_blog_1.png')}}" alt="">
                  </div> --}}
                  <div class="blog_details">
                     <h2>{{ $pages->title }}
                     </h2>
                     <p>{!! html_entity_decode($pages->content) !!}</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
</main>
@include('tema.wolio.footer')

