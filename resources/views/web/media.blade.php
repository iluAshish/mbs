@extends('web.layouts.main')
@section('content')

<picture>
    <img src="{{asset('web/images/inner/bg.webp')}}" alt="">
</picture>
<section class="banner inner-banner position-relative">

    <div class="container-ctn position-relative">

        <div class="banner-image-slider " id="fadeSection">
            <picture>
                <img src="{{asset('web/images/inner/inner.webp')}}" class="img-fluid w-100" width="1366" height="335"
                    alt="MBS Media Banner">
            </picture>
        </div>
    </div>
    <div class="container-short">
        <ul class="breadcrumb d-flex align-items-center">
            <li>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path
                            d="M6 14.2496H12M10.0556 1.55964C12.7688 2.76377 14.8252 4.34589 15.8884 5.25977C16.4257 5.72177 16.7254 6.38664 16.7621 7.09427C16.8135 8.06589 16.875 9.58652 16.875 11.2496C16.875 12.5291 16.8386 13.7644 16.7985 14.7345C16.7779 15.2747 16.553 15.7868 16.1693 16.1676C15.7856 16.5483 15.2718 16.7693 14.7315 16.7858C13.434 16.8308 11.5084 16.8746 9 16.8746C6.49162 16.8746 4.56637 16.8304 3.2685 16.7861C2.72823 16.7696 2.21435 16.5487 1.83068 16.1679C1.44702 15.7872 1.22215 15.275 1.2015 14.7349C1.15252 13.5738 1.12702 12.4118 1.125 11.2496C1.125 9.58652 1.18687 8.06589 1.2375 7.09427C1.275 6.38664 1.57425 5.72177 2.11163 5.25977C3.17475 4.34552 5.23162 2.76377 7.94437 1.55964C8.27676 1.41214 8.63636 1.33594 9 1.33594C9.36364 1.33594 9.72324 1.41214 10.0556 1.55964Z"
                            stroke="white" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                </a>
            </li>
            <li>
                Media
            </li>
        </ul>
    </div>
</section>




