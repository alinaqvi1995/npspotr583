@extends('layouts.guest')
@section('title', 'Blog')
@section('content')
    <style>
        .tj-blog-image {
            width: 100%;
            height: 250px;
            /* or any fixed height you want for consistency */
            overflow: hidden;
            /* ensures no overflow if image is larger */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tj-blog-image img.blog-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* ensures image fills container without distortion */
        }
    </style>
    <!--========== breadcrumb Start ==============-->
    <section class="breadcrumb-wrapper" data-bg-image="{{ asset('web-assets/images/banner/cta-bg.webp') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h1 class="breadcrumb-title text-center">Blog Grid</h1>
                        <div class="breadcrumb-link">
                            <span>
                                <a href="#">
                                    <span>Home</span>
                                </a>
                            </span>
                            >
                            <span>
                                <span> Blog</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========== breadcrumb End ==============-->

    <!--=========== Blog Section Start =========-->
    <section class="tj-blog-section">
        <div class="container">
            <div class="row">
                <div class="tj-section-heading text-center">
                    <span class="sub-title active-shape"> Latest News</span>
                    <h2 class="title">Latest News & Blog</h2>
                </div>
            </div>
            <div class="row">
                {{-- @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                        <div class="tj-blog-item">
                            <div class="tj-blog-image">
                                <a href="{{ route('blog.show', $blog->slug) }}"> <img src="{{ asset($blog->image_one) }}"
                                        alt="Blog" /></a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-meta">
                                    <div class="meta-date">
                                        <ul class="list-gap">
                                            <li>{{ $blog->created_at ? $blog->created_at->format('d') : '-' }}</li>
                                            <li>{{ $blog->created_at ? $blog->created_at->format('M') : '-' }}</li>
                                        </ul>
                                    </div>
                                    <div class="meta-list">
                                        <ul class="list-gap">
                                            <li><i class="fa-light fa-user"></i><a
                                                    href="{{ route('blog.show', $blog->slug) }}"> {{ $blog->author }}</a>
                                            </li>
                                            <li><i class="fa-light fa-comment"></i> <span> Comment (5)</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-text-box">
                                    <div class="blog-header">
                                        <h4>
                                            <a class="title-link" href="{{ route('blog.show', $blog->slug) }}">
                                                {{ $blog->title }}</a>
                                        </h4>
                                        <p>
                                            {!! $blog->description_one !!}
                                        </p>
                                    </div>
                                    <div class="blog-button">
                                        <ul class="list-gap">
                                            <li>
                                                <a href="{{ route('blog.show', $blog->slug) }}">
                                                    Read More <i class="fa-regular fa-arrow-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                        <div class="tj-blog-item">
                            <div class="tj-blog-image">
                                <a href="{{ route('blog.show', $blog->slug) }}">
                                    <img src="{{ asset($blog->image_one) }}" alt="Blog" class="blog-img" />
                                </a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-meta">
                                    <div class="meta-date">
                                        <ul class="list-gap">
                                            <li>{{ $blog->created_at ? $blog->created_at->format('d') : '-' }}</li>
                                            <li>{{ $blog->created_at ? $blog->created_at->format('M') : '-' }}</li>
                                        </ul>
                                    </div>
                                    <div class="meta-list">
                                        <ul class="list-gap">
                                            <li>
                                                <i class="fa-light fa-user"></i>
                                                <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->author }}</a>
                                            </li>
                                            <li><i class="fa-light fa-comment"></i> <span> Comment (5)</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-text-box">
                                    <div class="blog-header">
                                        <h4>
                                            <a class="title-link" href="{{ route('blog.show', $blog->slug) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h4>
                                        <p>{!! Str::limit(strip_tags($blog->description_one), 100, '...') !!}</p>
                                    </div>
                                    <div class="blog-button">
                                        <ul class="list-gap">
                                            <li>
                                                <a href="{{ route('blog.show', $blog->slug) }}">
                                                    Read More <i class="fa-regular fa-arrow-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <div class="tj-blog-item">
                            <div class="tj-blog-image">
                                <a href=""> <img src="web-assets/images/blog/blog-2.jpg" alt="Blog" /></a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-meta">
                                    <div class="meta-date">
                                        <ul class="list-gap">
                                            <li>12</li>
                                            <li>Feb</li>
                                        </ul>
                                    </div>
                                    <div class="meta-list">
                                        <ul class="list-gap">
                                            <li><i class="fa-light fa-user"></i><a href="#"> Admin</a></li>
                                            <li><i class="fa-light fa-comment"></i> <span> Comment (5)</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-text-box">
                                    <div class="blog-header">
                                        <h4>
                                            <a class="title-link" href="">
                                                Introduce new suas boat service in this spring</a
                                            >
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, atomorum ds sosidon ium est as Id vim rrem
                                            princi pes suas molesti interpretaris
                                        </p>
                                    </div>
                                    <div class="blog-button">
                                        <ul class="list-gap">
                                            <li>
                                                <a href="">
                                                    Read More <i class="fa-regular fa-arrow-right"></i
                                                ></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                        <div class="tj-blog-item">
                            <div class="tj-blog-image">
                                <a href=""> <img src="web-assets/images/blog/blog-3.jpg" alt="Blog" /></a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-meta">
                                    <div class="meta-date">
                                        <ul class="list-gap">
                                            <li>18</li>
                                            <li>Nov</li>
                                        </ul>
                                    </div>
                                    <div class="meta-list">
                                        <ul class="list-gap">
                                            <li><i class="fa-light fa-user"></i> <a href="#"> Admin</a></li>
                                            <li><i class="fa-light fa-comment"></i> <span> Comment (5)</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-text-box">
                                    <div class="blog-header">
                                        <h4>
                                            <a class="title-link" href="">
                                                We very careful handling the valuable goods</a
                                            >
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, atomorum ds sosidon ium est as Id vim rrem
                                            princi pes suas molesti interpretaris
                                        </p>
                                    </div>
                                    <div class="blog-button">
                                        <ul class="list-gap">
                                            <li>
                                                <a href="">
                                                    Read More <i class="fa-regular fa-arrow-right"></i
                                                ></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                        <div class="tj-blog-item">
                            <div class="tj-blog-image">
                                <a href=""> <img src="web-assets/images/blog/blog-17.jpg" alt="Blog" /></a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-meta">
                                    <div class="meta-date">
                                        <ul class="list-gap">
                                            <li>12</li>
                                            <li>Dec</li>
                                        </ul>
                                    </div>
                                    <div class="meta-list">
                                        <ul class="list-gap">
                                            <li><i class="fa-light fa-user"></i><a href="#"> Admin</a></li>
                                            <li><i class="fa-light fa-comment"></i> <span> Comment (5)</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-text-box">
                                    <div class="blog-header">
                                        <h4>
                                            <a class="title-link" href="">
                                                Guarantees varying Complexity, Long-Term</a
                                            >
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, atomorum ds sosidon ium est as Id vim rrem
                                            princi pes suas molesti interpretaris
                                        </p>
                                    </div>
                                    <div class="blog-button">
                                        <ul class="list-gap">
                                            <li>
                                                <a href="">
                                                    Read More <i class="fa-regular fa-arrow-right"></i
                                                ></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <div class="tj-blog-item">
                            <div class="tj-blog-image">
                                <a href=""> <img src="web-assets/images/blog/blog-18.jpg" alt="Blog" /></a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-meta">
                                    <div class="meta-date">
                                        <ul class="list-gap">
                                            <li>19</li>
                                            <li>Apr</li>
                                        </ul>
                                    </div>
                                    <div class="meta-list">
                                        <ul class="list-gap">
                                            <li><i class="fa-light fa-user"></i><a href="#"> Admin</a></li>
                                            <li><i class="fa-light fa-comment"></i> <span> Comment (5)</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-text-box">
                                    <div class="blog-header">
                                        <h4>
                                            <a class="title-link" href="">
                                                Introduce new suas boat service in this spring</a
                                            >
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, atomorum ds sosidon ium est as Id vim rrem
                                            princi pes suas molesti interpretaris
                                        </p>
                                    </div>
                                    <div class="blog-button">
                                        <ul class="list-gap">
                                            <li>
                                                <a href="">
                                                    Read More <i class="fa-regular fa-arrow-right"></i
                                                ></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                        <div class="tj-blog-item">
                            <div class="tj-blog-image">
                                <a href=""> <img src="web-assets/images/blog/blog-19.jpg" alt="Blog" /></a>
                            </div>
                            <div class="blog-content-area">
                                <div class="blog-meta">
                                    <div class="meta-date">
                                        <ul class="list-gap">
                                            <li>02</li>
                                            <li>Jan</li>
                                        </ul>
                                    </div>
                                    <div class="meta-list">
                                        <ul class="list-gap">
                                            <li><i class="fa-light fa-user"></i> <a href="#"> Admin</a></li>
                                            <li><i class="fa-light fa-comment"></i> <span> Comment (5)</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="blog-text-box">
                                    <div class="blog-header">
                                        <h4>
                                            <a class="title-link" href="">
                                                We very careful handling the valuable goods</a
                                            >
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, atomorum ds sosidon ium est as Id vim rrem
                                            princi pes suas molesti interpretaris
                                        </p>
                                    </div>
                                    <div class="blog-button">
                                        <ul class="list-gap">
                                            <li>
                                                <a href="">
                                                    Read More <i class="fa-regular fa-arrow-right"></i
                                                ></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
    </section>
    <!--=========== Blog Section End =========-->

    <!--=========== Newsletter Section Start =========-->
    <section class="tj-subscribe-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="subscribe-content-box d-flex align-items-center justify-content-between"
                        data-bg-image="web-assets/images/banner/subscribe.png">
                        <div class="subscribe-content d-flex align-items-center">
                            <div class="mail-icon">
                                <img src="web-assets/images/icon/email.svg" alt="Icon" />
                            </div>
                            <div class="subscribe-title">
                                <h3 class="title">Subscribe Our Newslatter</h3>
                            </div>
                        </div>
                        <div class="subscribe-form d-flex align-items-center">
                            <div class="subscribe-input">
                                <input type="text" id="email" name="emailAddress" placeholder="Email Address"
                                    required="" />
                            </div>
                            <div class="tj-theme-button">
                                <button class="tj-submit-btn" type="submit" value="submit">
                                    Submit Now <i class="fa-light fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========== Newsletter Section End =========-->
@endsection
