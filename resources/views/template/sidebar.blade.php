<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo pb-3">
        <a href="{{ url('dashboard') }}" class="app-brand-link">
            <div class="custom-logo">
            </div>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <ul class="menu-inner py-1">

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Main Pages</span>
        </li>

        <li class="menu-item {{ isset($act_events) && $act_events ? 'active' : '' }}">
            <a href="{{ url('/adminpages/events') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home-heart"></i>
                <div>Events</div>
            </a>
        </li>

        <li class="menu-item {{ isset($act_event_members) && $act_event_members ? 'active' : '' }}">
            <a href="{{ url('/adminpages/event_members') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div>Event Members</div>
            </a>
        </li>

    </ul>
</aside>
<!-- / Menu -->