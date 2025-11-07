<li class="nav-item {{ (Request::segment(2)=='home')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='home')?'active':'' }}">
        <i class="nav-icon fas fa-th-list"></i>
        <p>
            Home
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='home')?'block':'none' }}">
         {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/home-video-banner')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='home-video-banner')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Video</p>
            </a>
        </li> --}}
         <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/slider')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='slider')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Slider</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/about-us')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='about-us')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
            </a>
        </li>
       <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/why-choose-us-index')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='why-choose-us-index')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Why Choose Us</p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/key-feature')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='key-feature')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Key Feature</p>
            </a>
        </li> -->
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/features')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='features')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Features</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/clients')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='clients')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Clients</p>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/case-study')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='case-study')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>case-study</p>
            </a>
        </li>--}}
       {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/brands')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='brands')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Brands</p>
            </a>
        </li> --}}
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/slider')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='slider')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Service Slider</p>
            </a>
        </li>

         <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/how-we-can-help')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='how-we-can-help')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>How we can help</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/key-feature')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='key-feature')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Key Feature</p>
            </a>
        </li>
         <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/our-services')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='our-services')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Our Services</p>
            </a>
        </li>
         <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/group-accreditation-and-companies')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='group-accreditation-and-companies')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Group Accreditation</p>
            </a>
        </li>
         <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/footersection')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='footersection')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Footer Section</p>
            </a>
        </li>  -->
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'home/testimonial')}}" class="nav-link {{ (Request::segment(2)=='home' && Request::segment(3)=='testimonial')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Testimonial</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='about-us')?'menu-is-opening menu-open':'' }}">
     <a href="{{url(Helper::sitePrefix().'about-us')}}" class="nav-link {{ (Request::segment(2)=='about-us')?'active':'' }}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>About Us
        </p>
    </a>
</li>

<!-- <li class="nav-item {{ (Request::segment(2)=='success-stories')?'menu-is-opening menu-open':'' }}">
     <a href="{{url(Helper::sitePrefix().'success-stories')}}" class="nav-link {{ (Request::segment(2)=='success-stories')?'active':'' }}">
        <i class="nav-icon fas fa-award"></i>
        <p>Success Stories
        </p>
    </a>
</li> -->

<li class="nav-item {{ (Request::segment(2)=='companies')?'menu-is-opening menu-open':'' }}">
     <a href="{{url(Helper::sitePrefix().'companies')}}" class="nav-link {{ (Request::segment(2)=='companies')?'active':'' }}">
        <i class="nav-icon fas fa-business-time"></i>
        <p>Companies
        </p>
    </a>
</li>

<!-- <li class="nav-item {{ (Request::segment(2)=='portfolio')?'menu-is-opening menu-open':'' }}">
    <a href="{{url(Helper::sitePrefix().'portfolio')}}" class="nav-link {{ (Request::segment(2)=='portfolio')?'active':'' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>Gallery
        </p>
    </a>
</li> -->

<li class="nav-item {{ (Request::segment(2)=='media')?'menu-is-opening menu-open':'' }}">
    <a href="{{url(Helper::sitePrefix().'media')}}" class="nav-link {{ (Request::segment(2)=='media')?'active':'' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>Media's Control
        </p>
    </a>
</li>

<li class="nav-item {{ (Request::segment(2)=='service')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='service')?'active':'' }}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Services
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='service')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'service')}}" class="nav-link {{ (Request::segment(2)=='service' && Request::segment(3)=='')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Services</p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'service/sub-services')}}" class="nav-link {{ (Request::segment(3)=='sub-services')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sub Services</p>
            </a>
        </li> --}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{url(Helper::sitePrefix().'service/faq')}}" class="nav-link {{ (Request::segment(3)=='faq')?'active':'' }}">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Service Faq</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{url(Helper::sitePrefix().'service/testimonial')}}" class="nav-link {{ (Request::segment(3)=='testimonial')?'active':'' }}">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Testimonial</p>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</li>

<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'products/brand')}}" class="nav-link {{ (Request::segment(3)=='brand')?'active':'' }}">
        <i class="nav-icon far fa-circle"></i>
        <p>Brands</p>
    </a>
</li>

