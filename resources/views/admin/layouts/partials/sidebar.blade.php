<nav id="nav-dash" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 text-white overflow-y-auto">
    <div class="h-full px-3 pb-4 overflow-y-auto">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 p-1 my-1 text-gray-200 hover:bg-gray-700 rounded-lg w-full text-left 
                {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                    <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/chart1-5.png') }}"
                        class="text-gray-400 w-[24px] text-center shrink-0"></img>
                    <span class="truncate">Dashboard</span>
                </a>
                <h3 class="text-center py-3">Main</h3>
                <a href="{{ route('admin.landing-windows.index') }}"
                    class="flex items-center gap-3 p-1 my-1 text-gray-200 hover:bg-gray-700 rounded-lg w-full text-left 
                               {{ request()->routeIs('admin.landing-windows*') ? 'bg-gray-700' : '' }}">
                    <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/accessibility_window_objs.png') }}"
                        class="text-gray-400 w-[24px] text-center shrink-0"></img>
                    <span class="truncate">Landing Page</span>
                </a>
                <a href="{{ route('admin.skills.index') }}"
                    class="flex items-center gap-3 p-1 my-1 text-gray-200 hover:bg-gray-700 rounded-lg w-full text-left 
                               {{ request()->routeIs('admin.skills*') ? 'bg-gray-700' : '' }}">
                    <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/msagent-4.png') }}"
                        class="text-gray-400 w-[24px] text-center shrink-0"></img>
                    <span class="truncate">Skills</span>
                </a>
                <a href="{{ route('admin.projects.index') }}"
                    class="flex items-center gap-3 p-1 my-1 text-gray-200 hover:bg-gray-700 rounded-lg w-full text-left 
                               {{ request()->routeIs('admin.projects*') ? 'bg-gray-700' : '' }}">
                    <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/directory_admin_tools-5.png') }}"
                        class="text-gray-400 w-[24px] text-center shrink-0"></img>
                    <span class="truncate">Projects</span>
                </a>
                <a href="{{ route('admin.experience.index') }}"
                    class="flex items-center gap-3 p-1 my-1 text-gray-200 hover:bg-gray-700 rounded-lg w-full text-left 
                               {{ request()->routeIs('admin.experience*') ? 'bg-gray-700' : '' }}">
                    <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/certificate-0.png') }}"
                        class="text-gray-400 w-[24px] text-center shrink-0"></img>
                    <span class="truncate">Experience</span>
                </a>
                <a href="{{ route('admin.case-studies.index') }}"
                    class="flex items-center gap-3 p-1 my-1 text-gray-200 hover:bg-gray-700 rounded-lg w-full text-left 
                               {{ request()->routeIs('admin.case-studies*') ? 'bg-gray-700' : '' }}">
                    <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/help_book_cool-4.png') }}"
                        class="text-gray-400 w-[24px] text-center shrink-0"></img>
                    <span class="truncate">Case Studies</span>
                </a>
                <h3 class="text-center py-3">Technical</h3>
                <a href="{{ url('/admin/filemanager') }}"
                    class="flex items-center gap-3 p-1 my-1 text-gray-200 hover:bg-gray-700 rounded-lg w-full text-left 
                               {{ request()->routeIs('/admin/filemanager') ? 'bg-gray-700' : '' }}">
                    <img src="{{ asset('assets/img/win98_icons/windows98-icons/png/directory_open_file_mydocs-4.png') }}"
                        class="text-gray-400 w-[24px] text-center shrink-0"></img>
                    <span class="truncate">File Manager</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
