@extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <style type="text/css">
            .tf-widget-events {
                padding: 80px 0 120px 0;
            }

            .event-detail-box {
                margin-bottom: 80px;
            }

            .image-event img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .title-event-detail {
                text-transform: uppercase;
            }

            .event-detail-box .detail-box-content {
                display: flex;
            }

            .event-detail-box .detail-box-content .event-detail-card {
                max-width: 486px;
                width: 100%;
                padding: 67px 48px;
                background: var(--text-dark);
            }

            .event-detail-box .detail-box-content .event-detail-card .event-detail-container {
                display: flex;
                flex: 0 0 auto;
                flex-direction: column;
                align-items: stretch;
                justify-content: flex-start;
            }

            .event-detail-card .event-detail-heading {
                flex: 0 0 auto;
                font: 500 30px 'Oswald';
                color: var(--primary);
                text-transform: capitalize;
                margin: 0px;

            }

            .event-detail-card .event-detail-container .price {
                flex: 0 0 auto;
                font: 700 80px 'Oswald';
                color: var(--card);
                text-transform: capitalize;
                margin-bottom: 8px;
            }

            .event-detail-card .event-detail-container .price .ticket-price {
                font: 400 18px 'Jost';
                font-style: normal;
                line-height: 28px;
                margin-left: -20px;
            }

            .event-detail-card .event-detail-container .event-title {
                flex: 0 0 auto;
                max-width: 398px;
                font: 500 30px/42px 'Oswald';
                color: var(--card);
                text-transform: capitalize;
                margin-bottom: 17px;
            }

            .event-detail-card .event-detail-container .event-date-time-or-location {
                display: flex;
                flex: 0 0 auto;
                flex-direction: column;
                gap: 16px;
                align-items: stretch;
                justify-content: center;
                margin-top: 4px;
                margin-bottom: 50px;
            }

            .event-detail-card .event-detail-container .event-date-time {
                display: flex;
                flex: 0 0 auto;
                flex-direction: row;
                align-items: center;
                justify-content: flex-start;
            }

            .event-detail-card .event-detail-container .event-date-time p {
                flex: 0 0 auto;
                margin-left: 8px;
                font: 500 14px;
                color: var(--white);
                text-transform: uppercase;
            }

            .event-detail-content h3 {
                font-weight: 500;
                margin-bottom: 16px;
            }

            .event-detail-content {
                padding-right: 20px;
                padding-top: 30px;
            }

            .event-detail-content p.post {
                color: var(--secondary);
                margin-bottom: 32px;
            }

            .event-detail-content ul>li>span {
                font-family: "Inter", sans-serif;
                font-weight: 700;
                font-size: 16px;
                line-height: 26px;
                text-transform: capitalize;
                margin-bottom: 12px;
                display: block;
            }

            .event-detail-content ul>li>span svg {
                margin-right: 9px;
            }

            .event-detail-content .regis-now {
                margin-top: 32px;
                margin-bottom: 32px;
            }

            .image-event-content {
                margin-left: 5px;
                height: 100%;
            }

            .image-event-content img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .btn-learn-more .flat-button:hover {
                background-color: var(--card);
                color: var(--text-dark);
            }

            .widget-event .item {
                display: flex;
                align-items: stretch;
                position: relative;
                overflow: hidden;
                justify-content: space-between;
                width: 100%;
                padding: 0;
            }

            .widget-event .item:not(:last-child) {
                margin-bottom: 38px;

            }

            .widget-event .event-infomation {
                width: 74.5%;
                position: relative;

            }

            .widget-event .event-infomation img {
                position: absolute;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: top;
                right: 0;
                top: 0;
                bottom: 0;
                z-index: 0;
                -webkit-transition: all 1.5s cubic-bezier(0, 0, 0.2, 1);
                transition: all 1.5s cubic-bezier(0, 0, 0.2, 1);
            }

            .item:hover .event-infomation img {
                -webkit-transform: scale3d(1.05, 1.05, 1.05);
                transform: scale3d(1.05, 1.05, 1.05);
                -webkit-transition: all 1.7s cubic-bezier(0, 0, 0.2, 1);
                transition: all 1.7s cubic-bezier(0, 0, 0.2, 1);
            }

            .widget-event .event-infomation .info h4 {
                font-family: "Oswald", sans-serif;
                font-weight: 500;
                font-size: 30px;
                line-height: 42px;
                text-transform: capitalize;
                margin-bottom: 24px;

            }

            .widget-event .event-infomation .info h4,
            .widget-event .event-infomation .info p,
            .widget-event .tf-info-price,
            .widget-event .tf-info-price .price span,
            .widget-event .tf-info-price .price {
                color: var(--card);
            }

            .widget-event .event-infomation .info p {
/*                font-family: "Oswald", sans-serif;*/
font-weight: 500;
font-size: 14px;
line-height: 22px;
text-transform: uppercase;
margin-right: 20%;
padding: 0 2px;
}

