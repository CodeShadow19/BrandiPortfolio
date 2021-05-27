<section id="facts" class="facts">
    <div class="parallax-overlay">
        <div class="container">
            <div class="row number-counters">

                <div class="sec-title text-center mb50 wow rubberBand animated" data-wow-duration="1000ms">
                    <h2>Some Fun Facts</h2>
                    <div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
                </div>

                <!-- first count item -->

                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
                    <div class="counters-item">
                        <i class="fa fa-clock-o fa-3x"></i>
                        <strong data-to="{{ $CountData[0]->work_hour }}">0</strong>
                        <!-- Set Your Number here. i,e. data-to="56" -->
                        <p>Hours of Work</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="counters-item">
                        <i class="fa fa-users fa-3x"></i>
                        <strong data-to="{{ $CountData[0]->clients }}">0</strong>
                        <!-- Set Your Number here. i,e. data-to="56" -->
                        <p>Satisfied Clients</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="600ms">
                    <div class="counters-item">
                        <i class="fa fa-rocket fa-3x"></i>
                        <strong data-to="{{ $CountData[0]->deliver_project }}">0</strong>
                        <!-- Set Your Number here. i,e. data-to="56" -->
                        <p> Projects Delivered </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
                    <div class="counters-item">
                        <i class="fa fa-trophy fa-3x"></i>
                        <strong data-to="{{ $CountData[0]->award_won }}">0</strong>
                        <!-- Set Your Number here. i,e. data-to="56" -->
                        <p>Awards Won</p>
                    </div>
                </div>

                <!-- end first count item -->

            </div>
        </div>
    </div>
</section>
