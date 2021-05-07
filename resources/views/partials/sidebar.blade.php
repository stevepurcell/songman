<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="index.html">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Song Manager</a></li>

<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/home">
            All Songs</a></li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="/songs">
            Songs</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="colors.html">
                    New<span class="badge badge-info">{{ getStatusCount(1) }}</span></a>
                </li>
            </ul>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="colors.html">
                    In Progress<span class="badge badge-info">{{ getStatusCount(2) }}</span></a>
                </li>
            </ul>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="colors.html">
                    Ready<span class="badge badge-info">{{ getStatusCount(3) }}</span></a>
                </li>
            </ul>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="colors.html">
                    Wish List<span class="badge badge-info">{{ getStatusCount(4) }}</span></a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/songlists">
            Song Lists</a></li>
    </ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>