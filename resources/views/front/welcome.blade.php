@extends('layouts.app')
@section('content')
    <section  class="homepage-slider" id="home-slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="{{ asset('frontend_theme/themes/images/carousel/banner-1.jpg')}}" alt="" />
                </li>
                <li>
                    <img src="{{ asset('frontend_theme/themes/images/carousel/banner-2.jpg')}}" alt="" />
                    <div class="intro">
                        <h1>Mid season sale</h1>
                        <p><span>Up to 50% Off</span></p>
                        <p><span>On selected items online and in stores</span></p>
                    </div>
                </li>
            </ul>
        </div>			
    </section>
    <section class="header_text">
        We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates. 
        <br/>Don't miss to use our cheap abd best bootstrap templates.
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">													
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
                            <span class="pull-right">
                                <a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
                            </span>
                        </h4>
                        <div id="myCarousel" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">	
                                    @if($homedata['featured'])	
                                       @foreach($homedata['featured'] as $featured)										
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <p><a href="product_detail.html"><img src="{{ ('public/product/'.$featured  ->image) }}" alt="" style="height:285px; width:80%" /></a></p>
                                                <a href="product_detail.html" class="title">{{ $featured->title }}</a><br/>
                                                <a href="products.html" class="category">{{ $featured->category_name }}</a>
                                                <p class="price">${{ $featured->price }}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    @else
                                    <li>Featured products are not available..</li>
                                    @endif    
                                    </ul>
                                </div>
                                <!-- <div class="item">
                                    <ul class="thumbnails">
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{ asset('frontend_theme/themes/images/ladies/5.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Know exactly</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$22.30</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{ asset('frontend_theme/themes/images/ladies/6.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                                <a href="products.html" class="category">Commodo consequat</a>
                                                <p class="price">$40.25</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{ asset('frontend_theme/themes/images/ladies/7.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">You think water</a><br/>
                                                <a href="products.html" class="category">World once</a>
                                                <p class="price">$10.45</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{ asset('frontend_theme/themes/images/ladies/8.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Quis nostrud exerci</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$35.50</p>
                                            </div>
                                        </li>																																	
                                    </ul>
                                </div> -->
                            </div>							
                        </div>
                    </div>						
                </div>
                <br/>
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
                            <span class="pull-right">
                                <a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
                            </span>
                        </h4>
                        <div id="myCarousel-2" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">												
                                    @if($homedata['New_Arraival'])	
                                       @foreach($homedata['New_Arraival'] as $new_arraival)										
                                        <li class="span3">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>
                                                <p><a href="product_detail.html"><img src="{{ ('public/product/'.$new_arraival->image) }}" alt="{{ $new_arraival->title }}" style="height:285px; width:80%"/></a></p>
                                                <a href="product_detail.html" class="title">{{ $new_arraival->title }}</a><br/>
                                                <a href="products.html" class="category">{{ $new_arraival->category_name }}</a>
                                                <p class="price">${{ $new_arraival->price }}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    @else
                                    <li>Featured products are not available..</li>
                                    @endif
                                    </ul>
                                </div>
                                <!-- <div class="item">
                                    <ul class="thumbnails">
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{ asset('frontend_theme/themes/images/cloth/bootstrap-women-ware4.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Know exactly</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$45.50</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{ asset('frontend_theme/themes/images/cloth/bootstrap-women-ware3.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Ut wisi enim ad</a><br/>
                                                <a href="products.html" class="category">Commodo consequat</a>
                                                <p class="price">$33.50</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{ asset('frontend_theme/themes/images/cloth/bootstrap-women-ware2.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">You think water</a><br/>
                                                <a href="products.html" class="category">World once</a>
                                                <p class="price">$45.30</p>
                                            </div>
                                        </li>
                                        <li class="span3">
                                            <div class="product-box">
                                                <p><a href="product_detail.html"><img src="{{ asset('frontend_theme/themes/images/cloth/bootstrap-women-ware1.jpg')}}" alt="" /></a></p>
                                                <a href="product_detail.html" class="title">Quis nostrud exerci</a><br/>
                                                <a href="products.html" class="category">Quis nostrud</a>
                                                <p class="price">$25.20</p>
                                            </div>
                                        </li>																																	
                                    </ul>
                                </div> -->
                            </div>							
                        </div>
                    </div>						
                </div>
                <div class="row feature_box">						
                    <div class="span4">
                        <div class="service">
                            <div class="responsive">	
                                <img src="{{ asset('frontend_theme/themes/images/feature_img_2.png')}}" alt="" />
                                <h4>MODERN <strong>DESIGN</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
                            </div>
                        </div>
                    </div>
                    <div class="span4">	
                        <div class="service">
                            <div class="customize">			
                                <img src="{{ asset('frontend_theme/themes/images/feature_img_1.png')}}" alt="" />
                                <h4>FREE <strong>SHIPPING</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="support">	
                                <img src="{{ asset('frontend_theme/themes/images/feature_img_3.png')}}" alt="" />
                                <h4>24/7 LIVE <strong>SUPPORT</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
                            </div>
                        </div>
                    </div>	
                </div>		
            </div>				
        </div>
    </section>
    <section class="our_client">
        <h4 class="title"><span class="text">Manufactures</span></h4>
        <div class="row">					
        @if($homedata['Brand'])	
            @foreach($homedata['Brand'] as $brand)							
            <div class="span2">
            <a href="#"><img alt="" src="{{ ('public/brand/'.$brand->image) }}"></a>
            </div>
            @endforeach
        @else
            <li>Brand are not available..</li>
        @endif  
            
        </div>
    </section>
@endsection