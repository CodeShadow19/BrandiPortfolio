<section id="team" class="team">
    <div class="container">
        <div class="row">

            <div class="sec-title text-center wow fadeInUp animated" data-wow-duration="700ms">
                <h2>Meet Our Team</h2>
                <div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
            </div>

            <div class="sec-sub-title text-center wow fadeInRight animated" data-wow-duration="500ms">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
            </div>

            <!-- single member -->
            @foreach($TeamData as $Data)
            <figure class="team-member col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
                <div class="member-thumb">
                    <img src="{{$Data->img}}" alt="Team Member" class="img-responsive">
                    <figcaption class="overlay">
                        <p>{{$Data->des}}</p>
                        <ul class="social-links text-center">
                            <li><a target="_blank" href="{{url($Data->facebook)}}"><i class="fa fa-twitter fa-lg"></i></a></li>
                            <li><a href=""><i class="fa fa-facebook fa-lg"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus fa-lg"></i></a></li>
                        </ul>
                    </figcaption>
                </div>
                <h4>{{$Data->name}}</h4>
                <span>{{$Data->title}}</span>
            </figure>
            @endforeach
            <!-- end single member -->

            <!-- single member -->

            <!-- end single member -->

        </div>
    </div>
</section>