<li class="nav-item {{ (Request::segment(2)=='products')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='products')?'active':'' }}">
        <i class="nav-icon fab fa-blogger-b"></i>
        <p>Products
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='products')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'products/category')}}" class="nav-link {{ (Request::segment(3)=='category')?'active':'' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Categories</p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'products/brand')}}" class="nav-link {{ (Request::segment(3)=='brand')?'active':'' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Brands</p>
            </a>
        </li> -->
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'products')}}" class="nav-link {{ (Request::segment(3)=='products')?'active':'' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Products</p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'products/specification')}}" class="nav-link {{ (Request::segment(3)=='specification')?'active':'' }}">
                <i class="nav-icon far fa-circle"></i>
                <p>Specification</p>
            </a>
        </li> -->
    </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='contact')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='contact')?'active':'' }}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Contact Us
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='contact')?'block':'none' }}">
        <!--<li class="nav-item">-->
        <!--    <a href="{{url(Helper::sitePrefix().'contact')}}" class="nav-link {{ (Request::segment(2)=='contact' && Request::segment(3)=='')?'active':'' }}">-->
        <!--        <i class="far fa-circle nav-icon"></i>-->
        <!--        <p>Contact</p>-->
        <!--    </a>-->
        <!--</li>-->
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'contact/location')}}" class="nav-link {{ (Request::segment(2)=='contact' && Request::segment(3)=='location')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Location</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='banner')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='banner')?'active':'' }}">
        <i class="nav-icon fas fa-image"></i>
        <p>
            Banner
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='banner')?'block':'none' }}">


        {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/about')}}" class="nav-link {{ (Request::segment(3)=='about')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About </p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/services')}}"
               class="nav-link {{ (Request::segment(3)=='services')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Services</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/products')}}"
               class="nav-link {{ (Request::segment(3)=='products')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Products</p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/blog')}}" class="nav-link {{ (Request::segment(3)=='blog')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Blog</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/news-events')}}" class="nav-link {{ (Request::segment(3)=='news-events')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>News & Events </p>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/portfolio')}}" class="nav-link {{ (Request::segment(3)=='portfolio')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Gallery</p>
            </a>
        </li> --}}
        {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'banner/contact')}}" class="nav-link {{ (Request::segment(3)=='contact')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact</p>
            </a>
        </li> --}}

        <!--<li class="nav-item">-->
        <!--    <a href="{{url(Helper::sitePrefix().'banner/testimonials')}}" class="nav-link {{ (Request::segment(3)=='testimonials')?'active':'' }}">-->
        <!--        <i class="far fa-circle nav-icon"></i>-->
        <!--        <p>Testimonials </p>-->
        <!--    </a>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a href="{{url(Helper::sitePrefix().'banner/privacy-policy')}}" class="nav-link {{ (Request::segment(3)=='privacy-policy')?'active':'' }}">-->
        <!--        <i class="far fa-circle nav-icon"></i>-->
        <!--        <p>Privacy Policy</p>-->
        <!--    </a>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a href="{{url(Helper::sitePrefix().'banner/terms-conditions')}}" class="nav-link {{ (Request::segment(3)=='terms-conditions')?'active':'' }}">-->
        <!--        <i class="far fa-circle nav-icon"></i>-->
        <!--        <p>Terms & Conditions</p>-->
        <!--    </a>-->
        <!--</li>-->

    </ul>
</li>
</li>
<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'media/blog')}}" class="nav-link {{ (Request::segment(2)=='media' && Request::segment(3)=='blog')?'active':'' }}">
        <i class="nav-icon fab fa-blogger-b"></i>
        <p>Blog</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'project/')}}" class="nav-link {{ (Request::segment(2)=='project' && Request::segment(3)=='blog')?'active':'' }}">
        <i class="nav-icon fab fa-blogger-b"></i>
        <p>Projects</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'sector/')}}" class="nav-link {{ (Request::segment(2)=='sector' && Request::segment(3)=='blog')?'active':'' }}">
        <i class="nav-icon fab fa-blogger-b"></i>
        <p>Our Sectors</p>
    </a>
</li>

