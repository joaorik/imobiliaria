@extends('site.layout.main')

@section('seo')
    <meta name="keywords" content="{{ $settings->meta_keywords }}">
    <meta name="description" content="{{ $settings->meta_description }}">
    <meta name="robots" content="index, follow">

    <meta property="og:locale" content="pt_BR"/>
    <meta property="og:site_name" content="{{ $settings->site_title }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:image" content="{{ asset('imobiliaria.jpg') }}"/>
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="761">
    <meta property="og:url" content="{{ url('sobre') }}"/>
    <meta property="og:title" content="{{ $settings->site_title }}"/>
    <meta property="og:description" content="{{ $settings->meta_description }}"/>
@endsection

@section('title', 'Sobre')

@section('content')

    <section>
        <div class="page-title-container bg-image bg-cover bg-pattern">
            <div class="page-title">
                <div class="container">
                    <h1>Sobre</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="section-delimiter"></div>
    </div>

    <section>
        <div class="section-content">
            <div class="container">
                <div class="section-header onscroll-animate" data-animation="fadeInLeft">
                    <h1>Sobre a empresa</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 onscroll-animate">

                        <p>{{ $settings->about }}</p>

                    </div><!-- .col-md-4 -->

                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .section-content -->
    </section>

    <section>
        <div class="section-content">
            <div class="container">
                <div class="section-header onscroll-animate">
                    <h1>Serviços</h1>
                </div>
                <div class="row">
                    <div class="col-md-12 onscroll-animate">
                        @foreach($services as $service)
                            <h3 class="text-center">{{ $service->title }}</h3>
                            <p>{!! $service->content !!}</p>
                            <div class="margin-10"></div>
                        @endforeach
                        <div class="margin-40"></div>
                    </div><!-- .col-md-4 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .section-content -->
    </section>

@endsection
