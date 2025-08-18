@foreach($recentBlogs as $recentBlog)
    <div class="d-flex flex-wrap recent-blog-card ">
            <div class="recent-blog-details">
                <div>
                    <div class="author d-flex flex-wrap">
                    <div class="author d-flex flex-wrap">
                                    <div class="profile d-flex align-items-center flex-wrap">
                                    <img src="{{asset($recentBlog->admin_webp_image ?? $recentBlog->admin_image ?? 'web/images/blog/author.png')}}" width="35" height="35" {{$recentBlog->admin_image_attribute}}>
                                    <span>Written by {{$recentBlog->written_by ?? 'Admin'}}</span>
                                    <div class="views">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none"> <path d="M11.25 6C11.25 6.59674 11.0129 7.16903 10.591 7.59099C10.169 8.01295 9.59674 8.25 9 8.25C8.40326 8.25 7.83097 8.01295 7.40901 7.59099C6.98705 7.16903 6.75 6.59674 6.75 6C6.75 5.40326 6.98705 4.83097 7.40901 4.40901C7.83097 3.98705 8.40326 3.75 9 3.75C9.59674 3.75 10.169 3.98705 10.591 4.40901C11.0129 4.83097 11.25 5.40326 11.25 6Z" stroke="#596075" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path d="M1.5 6C2.7 2.92725 5.502 0.75 9 0.75C12.498 0.75 15.3 2.92725 16.5 6C15.3 9.07275 12.498 11.25 9 11.25C5.502 11.25 2.7 9.07275 1.5 6Z" stroke="#596075" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                                        6941
                                    </div>
                                </div>
                                <div class="meta">
                                    <div class="date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M12.375 3.75V2.25M5.625 3.75V2.25M2.4375 6H15.5625M2.25 7.533C2.25 5.94675 2.25 5.15325 2.577 4.54725C2.87268 4.00673 3.3315 3.57338 3.888 3.309C4.53 3 5.37 3 7.05 3H10.95C12.63 3 13.47 3 14.112 3.309C14.6768 3.5805 15.135 4.014 15.423 4.5465C15.75 5.154 15.75 5.9475 15.75 7.53375V11.2177C15.75 12.804 15.75 13.5975 15.423 14.2035C15.1273 14.744 14.6685 15.1774 14.112 15.4418C13.47 15.75 12.63 15.75 10.95 15.75H7.05C5.37 15.75 4.53 15.75 3.888 15.441C3.33161 15.1768 2.87281 14.7437 2.577 14.2035C2.25 13.596 2.25 12.8025 2.25 11.2162V7.533Z" stroke="#596075" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                                    {{ \Carbon\Carbon::parse($recentBlog->posted_date)->format('F j, Y') }}
                                
                                </div>
                                <div class="time">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M9.5625 5.25C9.5625 5.10082 9.50324 4.95774 9.39775 4.85225C9.29226 4.74676 9.14918 4.6875 9 4.6875C8.85082 4.6875 8.70774 4.74676 8.60225 4.85225C8.49676 4.95774 8.4375 5.10082 8.4375 5.25V9C8.43746 9.09537 8.46167 9.18918 8.50785 9.27262C8.55403 9.35606 8.62067 9.42639 8.7015 9.477L10.9515 10.8832C11.078 10.9624 11.2308 10.9881 11.3762 10.9546C11.4482 10.938 11.5163 10.9074 11.5765 10.8646C11.6366 10.8217 11.6878 10.7674 11.727 10.7048C11.7662 10.6421 11.7927 10.5724 11.8049 10.4995C11.8172 10.4266 11.8149 10.352 11.7984 10.28C11.7818 10.208 11.7512 10.14 11.7083 10.0798C11.6654 10.0196 11.6111 9.96845 11.5485 9.92925L9.5625 8.688V5.25Z" fill="#596075"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2.4375C7.25952 2.4375 5.59032 3.1289 4.35961 4.35961C3.1289 5.59032 2.4375 7.25952 2.4375 9C2.4375 10.7405 3.1289 12.4097 4.35961 13.6404C5.59032 14.8711 7.25952 15.5625 9 15.5625C10.7405 15.5625 12.4097 14.8711 13.6404 13.6404C14.8711 12.4097 15.5625 10.7405 15.5625 9C15.5625 7.25952 14.8711 5.59032 13.6404 4.35961C12.4097 3.1289 10.7405 2.4375 9 2.4375ZM3.5625 9C3.5625 8.28594 3.70314 7.57887 3.9764 6.91916C4.24966 6.25945 4.65019 5.66003 5.15511 5.15511C5.66003 4.65019 6.25945 4.24966 6.91916 3.9764C7.57887 3.70314 8.28594 3.5625 9 3.5625C9.71406 3.5625 10.4211 3.70314 11.0808 3.9764C11.7405 4.24966 12.34 4.65019 12.8449 5.15511C13.3498 5.66003 13.7503 6.25945 14.0236 6.91916C14.2969 7.57887 14.4375 8.28594 14.4375 9C14.4375 10.4421 13.8646 11.8252 12.8449 12.8449C11.8252 13.8646 10.4421 14.4375 9 14.4375C7.55789 14.4375 6.17484 13.8646 5.15511 12.8449C4.13538 11.8252 3.5625 10.4421 3.5625 9Z" fill="#596075"/> </svg>
                                    {{ \Carbon\Carbon::parse($recentBlog->posted_date)->format('h.i A') }}
                                </div>
                            </div>
                    </div>
                    </div class="short-content">
                        <h2>{{$recentBlog->title ?? ''}}</h2>
                        <p>{{ Str::limit(strip_tags($recentBlog->description ?? ''), 200, '...') }}</p>
                        </div>
                        
                        <a href="{{route('blogs.blog_detail',['short_url' => $recentBlog->short_url])}}" class="btn-theme btnDark">Read More</a>
            </div>
            
            <picture>
                <img src="{{asset($recentBlog->image_webp ?? $recentBlog->image)}}" width="576" height="373" {{$recentBlog->image_attribute}} >
            </picture>
    </div>
@endforeach