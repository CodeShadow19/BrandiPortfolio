<section id="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <!-- Indicators bullet -->
        <ol class="carousel-indicators">
            <!--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
        </ol>
        <!-- End Indicators bullet -->

        <!-- Wrapper for slides -->

        <div class="carousel-inner" role="listbox">

            <!-- single slide -->

            <!-- end single slide -->

            <!-- single slide -->
            @foreach($BannerData as $Data)
            <div class="item active" style="background-image: url({{$Data->img}});">
                <div class="carousel-caption">
                    <h2 data-wow-duration="500ms" data-wow-delay="500ms" class="wow bounceInDown animated">{{$Data->title}}</h2>
                    <h3 data-wow-duration="500ms" class="wow slideInLeft animated"><span class="color">{{$Data->short_des}}</h3>
                    <p data-wow-duration="500ms" class="wow slideInRight animated">{{$Data->long_des}}</p>

                    <ul class="social-links text-center">
                        <li><a href=""><i class="fa fa-twitter fa-lg"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
                        <li><a href=""><i class="fa fa-dribbble fa-lg"></i></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
            <!-- end single slide -->

        </div>

        <!-- End Wrapper for slides -->

    </div>
</section>
