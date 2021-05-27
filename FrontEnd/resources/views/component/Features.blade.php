<section id="features" class="features">
    <div class="container">
        <div class="row">

            <div class="sec-title text-center mb50 wow bounceInDown animated" data-wow-duration="500ms">
                <h2>Features</h2>
                <div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
            </div>

            <!-- service item -->
            @foreach($FeaturesData as $Data)
            <div class="col-md-4 wow fadeInLeft" data-wow-duration="500ms">
                <div class="service-item">
                    <div class="service-icon">
                        {!! $Data->icon !!}
                    </div>

                    <div class="service-desc">
                        <h3>{{$Data->title}}</h3>
                        <p>{{$Data->des}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- end service item -->

            <!-- service item -->

            <!-- end service item -->

        </div>
    </div>
</section>