<section class="media inner-padding position-relative">
    <div class="container-short">
        <div class="d-flex flex-wrap justify-content-between align-items-end">
            <div class=" title">
                <h2><span>Our</span>Media</h2>
            </div>
        <!-- Mobile Dropdown -->
        <select class="filter-dropdown d-lg-none">
            <option>All</option>
            @foreach($medias as $media)
            <option value="{{$media->short_url}}">{{$media->title}}</option>
            @endforeach
        </select>
            <div class="filter-buttons d-none d-lg-flex">
                
                <button data-filter="all" class="active">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M3 3.75C2.7875 3.75 2.6095 3.678 2.466 3.534C2.3225 3.39 2.2505 3.212 2.25 3C2.2495 2.788 2.3215 2.61 2.466 2.466C2.6105 2.322 2.7885 2.25 3 2.25C3.2115 2.25 3.38975 2.322 3.53475 2.466C3.67975 2.61 3.7515 2.788 3.75 3C3.7485 3.212 3.6765 3.39025 3.534 3.53475C3.3915 3.67925 3.2135 3.751 3 3.75ZM6 3.75C5.7875 3.75 5.6095 3.678 5.466 3.534C5.3225 3.39 5.2505 3.212 5.25 3C5.2495 2.788 5.3215 2.61 5.466 2.466C5.6105 2.322 5.7885 2.25 6 2.25C6.2115 2.25 6.38975 2.322 6.53475 2.466C6.67975 2.61 6.7515 2.788 6.75 3C6.7485 3.212 6.6765 3.39025 6.534 3.53475C6.3915 3.67925 6.2135 3.751 6 3.75ZM9 3.75C8.7875 3.75 8.6095 3.678 8.466 3.534C8.3225 3.39 8.2505 3.212 8.25 3C8.2495 2.788 8.3215 2.61 8.466 2.466C8.6105 2.322 8.7885 2.25 9 2.25C9.2115 2.25 9.38975 2.322 9.53475 2.466C9.67975 2.61 9.7515 2.788 9.75 3C9.7485 3.212 9.6765 3.39025 9.534 3.53475C9.3915 3.67925 9.2135 3.751 9 3.75ZM12 3.75C11.7875 3.75 11.6095 3.678 11.466 3.534C11.3225 3.39 11.2505 3.212 11.25 3C11.2495 2.788 11.3215 2.61 11.466 2.466C11.6105 2.322 11.7885 2.25 12 2.25C12.2115 2.25 12.3898 2.322 12.5348 2.466C12.6798 2.61 12.7515 2.788 12.75 3C12.7485 3.212 12.6765 3.39025 12.534 3.53475C12.3915 3.67925 12.2135 3.751 12 3.75ZM15 3.75C14.7875 3.75 14.6095 3.678 14.466 3.534C14.3225 3.39 14.2505 3.212 14.25 3C14.2495 2.788 14.3215 2.61 14.466 2.466C14.6105 2.322 14.7885 2.25 15 2.25C15.2115 2.25 15.3898 2.322 15.5348 2.466C15.6798 2.61 15.7515 2.788 15.75 3C15.7485 3.212 15.6765 3.39025 15.534 3.53475C15.3915 3.67925 15.2135 3.751 15 3.75ZM3 6.75C2.7875 6.75 2.6095 6.678 2.466 6.534C2.3225 6.39 2.2505 6.212 2.25 6C2.2495 5.788 2.3215 5.61 2.466 5.466C2.6105 5.322 2.7885 5.25 3 5.25C3.2115 5.25 3.38975 5.322 3.53475 5.466C3.67975 5.61 3.7515 5.788 3.75 6C3.7485 6.212 3.6765 6.39025 3.534 6.53475C3.3915 6.67925 3.2135 6.751 3 6.75ZM15 6.75C14.7875 6.75 14.6095 6.678 14.466 6.534C14.3225 6.39 14.2505 6.212 14.25 6C14.2495 5.788 14.3215 5.61 14.466 5.466C14.6105 5.322 14.7885 5.25 15 5.25C15.2115 5.25 15.3898 5.322 15.5348 5.466C15.6798 5.61 15.7515 5.788 15.75 6C15.7485 6.212 15.6765 6.39025 15.534 6.53475C15.3915 6.67925 15.2135 6.751 15 6.75ZM3 9.75C2.7875 9.75 2.6095 9.678 2.466 9.534C2.3225 9.39 2.2505 9.212 2.25 9C2.2495 8.788 2.3215 8.61 2.466 8.466C2.6105 8.322 2.7885 8.25 3 8.25C3.2115 8.25 3.38975 8.322 3.53475 8.466C3.67975 8.61 3.7515 8.788 3.75 9C3.7485 9.212 3.6765 9.39025 3.534 9.53475C3.3915 9.67925 3.2135 9.751 3 9.75ZM15 9.75C14.7875 9.75 14.6095 9.678 14.466 9.534C14.3225 9.39 14.2505 9.212 14.25 9C14.2495 8.788 14.3215 8.61 14.466 8.466C14.6105 8.322 14.7885 8.25 15 8.25C15.2115 8.25 15.3898 8.322 15.5348 8.466C15.6798 8.61 15.7515 8.788 15.75 9C15.7485 9.212 15.6765 9.39025 15.534 9.53475C15.3915 9.67925 15.2135 9.751 15 9.75ZM3 12.75C2.7875 12.75 2.6095 12.678 2.466 12.534C2.3225 12.39 2.2505 12.212 2.25 12C2.2495 11.788 2.3215 11.61 2.466 11.466C2.6105 11.322 2.7885 11.25 3 11.25C3.2115 11.25 3.38975 11.322 3.53475 11.466C3.67975 11.61 3.7515 11.788 3.75 12C3.7485 12.212 3.6765 12.3902 3.534 12.5347C3.3915 12.6792 3.2135 12.751 3 12.75ZM15 12.75C14.7875 12.75 14.6095 12.678 14.466 12.534C14.3225 12.39 14.2505 12.212 14.25 12C14.2495 11.788 14.3215 11.61 14.466 11.466C14.6105 11.322 14.7885 11.25 15 11.25C15.2115 11.25 15.3898 11.322 15.5348 11.466C15.6798 11.61 15.7515 11.788 15.75 12C15.7485 12.212 15.6765 12.3902 15.534 12.5347C15.3915 12.6792 15.2135 12.751 15 12.75ZM3 15.75C2.7875 15.75 2.6095 15.678 2.466 15.534C2.3225 15.39 2.2505 15.212 2.25 15C2.2495 14.788 2.3215 14.61 2.466 14.466C2.6105 14.322 2.7885 14.25 3 14.25C3.2115 14.25 3.38975 14.322 3.53475 14.466C3.67975 14.61 3.7515 14.788 3.75 15C3.7485 15.212 3.6765 15.3902 3.534 15.5347C3.3915 15.6792 3.2135 15.751 3 15.75ZM6 15.75C5.7875 15.75 5.6095 15.678 5.466 15.534C5.3225 15.39 5.2505 15.212 5.25 15C5.2495 14.788 5.3215 14.61 5.466 14.466C5.6105 14.322 5.7885 14.25 6 14.25C6.2115 14.25 6.38975 14.322 6.53475 14.466C6.67975 14.61 6.7515 14.788 6.75 15C6.7485 15.212 6.6765 15.3902 6.534 15.5347C6.3915 15.6792 6.2135 15.751 6 15.75ZM9 15.75C8.7875 15.75 8.6095 15.678 8.466 15.534C8.3225 15.39 8.2505 15.212 8.25 15C8.2495 14.788 8.3215 14.61 8.466 14.466C8.6105 14.322 8.7885 14.25 9 14.25C9.2115 14.25 9.38975 14.322 9.53475 14.466C9.67975 14.61 9.7515 14.788 9.75 15C9.7485 15.212 9.6765 15.3902 9.534 15.5347C9.3915 15.6792 9.2135 15.751 9 15.75ZM12 15.75C11.7875 15.75 11.6095 15.678 11.466 15.534C11.3225 15.39 11.2505 15.212 11.25 15C11.2495 14.788 11.3215 14.61 11.466 14.466C11.6105 14.322 11.7885 14.25 12 14.25C12.2115 14.25 12.3898 14.322 12.5348 14.466C12.6798 14.61 12.7515 14.788 12.75 15C12.7485 15.212 12.6765 15.3902 12.534 15.5347C12.3915 15.6792 12.2135 15.751 12 15.75ZM15 15.75C14.7875 15.75 14.6095 15.678 14.466 15.534C14.3225 15.39 14.2505 15.212 14.25 15C14.2495 14.788 14.3215 14.61 14.466 14.466C14.6105 14.322 14.7885 14.25 15 14.25C15.2115 14.25 15.3898 14.322 15.5348 14.466C15.6798 14.61 15.7515 14.788 15.75 15C15.7485 15.212 15.6765 15.3902 15.534 15.5347C15.3915 15.6792 15.2135 15.751 15 15.75ZM6.75 12.75C6.3375 12.75 5.9845 12.6033 5.691 12.3098C5.3975 12.0163 5.2505 11.663 5.25 11.25V6.75C5.25 6.3375 5.397 5.9845 5.691 5.691C5.985 5.3975 6.338 5.2505 6.75 5.25H11.25C11.6625 5.25 12.0158 5.397 12.3098 5.691C12.6038 5.985 12.7505 6.338 12.75 6.75V11.25C12.75 11.6625 12.6033 12.0158 12.3098 12.3098C12.0163 12.6038 11.663 12.7505 11.25 12.75H6.75ZM6.75 11.25H11.25V6.75H6.75V11.25Z" fill="#596075"/> </svg>                    All 
                    <span class="count"></span>
                </button>
                @foreach($medias as $media)
                <button data-filter="{{$media->short_url}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M17.4375 14.625H16.3125V6.75C16.4617 6.75 16.6048 6.69074 16.7102 6.58525C16.8157 6.47976 16.875 6.33668 16.875 6.1875C16.875 6.03832 16.8157 5.89524 16.7102 5.78975C16.6048 5.68426 16.4617 5.625 16.3125 5.625H12.9375V3.375C13.0867 3.375 13.2298 3.31574 13.3352 3.21025C13.4407 3.10476 13.5 2.96168 13.5 2.8125C13.5 2.66332 13.4407 2.52024 13.3352 2.41475C13.2298 2.30926 13.0867 2.25 12.9375 2.25H2.8125C2.66332 2.25 2.52024 2.30926 2.41475 2.41475C2.30926 2.52024 2.25 2.66332 2.25 2.8125C2.25 2.96168 2.30926 3.10476 2.41475 3.21025C2.52024 3.31574 2.66332 3.375 2.8125 3.375V14.625H1.6875C1.53832 14.625 1.39524 14.6843 1.28975 14.7898C1.18426 14.8952 1.125 15.0383 1.125 15.1875C1.125 15.3367 1.18426 15.4798 1.28975 15.5852C1.39524 15.6907 1.53832 15.75 1.6875 15.75H17.4375C17.5867 15.75 17.7298 15.6907 17.8352 15.5852C17.9407 15.4798 18 15.3367 18 15.1875C18 15.0383 17.9407 14.8952 17.8352 14.7898C17.7298 14.6843 17.5867 14.625 17.4375 14.625ZM15.1875 6.75V14.625H12.9375V6.75H15.1875ZM3.9375 3.375H11.8125V14.625H10.125V11.25C10.125 11.1008 10.0657 10.9577 9.96025 10.8523C9.85476 10.7468 9.71168 10.6875 9.5625 10.6875H6.1875C6.03832 10.6875 5.89524 10.7468 5.78975 10.8523C5.68426 10.9577 5.625 11.1008 5.625 11.25V14.625H3.9375V3.375ZM9 14.625H6.75V11.8125H9V14.625ZM5.0625 5.625C5.0625 5.47582 5.12176 5.33274 5.22725 5.22725C5.33274 5.12176 5.47582 5.0625 5.625 5.0625H6.75C6.89918 5.0625 7.04226 5.12176 7.14775 5.22725C7.25324 5.33274 7.3125 5.47582 7.3125 5.625C7.3125 5.77418 7.25324 5.91726 7.14775 6.02275C7.04226 6.12824 6.89918 6.1875 6.75 6.1875H5.625C5.47582 6.1875 5.33274 6.12824 5.22725 6.02275C5.12176 5.91726 5.0625 5.77418 5.0625 5.625ZM8.4375 5.625C8.4375 5.47582 8.49676 5.33274 8.60225 5.22725C8.70774 5.12176 8.85082 5.0625 9 5.0625H10.125C10.2742 5.0625 10.4173 5.12176 10.5227 5.22725C10.6282 5.33274 10.6875 5.47582 10.6875 5.625C10.6875 5.77418 10.6282 5.91726 10.5227 6.02275C10.4173 6.12824 10.2742 6.1875 10.125 6.1875H9C8.85082 6.1875 8.70774 6.12824 8.60225 6.02275C8.49676 5.91726 8.4375 5.77418 8.4375 5.625ZM5.0625 8.4375C5.0625 8.28832 5.12176 8.14524 5.22725 8.03975C5.33274 7.93426 5.47582 7.875 5.625 7.875H6.75C6.89918 7.875 7.04226 7.93426 7.14775 8.03975C7.25324 8.14524 7.3125 8.28832 7.3125 8.4375C7.3125 8.58668 7.25324 8.72976 7.14775 8.83525C7.04226 8.94074 6.89918 9 6.75 9H5.625C5.47582 9 5.33274 8.94074 5.22725 8.83525C5.12176 8.72976 5.0625 8.58668 5.0625 8.4375ZM8.4375 8.4375C8.4375 8.28832 8.49676 8.14524 8.60225 8.03975C8.70774 7.93426 8.85082 7.875 9 7.875H10.125C10.2742 7.875 10.4173 7.93426 10.5227 8.03975C10.6282 8.14524 10.6875 8.28832 10.6875 8.4375C10.6875 8.58668 10.6282 8.72976 10.5227 8.83525C10.4173 8.94074 10.2742 9 10.125 9H9C8.85082 9 8.70774 8.94074 8.60225 8.83525C8.49676 8.72976 8.4375 8.58668 8.4375 8.4375Z" fill="#596075"/> </svg>
                    {{$media->title}} <span class="count"></span>
                </button>
                @endforeach
            </div>
        </div>
        <div class="d-flex flex-wrap gallery">
            @foreach($medias as $media)
                @foreach($media->images as $image)
                <div class="gallery-item {{$media->short_url}}">
                    <img src="{{asset($image->image_webp ?? $image->image)}}" width="289" height="298" alt="{{$media->title}} ">
                    <div class="caption">{{$media->title}}</div>
                </div>

                @endforeach
            @endforeach
            </div>
        </div>
    </div>
