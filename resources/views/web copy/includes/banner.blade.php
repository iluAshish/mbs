
    {{-- {!! Helper::printImage($banner,'banner_image','banner_image_webp','banner_image_attribute','img-fluid') !!} --}}

<section class="bannerInner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>{{ @$banner->title}}</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ @$banner->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>