.widget-event .event-infomation .info p:not(:last-child) {
    margin-bottom: 18px;

}

.widget-event .event-infomation .info p>span {
    margin-right: 8px;

}
.widget-event h4>a {
    color: #fff;
    color: var(--card);
}

.widget-event .info {
    max-width: 520px;
    height: 101%;
    clip-path: polygon(0% 0%, 80% 0, 100% 27%, 70% 100%, 0% 100%);
    background-color: #35aa76;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    z-index: 11;
    position: relative;
}

.widget-event .tf-info-price {
    width: 25.5%;
    position: relative;
    z-index: 5;
    padding: 54px 40px;
    background-color: var(--primary);
}

.widget-event .tf-info-price:before {
    content: '';
    width: 3px;
    height: 100%;
    position: absolute;
    background: repeating-linear-gradient(0deg, var(--card) 2px, var(--card) 10px, var(--secondary) 10px, var(--secondary) 20px);
    left: 0;
    top: 0;
}

.widget-event .item .bg-item-event-2 {
    content: '';
    width: 316.5px;
    height: 235px;
    background-color: var(--primary);
    position: absolute;
    bottom: -78px;
    left: 243px;
    z-index: 10;
    clip-path: polygon(16% -31%, 80% 19%, 28% 100%, 0% 100%);
}

.widget-event .item .item-event-price-bg {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    width: 40px;
    height: 100%;
    z-index: 5;
}

.widget-event .item .item-event-price-bg::before {
    content: '';
    width: 50%;
    height: 100%;
    position: absolute;
    background: repeating-linear-gradient(0deg, var(--secondary) 0px, var(--secondary) 20px, var(--card) 20px, var(--card) 40px);
    right: 0;
    top: 0;
}

.widget-event .item .item-event-price-bg::after {
    content: '';
    width: 50%;
    height: 100%;
    position: absolute;
    right: 20px;
    top: 0;
    background: repeating-linear-gradient(0deg, var(--card) 0px, var(--card) 20px, var(--secondary) 20px, var(--secondary) 40px);
}

.widget-event .tf-info-price h4 {

    font-size: 30px;
    font-style: normal;
    font-weight: 500;
    line-height: 42px;
    text-transform: capitalize;
    color: var(--card);
    margin-bottom: 15px;
}

.widget-event .tf-info-price .price span {

    font-size: 45px;
    font-style: normal;
    font-weight: 700;
    line-height: 55px;
    text-transform: capitalize;
}

.widget-event .tf-info-price .price {

    font-size: 18px;
    font-style: normal;
    font-weight: 400;
    line-height: 28px;
    margin-bottom: 16px;
}

.widget-event .tf-info-price a:hover {
    color: var(--text-dark);
    background-color: #ffffff;
}


@media only screen and (max-width: 767px) {
    .widget-event .event-infomation, .widget-event .tf-info-price {
        width: 100%;
    }
    .widget-event .item {
        flex-direction: column;
    }
    .widget-event .flat-button{
        width: auto!important;
    }
    .widget-event .item .bg-item-event-2 {
        display: none;        
    }
}

</style>

