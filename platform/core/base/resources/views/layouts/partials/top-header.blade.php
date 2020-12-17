<div class="page-header navbar navbar-static-top">
    <div class="page-header-inner">

            <div class="page-logo">
                <a href="{{ route('dashboard.index') }}">
                    <img src="{{ setting('admin_logo') ? RvMedia::getImageUrl(setting('admin_logo')) : url(config('core.base.general.logo')) }}" alt="logo" class="logo-default" />
                </a>
                @auth
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                @endauth
            </div>

            @auth
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
            @endauth

            @include('core/base::layouts.partials.top-menu')
        </div>
</div>