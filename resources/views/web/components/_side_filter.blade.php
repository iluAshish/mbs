<div class="offcanvas offcanvas-start d-md-block  border-0" tabindex="-1" id="productSidebar">
    <div class="offcanvas-header d-md-none">
        <h5 class="offcanvas-title">Filter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <aside>
            <p>Categories</p>

            <!-- Search -->
            <div class="product-list-search w-100 position-relative">
                <input type="search" placeholder="Search" class="w-100" aria-label="Search categories" />
                <button>
                    <!-- Search Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path
                            d="M13.3329 13.3349L10.6329 10.6349M10.6329 10.6349C11.0663 10.2015 11.41 9.68704 11.6446 9.12082C11.8791 8.55461 11.9998 7.94774 11.9998 7.33487C11.9998 6.72201 11.8791 6.11514 11.6446 5.54893C11.41 4.98271 11.0663 4.46824 10.6329 4.03487C10.1996 3.60151 9.68508 3.25775 9.11887 3.02322C8.55265 2.78868 7.94579 2.66797 7.33292 2.66797C6.72005 2.66797 6.11319 2.78868 5.54697 3.02322C4.98076 3.25775 4.46628 3.60151 4.03292 4.03487C3.15771 4.91009 2.66602 6.09713 2.66602 7.33487C2.66602 8.57261 3.15771 9.75966 4.03292 10.6349C4.90814 11.5101 6.09518 12.0018 7.33292 12.0018C8.57066 12.0018 9.75771 11.5101 10.6329 10.6349Z"
                            stroke="#596075" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <!-- Categories -->
          <div class="accordion" id="categoryAccordion">
                @foreach($categories as $index => $category)
                    <div class="accordion-item border-0 border-bottom">
                        <div class="d-flex justify-content-between align-items-center px-3 py-3">
                            <!-- Clickable Link -->
                            <a href="{{ route('categories.detail', ['short_url' => $category->short_url]) }}"
                            class="fw-bold text-primary ">
                                {{ $category->title }}
                            </a>

                            <!-- Collapse Toggle -->
                            <button class="btn p-0 border-0 bg-transparent accordion-button collapsed flex-shrink-0 w-auto"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="false"
                                    aria-controls="collapse{{ $index }}">
                            </button>
                        </div>

                        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                            data-bs-parent="#categoryAccordion">
                            <div class="accordion-body py-2">
                                @if($category->subcategories->count())
                                    <ul class="list-unstyled mb-0">
                                        @foreach($category->subcategories as $subcategory)
                                            <li>
                                                <a href="{{ route('categories.detail', ['short_url' => $subcategory->short_url]) }}"
                                                class="text-decoration-none text-secondary">
                                                    {{ $subcategory->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-muted mb-0">No subcategories</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Brands -->
            <p class="mt-3">Brands</p>
            <div class="brands d-flex flex-wrap">
                @foreach($brands as $brand)
                    <a href="{{ route('brands.detail',['short_url' => $brand->short_url]) }}" class="brand-link">
                        <picture>
                            <img src="{{ asset($brand->featured_image_webp ?? $brand->featured_image) }}"
                                width="85" height="18"
                                {!!$brand->featured_image_attribute!!}>
                        </picture>
                    </a>
                @endforeach
            </div>
        </aside>


    </div>
</div>