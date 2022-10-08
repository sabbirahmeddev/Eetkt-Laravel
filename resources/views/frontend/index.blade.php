@extends('frontend.layouts.app')
@section('content')




<main>
    <!-- ================== HEADER NAVIGATION START =================== -->
    <section class="header__navi">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="nav__bar">
                        <nav class="navbar navbar-expand-lg py-3 py-lg-2">
                            <div class="container-fluid g-0">
                                <a class="navbar-brand headerLogo" href="index.html">
                                    <img src="{{asset('assets/frontend/img/logo/T&T-Logo 2.png')}}" alt="">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarSupportedContent">
                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navigation">
                                        <li><a href="index.html">HOME</a></li>
                                        <li><a href="#">SHOPE</a></li>
                                        <li><a href="career.html">CAREERS</a></li>
                                        <li><a href="#">PAGES</a></li>
                                        <li><a href="#">BUY</a></li>
                                    </ul>
                                    <form class="d-flex header__search" role="search">
                                        <input class="form-control" type="search"
                                            placeholder="Name / PNR / Ticket No / Booking Ref" aria-label="Search"
                                            required>
                                        <i class="ri-search-line searchIcon"></i>
                                    </form>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================== HEADER NAVIGATION END =================== -->
    <!-- ================= HERO BANNER START ================== -->
    <section class="heroBnnr__section">
        <div class="swiper headerBnnr">
            <div class="swiper-wrapper">
                <div class="swiper-slide banner" style="background-image: url('{{asset('assets/frontend/img/background/Rectangle\ 2.png')}}');">
                    <h1 class="wow bounceInUp">Welcome to <span>bangladesh</span></h1>
                    <h1></h1>
                </div>
                <div class="swiper-slide banner" style="background-image: url('{{asset('assets/frontend/img/background/Rectangle.png')}}');">
                    <h1 class="wow bounceInUp">Welcome to <span>Dhaka</span></h1>
                </div>
                <div class="swiper-slide banner"
                    style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 2 (2).png')}}');">
                    <h1 class="wow bounceInUp">Welcome to <span>chittagong</span></h1>
                </div>
                <div class="swiper-slide banner"
                    style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 2 (3).png')}}');">
                    <h1 class="wow bounceInUp">Welcome to <span>comilla</span></h1>
                </div>
            </div>
            <div class="swiper-button-next"><i class="ri-arrow-right-line"></i></div>
            <div class="swiper-button-prev"><i class="ri-arrow-left-line"></i></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="header__tab">
            <div class="tab__box">
                <nav>
                    <div class="nav nav-tabs tabButton" id="nav-tab" role="tablist">
                        <a href="flightBooking.html">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-Flight" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Flight</button>
                        </a>
                        <a href="busBooking.html">
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-Bus" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Bus</button>
                        </a>
                        <a href="hotelBooking.html">
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-Hotel" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Hotel</button>
                        </a>
                        <a href="insurance.html">
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-Insurance" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Insurance</button>
                        </a>
                        <a href="holidaysBooking.html">
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-Holidays" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Holidays</button>
                        </a>
                        <a href="eventBooking.html">
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-Event" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Event</button>
                        </a>
                        <a href="carBooking.html">
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-Cars" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Cars</button>
                        </a>
                        <a href="visaBooking.html">
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-Visa" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Visa</button>
                        </a>
                    </div>
                </nav>
                <div class="tab-content tabBox" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-Flight" role="tabpanel"
                        aria-labelledby="nav-home-tab" tabindex="0">
                        <div class="headerTab__top">
                            <div class="header__inputSearch">
                                <div class="fly">
                                    <select name="flyFrom" id="flyFrom">
                                        <option value="flyingFrom">Flying From</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-takeoff-line"></i>
                                </div>
                                <i class="fa-solid fa-code-compare"></i>
                                <div class="fly">
                                    <select name="flyTo" id="flyTo">
                                        <option value="flyingTo">Flying To</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-land-line"></i>
                                </div>
                            </div>
                            <div class="header__dateMonth">
                                <div class="trip">
                                    <input type="text" name="month" id="month" placeholder="Trip Start">
                                    <img src="{{asset('assets/frontend/img/icon/Insurance-In 1.png')}}" alt="">
                                </div>
                                <div class="trip">
                                    <input type="text" name="month" id="month" placeholder="Trip End">
                                    <img src="{{asset('assets/frontend/img/icon/Insurance-Out 1.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="headerTab__bottom">
                            <div class="header__infoTab">
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Return</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Passenger</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">All Cabins</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Preferred Airlines</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                            <div class="promoCode">
                                <button>Promo Code?</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Bus" role="tabpanel" aria-labelledby="nav-profile-tab"
                        tabindex="0">
                        <div class="headerTab__top">
                            <div class="header__inputSearch">
                                <div class="fly">
                                    <select name="flyFrom" id="flyFrom">
                                        <option value="flyingFrom">Travelling From</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-bus-fill"></i>
                                </div>
                                <i class="fa-solid fa-code-compare"></i>
                                <div class="fly">
                                    <select name="flyTo" id="flyTo">
                                        <option value="flyingTo">Travelling To</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-bus-fill"></i>
                                </div>
                            </div>
                            <div class="header__dateMonth">
                                <input type="date" name="month" id="month">
                                <input type="date" name="month" id="month">
                            </div>
                        </div>
                        <div class="headerTab__bottom justify-content-end">
                            <div class="promoCode">
                                <button>Promo Code?</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Hotel" role="tabpanel" aria-labelledby="nav-contact-tab"
                        tabindex="0">
                        <div class="headerTab__top">
                            <div class="header__inputSearch">
                                <div class="fly">
                                    <select name="flyFrom" id="flyFrom">
                                        <option value="flyingFrom">Location</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-map-2-line"></i>
                                </div>
                                <div class="fly">
                                    <select name="flyTo" id="flyTo">
                                        <option value="flyingTo">2 Adults - 0 Child</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i style="top: 5px;" class="fa-solid fa-person-walking-luggage"></i>
                                </div>
                            </div>
                            <div class="header__dateMonth">
                                <input type="date" name="month" id="month">
                                <input type="date" name="month" id="month">
                            </div>
                        </div>
                        <div class="headerTab__bottom justify-content-end">
                            <div class="promoCode">
                                <button>Promo Code?</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Insurance" role="tabpanel" aria-labelledby="nav-disabled-tab"
                        tabindex="0">
                        <div class="headerTab__top">
                            <div class="header__inputSearch">
                                <div class="fly">
                                    <select name="flyFrom" id="flyFrom">
                                        <option value="flyingFrom">Flying From</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-takeoff-line"></i>
                                </div>
                                <i class="fa-solid fa-code-compare"></i>
                                <div class="fly">
                                    <select name="flyTo" id="flyTo">
                                        <option value="flyingTo">Flying To</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-land-line"></i>
                                </div>
                            </div>
                            <div class="header__dateMonth">
                                <input type="date" name="month" id="month">
                                <input type="date" name="month" id="month">
                            </div>
                        </div>
                        <div class="headerTab__bottom">
                            <div class="header__infoTab">
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Return</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Passenger</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">All Cabins</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Preferred Airlines</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                            <div class="promoCode">
                                <button>Promo Code?</button>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-Holidays" role="tabpanel" aria-labelledby="nav-disabled-tab"
                        tabindex="0">
                        <div class="headerTab__top">
                            <div class="header__inputSearch">
                                <div class="fly">
                                    <select name="flyFrom" id="flyFrom">
                                        <option value="flyingFrom">Flying From</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-takeoff-line"></i>
                                </div>
                                <i class="fa-solid fa-code-compare"></i>
                                <div class="fly">
                                    <select name="flyTo" id="flyTo">
                                        <option value="flyingTo">Flying To</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-land-line"></i>
                                </div>
                            </div>
                            <div class="header__dateMonth">
                                <input type="date" name="month" id="month">
                                <input type="date" name="month" id="month">
                            </div>
                        </div>
                        <div class="headerTab__bottom">
                            <div class="header__infoTab">
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Return</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Passenger</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">All Cabins</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Preferred Airlines</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                            <div class="promoCode">
                                <button>Promo Code?</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Event" role="tabpanel" aria-labelledby="nav-disabled-tab"
                        tabindex="0">
                        <div class="headerTab__top">
                            <div class="header__inputSearch">
                                <div class="fly">
                                    <select name="flyFrom" id="flyFrom">
                                        <option value="flyingFrom">Flying From</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-takeoff-line"></i>
                                </div>
                                <i class="fa-solid fa-code-compare"></i>
                                <div class="fly">
                                    <select name="flyTo" id="flyTo">
                                        <option value="flyingTo">Flying To</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-land-line"></i>
                                </div>
                            </div>
                            <div class="header__dateMonth">
                                <input type="date" name="month" id="month">
                                <input type="date" name="month" id="month">
                            </div>
                        </div>
                        <div class="headerTab__bottom">
                            <div class="header__infoTab">
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Return</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Passenger</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">All Cabins</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Preferred Airlines</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                            <div class="promoCode">
                                <button>Promo Code?</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Cars" role="tabpanel" aria-labelledby="nav-disabled-tab"
                        tabindex="0">
                        <div class="headerTab__top">
                            <div class="header__inputSearch">
                                <div class="fly">
                                    <select name="flyFrom" id="flyFrom">
                                        <option value="flyingFrom">Flying From</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-takeoff-line"></i>
                                </div>
                                <i class="fa-solid fa-code-compare"></i>
                                <div class="fly">
                                    <select name="flyTo" id="flyTo">
                                        <option value="flyingTo">Flying To</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-land-line"></i>
                                </div>
                            </div>
                            <div class="header__dateMonth">
                                <input type="date" name="month" id="month">
                                <input type="date" name="month" id="month">
                            </div>
                        </div>
                        <div class="headerTab__bottom">
                            <div class="header__infoTab">
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Return</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Passenger</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">All Cabins</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Preferred Airlines</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                            <div class="promoCode">
                                <button>Promo Code?</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Visa" role="tabpanel" aria-labelledby="nav-disabled-tab"
                        tabindex="0">
                        <div class="headerTab__top">
                            <div class="header__inputSearch">
                                <div class="fly">
                                    <select name="flyFrom" id="flyFrom">
                                        <option value="flyingFrom">Flying From</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-takeoff-line"></i>
                                </div>
                                <i class="fa-solid fa-code-compare"></i>
                                <div class="fly">
                                    <select name="flyTo" id="flyTo">
                                        <option value="flyingTo">Flying To</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                        <option value="bangladesh">bangladesh</option>
                                    </select>
                                    <i class="ri-flight-land-line"></i>
                                </div>
                            </div>
                            <div class="header__dateMonth">
                                <input type="date" name="month" id="month">
                                <input type="date" name="month" id="month">
                            </div>
                        </div>
                        <div class="headerTab__bottom">
                            <div class="header__infoTab">
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Return</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Passenger</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">All Cabins</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                                <div class="select">
                                    <select name="return" id="return">
                                        <option value="canada">Preferred Airlines</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                        <option value="canada">canada</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line"></i>
                                </div>
                            </div>
                            <div class="promoCode">
                                <button>Promo Code?</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab__button">
                <a href="flightBooking.html">
                    <div class="tabclick" id="nav-Flight" role="tabpanel" aria-labelledby="nav-disabled-tab"
                        tabindex="0">
                        <div class="tabImg">
                            <img src="{{asset('assets/frontend/img/icon/Airplane Take Off.png')}}" alt="">
                        </div>
                        <p>Find Flight</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- ================= HERO BANNER END ================== -->
    <!-- ================= RENTEL LISTING START ==================== -->
    <section class="rentelListing__section ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="rentelListing__title">
                        <h2>Rentel Listing</h2>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="swiper rentelSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="rentel__card">
                                    <div class="rentelCard__bg"
                                        style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 217.png')}}');">
                                        <div class="wishList__box"></div>
                                        <i class="ri-heart-3-line wish"></i>
                                    </div>
                                    <div class="rentelCard__content">
                                        <div class="rentel__titleStart">
                                            <div class="rt__title">
                                                <h3>Dylan Hotel</h3>
                                                <div class="star">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </div>
                                            </div>
                                            <div class="rt__rating">
                                                <p>Very Good <span>5 reviews</span></p>
                                                <h6>4.4/5</h6>
                                            </div>
                                        </div>
                                        <div class="rentel__para">
                                            <p>Facilities: Wake-up call . Car hire . Flat Tv . Laundry and dry
                                                cleaning . Internet – Wifi.</p>
                                        </div>
                                        <div class="rentel__address">
                                            <div class="rt__location">
                                                <i class="ri-map-pin-2-fill"></i>
                                                <span>California</span>
                                            </div>
                                            <div class="rt__price">
                                                <p>from <span>$550</span>/night</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rentel__btn">
                                        <a href="holidaysBookingDetails.html" class="rt__btn">Book Now</a>
                                        <button class="rt__btn">View Details</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rentel__card">
                                    <div class="rentelCard__bg"
                                        style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 218.png')}}');">
                                        <div class="wishList__box"></div>
                                        <i class="ri-heart-3-line wish"></i>
                                    </div>
                                    <div class="rentelCard__content">
                                        <div class="rentel__titleStart">
                                            <div class="rt__title">
                                                <h3>Dylan Hotel</h3>
                                                <div class="star">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </div>
                                            </div>
                                            <div class="rt__rating">
                                                <p>Very Good <span>5 reviews</span></p>
                                                <h6>4.4/5</h6>
                                            </div>
                                        </div>
                                        <div class="rentel__para">
                                            <p>Facilities: Wake-up call . Car hire . Flat Tv . Laundry and dry
                                                cleaning . Internet – Wifi.</p>
                                        </div>
                                        <div class="rentel__address">
                                            <div class="rt__location">
                                                <i class="ri-map-pin-2-fill"></i>
                                                <span>California</span>
                                            </div>
                                            <div class="rt__price">
                                                <p>from <span>$550</span>/night</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rentel__btn">
                                        <a href="holidaysBookingDetails.html" class="rt__btn">Book Now</a>
                                        <button class="rt__btn">View Details</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rentel__card">
                                    <div class="rentelCard__bg"
                                        style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 219.png')}}');">
                                        <div class="wishList__box"></div>
                                        <i class="ri-heart-3-line wish"></i>
                                    </div>
                                    <div class="rentelCard__content">
                                        <div class="rentel__titleStart">
                                            <div class="rt__title">
                                                <h3>Dylan Hotel</h3>
                                                <div class="star">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </div>
                                            </div>
                                            <div class="rt__rating">
                                                <p>Very Good <span>5 reviews</span></p>
                                                <h6>4.4/5</h6>
                                            </div>
                                        </div>
                                        <div class="rentel__para">
                                            <p>Facilities: Wake-up call . Car hire . Flat Tv . Laundry and dry
                                                cleaning . Internet – Wifi.</p>
                                        </div>
                                        <div class="rentel__address">
                                            <div class="rt__location">
                                                <i class="ri-map-pin-2-fill"></i>
                                                <span>California</span>
                                            </div>
                                            <div class="rt__price">
                                                <p>from <span>$550</span>/night</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rentel__btn">
                                        <a href="holidaysBookingDetails.html" class="rt__btn">Book Now</a>
                                        <button class="rt__btn">View Details</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rentel__card">
                                    <div class="rentelCard__bg"
                                        style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 217.png')}}');">
                                        <div class="wishList__box"></div>
                                        <i class="ri-heart-3-line wish"></i>
                                    </div>
                                    <div class="rentelCard__content">
                                        <div class="rentel__titleStart">
                                            <div class="rt__title">
                                                <h3>Dylan Hotel</h3>
                                                <div class="star">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </div>
                                            </div>
                                            <div class="rt__rating">
                                                <p>Very Good <span>5 reviews</span></p>
                                                <h6>4.4/5</h6>
                                            </div>
                                        </div>
                                        <div class="rentel__para">
                                            <p>Facilities: Wake-up call . Car hire . Flat Tv . Laundry and dry
                                                cleaning . Internet – Wifi.</p>
                                        </div>
                                        <div class="rentel__address">
                                            <div class="rt__location">
                                                <i class="ri-map-pin-2-fill"></i>
                                                <span>California</span>
                                            </div>
                                            <div class="rt__price">
                                                <p>from <span>$550</span>/night</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rentel__btn">
                                        <a href="holidaysBookingDetails.html" class="rt__btn">Book Now</a>
                                        <button class="rt__btn">View Details</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rentel__card">
                                    <div class="rentelCard__bg"
                                        style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 218.png')}}');">
                                        <div class="wishList__box"></div>
                                        <i class="ri-heart-3-line wish"></i>
                                    </div>
                                    <div class="rentelCard__content">
                                        <div class="rentel__titleStart">
                                            <div class="rt__title">
                                                <h3>Dylan Hotel</h3>
                                                <div class="star">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </div>
                                            </div>
                                            <div class="rt__rating">
                                                <p>Very Good <span>5 reviews</span></p>
                                                <h6>4.4/5</h6>
                                            </div>
                                        </div>
                                        <div class="rentel__para">
                                            <p>Facilities: Wake-up call . Car hire . Flat Tv . Laundry and dry
                                                cleaning . Internet – Wifi.</p>
                                        </div>
                                        <div class="rentel__address">
                                            <div class="rt__location">
                                                <i class="ri-map-pin-2-fill"></i>
                                                <span>California</span>
                                            </div>
                                            <div class="rt__price">
                                                <p>from <span>$550</span>/night</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rentel__btn">
                                        <a href="holidaysBookingDetails.html" class="rt__btn">Book Now</a>
                                        <button class="rt__btn">View Details</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="rentel__card">
                                    <div class="rentelCard__bg"
                                        style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 219.png')}}');">
                                        <div class="wishList__box"></div>
                                        <i class="ri-heart-3-line wish"></i>
                                    </div>
                                    <div class="rentelCard__content">
                                        <div class="rentel__titleStart">
                                            <div class="rt__title">
                                                <h3>Dylan Hotel</h3>
                                                <div class="star">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                </div>
                                            </div>
                                            <div class="rt__rating">
                                                <p>Very Good <span>5 reviews</span></p>
                                                <h6>4.4/5</h6>
                                            </div>
                                        </div>
                                        <div class="rentel__para">
                                            <p>Facilities: Wake-up call . Car hire . Flat Tv . Laundry and dry
                                                cleaning . Internet – Wifi.</p>
                                        </div>
                                        <div class="rentel__address">
                                            <div class="rt__location">
                                                <i class="ri-map-pin-2-fill"></i>
                                                <span>California</span>
                                            </div>
                                            <div class="rt__price">
                                                <p>from <span>$550</span>/night</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rentel__btn">
                                        <a href="holidaysBookingDetails.html" class="rt__btn">Book Now</a>
                                        <button class="rt__btn">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= RENTEL LISTING END ==================== -->
    <!-- ================= SPECIAL OFFER START =================== -->
    <section class="specialOffer__section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12 mb-4 mb-lg-0">
                    <div class="specialOffer__box"
                        style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 224.png')}}');">
                        <div class="spcial_left_box">
                            <span>HOLIDAY SALE</span>
                            <h3>Special Offers</h3>
                            <p>Find Your Perfect Hotels Get the best prices on 20,000+ properties the best prices
                                on.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 mb-4 col-sm-0 col-12">
                    <div class="specialOffer__box specialOffer__box2"
                        style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 225.png')}}');">
                        <div class="spOffer__icon">
                            <img src="{{asset('assets/frontend/img/icon/Mail.png')}}" alt="">
                        </div>
                        <h2>Newsletters</h2>
                        <p>Join for free and get our
                            tailored newsletters full of
                            hot travel deals.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 col-12">
                    <div class="specialOffer__box specialOffer__box2 specialOffer__box3"
                        style="background-image: url('{{asset('assets/frontend/img/background/Rectangle 226.png')}}');">
                        <div class="spOffer__icon">
                            <img src="{{asset('assets/frontend/img/icon/Island On Water.png')}}" alt="">
                        </div>
                        <h2>Travel Tips</h2>
                        <p>Tips from our travel experts
                            to make your next trip even
                            better.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= SPECIAL OFFER END =================== -->

    <!-- ================= TOP DESTINATION START =================== -->
    <section class="topdestination__section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="topdestination__title text-center mb-5">
                        <h2>Top Destinations</h2>
                        <p>It is a long established fact that a reader</p>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="swiper topDesSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>PARIS</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 149.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NEW YORK</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 150.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>CALIFORNIA</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 151.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NEW JERSEY</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 152.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NETHERLANDS</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 153.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>FINLAND</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 154.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>PARIS</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 149.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NEW YORK</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 150.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>CALIFORNIA</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 151.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NEW JERSEY</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 152.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NETHERLANDS</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 153.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>FINLAND</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 154.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>PARIS</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 149.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NEW YORK</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 150.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>CALIFORNIA</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 151.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NEW JERSEY</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 152.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NETHERLANDS</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 153.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>FINLAND</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 154.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>PARIS</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 149.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NEW YORK</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 150.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>CALIFORNIA</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 151.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NEW JERSEY</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 152.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>NETHERLANDS</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 153.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 px-4 mb-5 mb-md-0">
                                        <a href="topDestination.html">
                                            <div class="topDes__box">
                                                <div class="topDes__content">
                                                    <h5>FINLAND</h5>
                                                    <p>9 HOTEL . 15 TOUR</p>
                                                </div>
                                                <div class="topDes__img">
                                                    <img src="{{asset('assets/frontend/img/background/Rectangle 154.png')}}" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next topDesArrow"><i class="fa-regular fa-chevron-right"></i>
                        </div>
                        <div class="swiper-button-prev topDesArrow"><i class="fa-regular fa-chevron-left"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= TOP DESTINATION END =================== -->

    <!-- ================= HAPPY CLIENTS START ================= -->
    <section class="hppyClient__section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hppyClient__title mb-5 text-center">
                        <h2>Our Happy Clients</h2>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="client__box">
                        <div class="client__info">
                            <div class="client__img">
                                <img src="{{asset('assets/frontend/img/icon/pexels-verschoren-maurits-3754833.jpg')}}" alt="">
                            </div>
                            <div class="client__nameRate">
                                <h4>Eva Hicks</h4>
                                <div class="star">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="client__content">
                            <p>Faucibus tristique felis potenti ultrices ornare
                                rhoncus semper hac facilisi Rutrum tellus
                                lorem sem velit nisi non pharetra in dui.
                            </p>
                            <a href="#">More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="client__box">
                        <div class="client__info">
                            <div class="client__img">
                                <img src="{{asset('assets/frontend/img/icon/N5PLzyan.jpg')}}" alt="">
                            </div>
                            <div class="client__nameRate">
                                <h4>Donald Wolf</h4>
                                <div class="star">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="client__content">
                            <p>Faucibus tristique felis potenti ultrices ornare
                                rhoncus semper hac facilisi Rutrum tellus
                                lorem sem velit nisi non pharetra in dui.
                            </p>
                            <a href="#">More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="client__box">
                        <div class="client__info">
                            <div class="client__img">
                                <img src="{{asset('assets/frontend/img/icon/pexels-anastasiya-lobanovskaya-789303.jpg')}}" alt="">
                            </div>
                            <div class="client__nameRate">
                                <h4>Charlie Hicks</h4>
                                <div class="star">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="client__content">
                            <p>Faucibus tristique felis potenti ultrices ornare
                                rhoncus semper hac facilisi Rutrum tellus
                                lorem sem velit nisi non pharetra in dui.
                            </p>
                            <a href="#">More...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================= HAPPY CLIENTS END ================= -->

</main>




@endsection
