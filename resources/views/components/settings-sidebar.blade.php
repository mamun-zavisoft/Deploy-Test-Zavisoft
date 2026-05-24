<div class="sidebars settings-sidebar theiaStickySidebar" id="sidebar2">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu5" class="sidebar-menu">
            <ul>
                <li class="submenu-open">
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('general-settings', 'security-settings', 'notification', 'connected-apps') ? 'active subdrop' : '' }} "><i
                                    data-feather="settings"></i><span>General Settings</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('general-settings') }}"
                                        class="{{ Request::is('general-settings') ? 'active' : '' }}">Profile</a></li>
                                <li><a href="{{ url('security-settings') }}"
                                        class="{{ Request::is('security-settings') ? 'active' : '' }}">Security</a></li>
                               {{-- add new here --}}
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
