<?php 
use App\Models\SiteInformation;
$siteInformation = SiteInformation::first();
?>
<aside class="main-sidebar sidebar_gloss elevation-4">
    <a href="{{url(Helper::sitePrefix().'dashboard')}}" class="brand-link">
        <img src="{{Request::root()}}/{{@$siteInformation->dashboard_logo}}" {!! $siteInformation->dashboard_logo_attribute !!} class="brand-image img-fluid"
             style="opacity: .8">
        <span class="brand-text font-weight-light">&nbsp</span>
    </a>
    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url(Helper::sitePrefix().'dashboard')}}"
                       class="nav-link {{ (Request::segment(2)=='dashboard' && Request::segment(1)=='admin')?'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @include('app.includes.menus._menu')
            </ul>
        </nav>
    </div>
</aside>
