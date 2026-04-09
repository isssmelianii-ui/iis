<div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Zii</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">Ac</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Pages</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-film"></i>
                    <span>Movies</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('movies') }}">Search Movies</a>
                    </li>
                    <li><a class="nav-link" href="{{ url('favorite') }}">My Favorites</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>