<!-- <li class="nav-item">
    <a href="{{url(Helper::sitePrefix().'media/news-events')}}" class="nav-link {{ (Request::segment(2)=='media' && Request::segment(3)=='news-events')?'active':'' }}">
        <i class="nav-icon fab fa-blogger-b"></i>
        <p>News & Events</p>
    </a>
</li> -->

<li class="nav-item {{ (Request::segment(2)=='enquiry')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='enquiry')?'active':'' }}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Enquiry
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='enquiry')?'block':'none' }}">
        {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'enquiry/enquiries')}}" class="nav-link {{ (Request::segment(3)=='enquiries')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Enquiries</p>
            </a>
        </li>--}}
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'enquiry/contact-us')}}" class="nav-link {{ (Request::segment(3)=='contact-us')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact-us</p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'enquiry/service-enquiries')}}" class="nav-link {{ (Request::segment(3)=='service-enquiries')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Service Enquiry</p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'enquiry/product-enquiries')}}" class="nav-link {{ (Request::segment(3)=='product-enquiries')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Enquiry</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='site-settings')?'menu-is-opening menu-open':'' }}">
    <a href="{{url(Helper::sitePrefix().'site-settings')}}" class="nav-link {{ (Request::segment(2)=='site-settings')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Site Settings
        </p>
    </a>
</li>
<li class="nav-item {{ (Request::segment(2)=='tag')?'menu-is-opening menu-open':'' }}">
    <a href="#" class="nav-link {{ (Request::segment(2)=='tag' || Request::segment(2)=='other-meta-tag')?'active':'' }}">
        <i class="nav-icon fas fa-asterisk"></i>
        <p>
            Metatags
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='tag'|| Request::segment(2)=='other-meta-tag')?'block':'none' }}">
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/home')}}" class="nav-link {{ (Request::segment(3)=='home')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Home</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/about')}}" class="nav-link {{ (Request::segment(3)=='about')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>About Us</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/services')}}" class="nav-link {{ (Request::segment(3)=='services')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Services</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/products')}}" class="nav-link {{ (Request::segment(3)=='products')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Products</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/blog')}}" class="nav-link {{ (Request::segment(3)=='blog')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Blog</p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/news-events')}}" class="nav-link {{ (Request::segment(3)=='news-events')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>News & Events </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/portfolio')}}" class="nav-link {{ (Request::segment(3)=='portfolio')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Gallery</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/contact')}}" class="nav-link {{ (Request::segment(3)=='contact')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Contact</p>
            </a>
        </li> -->

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/sector')}}" class="nav-link {{ (Request::segment(3)=='sector')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sector</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/brand')}}" class="nav-link {{ (Request::segment(3)=='brand')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Brand</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/media')}}" class="nav-link {{ (Request::segment(3)=='media')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Media</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/project')}}" class="nav-link {{ (Request::segment(3)=='project')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Project</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/term')}}" class="nav-link {{ (Request::segment(3)=='term')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Term & Conditions</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/privacy')}}" class="nav-link {{ (Request::segment(3)=='privacy')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Privacy Policy</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/thankyou')}}" class="nav-link {{ (Request::segment(3)=='thankyou')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Thank You</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'tag/404')}}" class="nav-link {{ (Request::segment(3)=='404')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>404 Page</p>
            </a>
        </li>
        <!--<li class="nav-item">-->
        <!--    <a href="{{url(Helper::sitePrefix().'tag/privacy')}}" class="nav-link {{ (Request::segment(3)=='privacy')?'active':'' }}">-->
        <!--        <i class="far fa-circle nav-icon"></i>-->
        <!--        <p>Privacy Policy</p>-->
        <!--    </a>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--    <a href="{{url(Helper::sitePrefix().'tag/terms')}}" class="nav-link {{ (Request::segment(3)=='terms')?'active':'' }}">-->
        <!--        <i class="far fa-circle nav-icon"></i>-->
        <!--        <p>Terms & Conditions</p>-->
        <!--    </a>-->
        <!--</li>-->
        <li class="nav-item">
            <a href="{{url(Helper::sitePrefix().'other-meta-tag/')}}" class="nav-link {{ (Request::segment(2)=='other-meta-tag')?'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Other Meta Tag</p>
            </a>
        </li>
    </ul>
</li>
