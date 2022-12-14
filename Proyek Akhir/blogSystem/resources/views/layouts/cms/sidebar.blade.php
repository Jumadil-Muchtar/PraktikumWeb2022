<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">Breaking News</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">bnws</a>
        </div>
        <ul class="sidebar-menu">
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="homepage" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Homepage
                </a>
            </div>
            @if (Str::contains(Request::url(), 'dashboard'))
            <li class="nav-item active">
                @else
            <li class="nav-item">
                @endif
                <a href="dashboard" class="nav-link"><i class="bi bi-laptop"></i> <span>Dashboard</span></a>
            </li>
            @if (Str::contains(Request::url(), 'article'))
            <li class="nav-item active">
                @else
            <li class="nav-item">
                @endif
                <a href="article" class="nav-link"><i class="bi bi-book"></i> <span>Article</span></a>
            </li>
            @if (Route::currentRouteName() == 'category')
            <li class="nav-item active">
                @else
            <li class="nav-item">
                @endif
                <a href="category" class="nav-link"><i class="bi bi-card-list"></i> <span>Category</span></a>
            </li>
            @if (Route::currentRouteName() == 'sub-category')
            <li class="nav-item active">
                @else
            <li class="nav-item">
                @endif
                <a href="sub-category" class="nav-link"><i class="bi bi-card-list"></i> <span>Sub Category</span></a>
            </li>
            @if (Str::contains(Request::url(), 'tag'))
            <li class="nav-item active">
                @else
            <li class="nav-item">
                @endif
                <a href="tag" class="nav-link"><i class="bi bi-tag"></i> <span>Tag</span></a>
            </li>
            <!-- <li class="nav-item ">
                <a href="article" class="nav-link" ><i class=></i> <span>Article</span></a>
            </li>
            <li class="nav-item">
                <a href="category" class="nav-link" ><i class=></i> <span>Category</span></a>
            </li>
            <li class="nav-item">
                <a href="sub-category" class="nav-link" ><i class=></i> <span>Sub Category</span></a>
            </li>
            <li class="nav-item ">
                <a href="tag" class="nav-link" ><i class=></i> <span>Tag</span></a>
            </li> -->
        </ul>
    </aside>
</div>
