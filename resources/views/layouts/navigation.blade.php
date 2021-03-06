<ul>
    <li class="nav-item @if(request()->routeIs('home')) active @endif">
        <a href="{{ route('home') }}">
            <span class="icon">
                <svg width="22" height="22" viewBox="0 0 22 22">
                    <path
                        d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
                </svg>
            </span>
            <span class="text">{{ __('Beranda') }}</span>
        </a>
    </li>

    {{-- Sertifikat --}}
    <li class="nav-item @if(request()->routeIs('sertifs.index')) active @endif">
        <a href="{{ route('sertifs.index') }}">
            <span class="icon">
                <i class="lni lni-certificate"></i>
            </span>
            <span class="text">{{ __('Sertifikatku') }}</span>
        </a>
    </li>

    @if (auth()->user()->level == 'admin')
    <li class="nav-item @if(request()->routeIs('users.index')) active @endif">
        <a href="{{ route('users.index') }}">
            <span class="icon">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
            </span>
            <span class="text">{{ __('Daftar User') }}</span>
        </a>
    </li>
    @endif

    <li class="nav-item @if(request()->routeIs('about')) active @endif">
        <a href="{{ route('about') }}">
            <span class="icon">
                <i class="lni lni-question-circle"></i>
            </span>
            <span class="text">{{ __('Tentang') }}</span>
        </a>
    </li>

    {{-- <li class="nav-item nav-item-has-children">
        <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#ddmenu_1"
            aria-controls="ddmenu_1" aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
                <i class="lni lni-page-break"></i>
            </span>
            <span class="text">Two-level menu</span>
        </a>
        <ul id="ddmenu_1" class="dropdown-nav collapse" style="">
            <li>
                <a href="#">Child menu</a>
            </li>
        </ul>
    </li> --}}
</ul>
