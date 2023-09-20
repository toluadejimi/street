@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <!-- news-section start -->
    <section class="news-section news-details-section ptb-80">
        <div class="container">
            <figure class="figure highlight-background highlight-background--lean-left">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1439px"
                    height="480px">
                    <defs>
                        <linearGradient id="PSgrad_4" x1="42.262%" x2="0%" y1="90.631%" y2="0%">
                            <stop offset="28%" stop-color="rgb(245,246,252)" stop-opacity="1" />
                            <stop offset="100%" stop-color="rgb(255,255,255)" stop-opacity="1" />
                        </linearGradient>
                    </defs>
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                        d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                    <path fill="url(#PSgrad_4)"
                        d="M863.247,-271.203 L-345.788,-427.818 L760.770,642.200 L1969.805,798.815 L863.247,-271.203 Z" />
                </svg>
            </figure>
            <div class="news-area">
                <div class="row justify-content-center ml-b-30">
                    <div class="col-lg-8 mrb-30">
                        <div class="news-item">
                            <div class="news-thumb">
                                <img src="{{ getImage('assets/images/frontend/blog/' . @$blog->data_values->image, '770x390') }}"
                                    alt="@lang('news')">
                            </div>
                            <div class="news-content news-details-content">
                                <h3 class="title">{{ __(@$blog->data_values->title) }}</h3>
                                @php echo @$blog->data_values->description @endphp
                            </div>

                            <div class="fb-comments"
                                data-href="{{ route('blog.details', [$blog->id, slug($blog->data_values->title)]) }}"
                                data-numposts="5">
                            </div>
                            <div class="row gy-4 justify-content-between">
                                <div class="col-md-6 social-area">
                                    <h6 class="post__share__title text--base">@lang('Share now')</h6>
                                    <ul class="post__share d-flex footer-social">

                                        <li>
                                            <a target="_blank" class="t-link social-list__icon"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}">
                                                <i class="lab la-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" class="t-link social-list__icon"
                                                href="https://twitter.com/intent/tweet?text={{ __(@$blog->data_values->title) }}%0A{{ url()->current() }}">
                                                <i class="lab la-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" class="t-link social-list__icon"
                                                href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title={{ __(@$blog->data_values->title) }}&amp;summary={{ __(@$blog->data_values->description) }}">
                                                <i class="lab la-linkedin-in"></i>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <div class="comments-area">
                                <div class="comment-area comments-list">
                                    <div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5"></div>
                                </div>
                            </div><!-- comments-area end -->
                        </div>

                        @if (\App\Models\Extension::where('act', 'fb-comment')->where('status', 1)->first())
                            <div class="news-item">
                                <div class="news-content news-details-content">
                                    <h3 class="title">@lang('Leave a comment')</h3>
                                    <div class="fb-comments"
                                        data-href="{{ route('blog.details', [$blog->id, slug($blog->data_values->title)]) }}"
                                        data-numposts="5"></div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="col-lg-4 mrb-30">
                        <div class="sidebar">
                            <div class="widget-box">
                                <div class="popular-widget-box">
                                    <h3 class="widget-title">@lang('Latest Blogs')</h3>
                                    @forelse($recent_blogs as $item)
                                        <div class="single-popular-item d-flex flex-wrap">
                                            <div class="popular-item-thumb">
                                                <a
                                                    href="{{ route('blog.details', [$item->id, slug($item->data_values->title)]) }}"><img
                                                        src="{{ getImage('assets/images/frontend/blog/thumb_' . @$item->data_values->image, '60x60') }}"
                                                        alt="@lang('blog image')"></a>
                                            </div>
                                            <div class="popular-item-content">
                                                <h5 class="blog-user"><a
                                                        href="{{ route('blog.details', [$item->id, slug($item->data_values->title)]) }}">{{ __(@$item->data_values->title) }}</a>
                                                </h5>
                                                <span class="blog-date">{{ diffForHumans($item->created_at) }}</span>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="single-popular-item d-flex flex-wrap">
                                            {{ __($emptyMessage) }}
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news-section end -->
@endsection
@push('fbComment')
    @php echo loadExtension('fb-comment') @endphp
@endpush
