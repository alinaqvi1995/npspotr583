@extends('layouts.guest')

@section('title', 'Home')

@section('content')
    <!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center mb-5">Blog Details</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="{{ route('home') }}">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span>Blog</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== breadcrumb End ==============-->

    <!--========== blog details Start ==============-->
    <section class="tj-blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="page-details-wrapper">
                        <div class="tj-blog-item-three">
                            <div class="tj-blog-image">
                                <a href="#">
                                    <img src="{{ asset($blog->image_one) }}" alt="Blog" /></a>
                            </div>
                            <div class="active-text">
                                <a href="#"> {{ $blog->header_image_btn }}</a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-header">
                                    <h3>
                                        <a class="title-link" href="#">
                                            {{ $blog->title }}
                                        </a>
                                    </h3>
                                </div>
                                <div class="blog-meta">
                                    <div class="meta-list">
                                        <ul class="list-gap">
                                            <li><i class="fa-light fa-user"></i> <a href="#"> {{ $blog->author }}</a>
                                            </li>
                                            <li>
                                                <i class="flaticon-calendar"></i>
                                                <span>
                                                    {{ $blog->created_at ? $blog->created_at->format('F d, Y') : '-' }}
                                                </span>
                                            </li>
                                            <li><i class="fa-light fa-comment"></i> <span> Comment (5)</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p>
                                {!! $blog->excerpt !!}
                            </p>
                        </div>
                        <div class="row align-items-center">
                            <div class="">
                                <h3>{{ $blog->heading_one }}</h3>
                                <p> {!! $blog->description_one !!}</p>
                            </div>
                        </div>
                        {{-- <div class="row align-items-center">
                            <div class="col-lg-5 col-md-6">
                                <div class="check-image">
                                    <img src="{{ asset($blog->image_two) }}" alt="Blog" />
                                </div>
                            </div>
                            @php
                                $points = [
                                    $blog->description_two_one,
                                    $blog->description_two_two,
                                    $blog->description_two_three,
                                    $blog->description_two_four,
                                    $blog->description_two_five,
                                    $blog->description_two_six,
                                    $blog->description_two_seven,
                                ];
                            @endphp

                            <div class="">
                                <div class="check-list">
                                    <ul class="list-gap">
                                        @foreach ($points as $point)
                                            @if ($point)
                                                <li><i class="fa-light fa-check"></i> {!! $point !!}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="details-video-content">
                            <h4 class="title">{{ $blog->heading_two }}</h4>
                            <p>
                                {!! $blog->description_two !!}
                            </p>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="video-image">
                                        <img src="{{ asset($blog->image_three) }}" alt="Image" />
                                        <div class="video-box">
                                            <a class="popup-videos-button" data-autoplay="true" data-vbtype="video"
                                                href="https://www.youtube.com/watch?v=ADmQTw4qqTY">
                                                <i class="fa-solid fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="blog-image">
                                        <img src="{{ asset($blog->image_four) }}" alt="Image" />
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="details-quote-content">
                            <h4 class="title">{{ $blog->heading_three }}</h4>
                            <p>
                                {!! $blog->description_three !!}
                            </p>
                            <div class="details-quote-box">
                                <img src="{{ asset('web-assets/images/icon/quote.svg') }}" alt="Icon" />
                                <p>
                                    {!! $blog->author_note !!}
                                </p>
                                <h5 class="title">{{ $blog->author }}</h5>
                            </div>
                        </div> --}}
                        @if (!empty($blog->tags))
                            <div class="details-tags-box">
                                <div class="tags-link">
                                    <span> Tags</span>
                                    @foreach (explode(',', $blog->tags) as $tag)
                                        <a href="javascript:void(0)">{{ strtoupper(trim($tag)) }}</a>
                                    @endforeach
                                </div>
                                <div class="share-link">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        @endif
                        {{-- <div class="details-comment-content">
                            <h4 class="details_title">Comments (2)</h4>
                            <div class="comment-auother-box">
                                <div class="auother-image">
                                    <img src="{{ asset('web-assets/images/blog/blog-1.png') }}" alt="Blog" />
                                </div>
                                <div class="auother-content">
                                    <h4><a class="title-link" href="#"> Isaac Herman</a></h4>
                                    <span> June 14, 2023 / 12:00 AM</span>
                                    <p>
                                        Imperdiet in nulla sed viverraut loremut dapib estetur Lorem ipsum dolor sit
                                        amet eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut eniy
                                        minim sed exe ullamco laboris nisi ut aliquip cepteur
                                    </p>
                                    <div class="detils-reply">
                                        <a href="#"> Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-auother-box">
                                <div class="auother-image">
                                    <img src="{{ asset('web-assets/images/blog/blog-2.png') }}" alt="Blog" />
                                </div>
                                <div class="auother-content">
                                    <h4><a class="title-link" href="#"> John Doe</a></h4>
                                    <span> June 12, 2023 / 12:05 AM</span>
                                    <p>
                                        Imperdiet in nulla sed viverraut loremut dapib estetur Lorem ipsum dolor sit
                                        amet eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut eniy
                                        minim sed exe ullamco laboris nisi ut aliquip cepteur
                                    </p>
                                    <div class="detils-reply">
                                        <a href="#"> Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-title">
                                <h4 class="details_title">Leave a Reply</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="details-input">
                                    <input type="text" id="name" name="name" placeholder="Your Name"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="details-input">
                                    <input type="text" id="emailAdd" name="name" placeholder="Email Address"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="details-input">
                                    <input type="text" id="site" name="name" placeholder="Email Address"
                                        required="" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="details-input">
                                    <textarea name="massage" class="form-control" cols="30" rows="10" placeholder="Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tj-theme-button">
                                    <button class="tj-primary-btn submit-btn" type="submit" value="submit">
                                        Post Comment <i class="fa-light fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details-sidebar-inner">
                        <div class="tj-sidebar-widget sidebar-search">
                            <form action="{{ route('blogs.index') }}" method="GET">
                                <input type="text" class="form-control" name="search" id="searchOne"
                                    placeholder="Search" value="{{ request('search') }}" />
                                <button type="submit" class="btn btn-link p-0 border-0">
                                    <i class="flaticon-loupe"></i>
                                </button>
                            </form>
                        </div>
                        <div class="tj-sidebar-widget sidebar-post">
                            <h5 class="details_title">Popular Post</h5>
                            @foreach ($recentBlogs as $row)
                                @if ($row->id != $blog->id)
                                    <div class="tj-post-content">
                                        <div class="tj-auother-img">
                                            <a href="#">
                                                <img src="{{ asset($row->image_one) }}" alt="Blog" /></a>
                                        </div>
                                        <div class="tj-details-text">
                                            <div class="details-meta">
                                                <ul class="list-gap">
                                                    <li>
                                                        <i class="flaticon-calendar"></i>
                                                        {{ $blog->created_at ? $blog->created_at->format('M d, Y') : '-' }}
                                                    </li>
                                                    {{-- <li><i class="fa-light fa-comment"></i> (05)</li> --}}
                                                </ul>
                                            </div>
                                            <div class="tj-details-header">
                                                <h6>
                                                    <a href="#">{{ $row->title }}</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- <div class="tj-sidebar-widget sidebar-catagory">
                            <h5 class="details_title">All Catagory</h5>
                            <ul class="list-gap">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="#">{{ $category->name }}
                                            <span> {{ count($category->blogs) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== blog details End ==============-->
@endsection
