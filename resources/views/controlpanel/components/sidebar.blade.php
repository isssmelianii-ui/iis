      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">OMDB ISMEL</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">OI</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">{{ __('messages.sidebar_pages') }}</li>
            <li class="dropdown active">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-film"></i><span>{{ __('messages.sidebar_movies') }}</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="{{ route('dashboard') }}">{{ __('messages.sidebar_search_movies') }}</a></li>
                <li><a class="nav-link" href="{{ route('favorite') }}">{{ __('messages.sidebar_my_favorites') }}</a></li>
              </ul>
            </li>
      </div>