</section>




<div id="customPopup" class="popup-overlay">
    <div class="popup-card position-relative">
        <span class="close-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"> <path d="M7.75684 16.2438L16.2428 7.75781M16.2428 16.2438L7.75684 7.75781" stroke="#414A66" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/> </svg></span>
        <img class="popup-image" src="" alt="Large Image">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="popup-caption"></div>
            <div class="popup-nav d-flex flex-wrap">
                <span class="prev-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M10.5 5.25L6.75 9L10.5 12.75" stroke="#B5B7BD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                    Prev
                </span>
                <span class="next-btn">
                    Next
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"> <path d="M7.5 5.25L11.25 9L7.5 12.75" stroke="#B5B7BD" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>
                </span>
            </div>
        </div>
    </div>
</div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buttons = document.querySelectorAll('.filter-buttons button');
            const dropdown = document.querySelector('.filter-dropdown');
            const items = document.querySelectorAll('.gallery-item');

            function updateCounts() {
            buttons.forEach(button => {
                const filter = button.getAttribute('data-filter');
                let count;

                if (filter === 'all') {
                count = items.length;
                } else {
                count = [...items].filter(item => item.classList.contains(filter)).length;
                }

                let countSpan = button.querySelector('.count');
                if (!countSpan) {
                countSpan = document.createElement('span');
                countSpan.classList.add('count');
                button.appendChild(countSpan);
                }

                countSpan.textContent = ` (${count})`;

                // Update dropdown count as well
                const dropdownOption = dropdown.querySelector(`option[value="${filter}"]`);
                if (dropdownOption) {
                dropdownOption.textContent = `${capitalize(filter)} (${count})`;
                }
            });
            }

            function filterSelection(category) {
            items.forEach(item => {
                item.style.display = (category === 'all' || item.classList.contains(category)) ?
                'block' : 'none';
            });

            buttons.forEach(btn => btn.classList.remove('active'));
            const activeBtn = document.querySelector(`.filter-buttons button[data-filter="${category}"]`);
            if (activeBtn) activeBtn.classList.add('active');

            dropdown.value = category;
            }

            // Button click
            buttons.forEach(button => {
            button.addEventListener('click', function () {
                const category = this.getAttribute('data-filter');
                filterSelection(category);
            });
            });

            // Dropdown change
            dropdown.addEventListener('change', function () {
            const category = this.value;
            filterSelection(category);
            });

            function capitalize(str) {
            if (str === 'all') return 'All';
            return str.charAt(0).toUpperCase() + str.slice(1);
            }

            updateCounts();
            filterSelection('all');
        });
        </script>


        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const popup = document.getElementById("customPopup");
            const popupImg = popup.querySelector(".popup-image");
            const captionEl = popup.querySelector(".popup-caption");
            const closeBtn = popup.querySelector(".close-btn");
            const nextBtn = popup.querySelector(".next-btn");
            const prevBtn = popup.querySelector(".prev-btn");

            let galleryImages = document.querySelectorAll(".gallery-item img");
            let imageList = [];
            let currentIndex = 0;

            // Collect images and captions
            galleryImages.forEach((img, index) => {
            imageList.push({
                src: img.src,
                caption: img.alt || img.getAttribute("data-caption") || ""
            });

            img.addEventListener("click", () => {
                currentIndex = index;
                openPopup();
            });
            });

            function openPopup() {
            popupImg.src = imageList[currentIndex].src;
            captionEl.textContent = imageList[currentIndex].caption;
            popup.style.display = "flex";
            }

            // Navigation
            nextBtn.addEventListener("click", () => {
            currentIndex = (currentIndex + 1) % imageList.length;
            openPopup();
            });

            prevBtn.addEventListener("click", () => {
            currentIndex = (currentIndex - 1 + imageList.length) % imageList.length;
            openPopup();
            });

            closeBtn.addEventListener("click", () => popup.style.display = "none");

            popup.addEventListener("click", (e) => {
            if (e.target === popup) {
                popup.style.display = "none";
            }
            });
        });
        </script>

@endsection