<div class="row">
    <div class="col-12">
        <div class="widget-event">
        @foreach($events as $event)
            <div class="item wow fadeInUp animated">
                <div class="event-infomation">
                    <div class="info">
                        <h4><a href="#">{{ $event->name }}</a></h4>
                        <p>{{ $event->type }}</p>
                        <p><span><i class="las la-calendar"></i></span> @if($event->date)
    {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
@endif</p>
                        <p><span><i class="las la-clock"></i></span>@if($event->time)
    {{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}
@endif
 - Until Finish</p>
                        <p><span><i class="las la-map-marker"></i></span>{{ $event->loc->name }} | {{ $event->city }}</p>
                    </div>
                    <img decoding="async" src="{{ $event->image_url ?? 'https://recstep.com/pictures/event1.jpg' }}" alt="{{ $event->event_name }}">
                </div>
                <div class="tf-info-price">
                    <h4>Cost</h4>
                    <p class="price"><span>${{ number_format($event->cost, 2) }}</span>/Ticket</p>
                    <a class="flat-button btn btn-success btn-lg w-75" href="#">Learn more</a>
                    <div class="item-event-price-bg"></div>
                </div>
                <div class="bg-item-event-2"></div>
            </div>
            @endforeach                    
            <!-- <div class="item wow fadeInUp  animated" >
                <div class="event-infomation">
                    <div class="info">
                        <h4><a href="#">denpasar marathon event 2025</a></h4>
                        <p>Road Running</p>
                        <p><span><i class="las la-calendar"></i> </span>Apr 20, 2025</p>
                        <p><span><i class="las la-clock"></i></span>Start 06:00 AM - Until Finish</p>
                        <p><span><i class="las la-map-marker"></i></span>710 1st St. Easton, PA 18042 | Chester County</p>
                    </div>
                    <img decoding="async" src="https://recstep.com/pictures/event1.jpg" alt="denpasar event 2023">
                </div>
                <div class="tf-info-price">
                    <h4>Cost</h4>
                    <p class="price"><span>$45</span>/Ticket</p>
                    <button class="flat-button btn btn-success btn-lg w-75" href="#">Learn more</button>
                    <div class="item-event-price-bg"></div>
                </div>
                <div class="bg-item-event-2"></div>
            </div>  -->  

           <!--  <div class="item wow fadeInUp  animated" >
                <div class="event-infomation">
                    <div class="info">
                        <h4><a href="#">women marathon event 2025</a></h4>
                        <p>cross-country running</p>
                        <p><span><i class="las la-calendar"></i> </span>Apr 22, 2025</p>
                        <p><span><i class="las la-clock"></i></span>Start 06:00 AM - Until Finish</p>
                        <p><span><i class="las la-map-marker"></i></span>710 1st St. Easton, PA 18042 | Chester County</p>
                    </div>
                    <img decoding="async" src="https://recstep.com/pictures/event2.jpg" alt="denpasar event 2023">
                </div>
                <div class="tf-info-price">
                    <h4>Cost</h4>
                    <p class="price"><span>$45</span>/Ticket</p>
                    <button class="flat-button btn btn-success btn-lg w-75" href="#">Learn more</button>
                    <div class="item-event-price-bg"></div>
                </div>
                <div class="bg-item-event-2"></div>
            </div>  

             <div class="item wow fadeInUp  animated" >
                <div class="event-infomation">
                    <div class="info">
                        <h4><a href="#">women marathon event 2025</a></h4>
                        <p>cross-country running</p>
                        <p><span><i class="las la-calendar"></i> </span>Apr 22, 2025</p>
                        <p><span><i class="las la-clock"></i></span>Start 06:00 AM - Until Finish</p>
                        <p><span><i class="las la-map-marker"></i></span>710 1st St. Easton, PA 18042 | Chester County</p>
                    </div>
                    <img decoding="async" src="https://recstep.com/pictures/event3.jpg" alt="denpasar event 2023">
                </div>
                <div class="tf-info-price">
                    <h4>Cost</h4>
                    <p class="price"><span>$45</span>/Ticket</p>
                    <button class="flat-button btn btn-success btn-lg w-75" href="#">Learn more</button>
                    <div class="item-event-price-bg"></div>
                </div>
                <div class="bg-item-event-2"></div>
            </div> -->                

        </div>
    </div>
</div>

</div>
@endsection
