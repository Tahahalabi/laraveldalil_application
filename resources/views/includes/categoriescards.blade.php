@foreach ($getCards as $card)
    <div class="carddesign">
        <?php
            if ($card->photo != NULL) {
                ?> <img src="{{$card->photo}}" class="cardphoto" > <?php
            }
        ?>

        <div class="carddesign-body">

            <img src="{{asset('images/cardtop.png')}}" class="topleft">
            <img src="{{asset('images/cardbottom.png')}}" class="bottomright">

            <?php 
                if ($card->topleftword != NULL) {
                    ?> <span class="topleftword">{{$card->topleftword}}</span> <?php
                }

                if ($card->bottomrightword != NULL) {
                    ?> <span class="bottomrightword">{{$card->bottomrightword}}</span> <?php
                }

            ?>

            <h4 class="maincardtitle">{{$card->title}}</h4>
            <?php
                if ($card->description != NULL) {
                    ?> <p class="text">{{$card->description}}</p> <?php
                }
            ?>

            <div class="innerdesignbody">
                <div class="row">
                    <div class="col-lg-9">
                        <div>
                        <?php
                            if ($card->location != NULL) {
                                ?> <i class="fas fa-map infoicon"></i>
                                <span class="infotext">{{$card->location}}</span> <?php
                            }
                        ?>
                        </div>

                        <div>
                        <?php
                            if ($card->phone1 != NULL) {
                                ?> <i class="fas fa-phone infoicon"></i>
                                <?php
                            }

                            if ($card->phone1 != NULL) {
                                ?> <a href="tel:{{$card->phone1}}" class="parentinfoicon" ><span class="infotext">{{$card->phone1}}</span></a> <?php
                            }

                            if ($card->phone2 != NULL) {
                                ?> <a href="tel:{{$card->phone2}}" class="parentinfoicon" ><span class="infotext">{{$card->phone2}} - </span></a> <?php
                            }

                            if ($card->phone3 != NULL) {
                                ?> <a href="tel:{{$card->phone3}}" class="parentinfoicon" ><span class="infotext">{{$card->phone3}} - </span></a> <?php
                            }
                        ?>
                        </div>

                        <div>
                            <?php 
                                if ($card->link != NULL) {
                                    ?> <a href="{{$card->link}}" class="parentinfoicon" ><i class="fas fa-link infoicon"></i></a>
                                    <a href="{{$card->link}}" class="infotext">{{$card->link}}</a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <?php 
                            if ($card->map != NULL) {
                                ?>
                                <iframe src="{{$card->map}}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                                <?php
                            }
                        ?>
                    </div>
                </div>

                
            </div>
            <div class="parentsocial">
                <?php 
                    if ($card->facebook != NULL) {
                        ?>
                            <a href="{{$card->facebook}}" class="socialicon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        <?php
                    }

                    if ($card->gmail != NULL) {
                        ?>
                            <a href="{{$card->gmail}}" class="socialicon">
                                <i class="fas fa-envelope"></i>
                            </a>
                        <?php
                    }

                    if ($card->instagram != NULL) {
                        ?>
                            <a href="{{$card->instagram}}" class="socialicon">
                                <i class="fab fa-instagram"></i>
                            </a>
                        <?php
                    }

                    if ($card->twitter != NULL) {
                        ?>
                            <a href="{{$card->twitter}}" class="socialicon">
                                <i class="fab fa-twitter"></i>
                            </a>
                        <?php
                    }
                    
                    if ($card->youtube != NULL) {
                        ?>
                            <a href="{{$card->youtube}}" class="socialicon">
                                <i class="fab fa-youtube"></i>
                            </a>
                        <?php
                    }
                ?>
            </div>
        </div>
        
    </div>
@endforeach

{{ $getCards->links() }}