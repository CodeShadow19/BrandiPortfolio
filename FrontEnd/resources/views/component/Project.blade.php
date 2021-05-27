<section id="works" class="works clearfix">
    <div class="container">
        <div class="row">

            <div class="sec-title text-center">
                <h2>Works</h2>
                <div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
            </div>

            <div class="sec-sub-title text-center">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
            </div>

            <div class="work-filter wow fadeInRight animated" data-wow-duration="500ms">
                <ul class="text-center">
                    <li><a href="javascript:;" data-filter="all" class="active filter">All</a></li>
                    <li><a href="javascript:;" data-filter=".branding" class="filter">Branding</a></li>
                    <li><a href="javascript:;" data-filter=".web" class="filter">web</a></li>
                    <li><a href="javascript:;" data-filter=".logo-design" class="filter">logo design</a></li>
                    <li><a href="javascript:;" data-filter=".photography" class="filter">photography</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="project-wrapper">
        @foreach($ProjectData as $Data)
        <figure class="mix work-item {{$Data->category}}">
            <img src="{{$Data->img}}" alt="">
            <figcaption class="overlay">
                <a class="fancybox" rel="works" title="Write Your Image Caption Here" href="{{$Data->img}}"><i class="fa fa-eye fa-lg"></i></a>
                <h4>{{$Data->title}}</h4>
                <p>{{$Data->des}}</p>
            </figcaption>
        </figure>
        @endforeach
    </div>


</section>
