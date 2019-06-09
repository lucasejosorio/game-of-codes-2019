<ul class="header__navbar">
    <li class="header__item">
        <a href="#" class="header__link">
            <transition name="slide-fade">
                <button class="header--btn" v-if="showMenu" key="on" @click="showMenu = false">
                    <svg viewBox="0 0 24 24" class="header--icon">
                        <title>Close</title>
                        <path fill="#fff"
                              d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                </button>
                <button class="header--btn" v-else key="off" @click="showMenu = true">
                    <svg viewBox="0 0 24 24" class="header--icon">
                        <title>Navigation Menu</title>
                        <path fill="#fff"
                              d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/>
                    </svg>
                </button>
            </transition>
        </a>
        <transition name="dropdown">
            <div class="header__dropdown-menu" v-bind:class="{ active: showMenu }" v-if="showMenu">
                <ul class="header__dropdown-menu-nav">
                    @auth
                        <li class="header__dropdown-menu-item">
                            <a href="{{ route('dashboard') }}" class="header__dropdown-menu-link" title="Help">
                                <div class="header__dropdown-menu-svg">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="header__dropdown-menu-text">
                                    Home
                                </div>
                            </a>
                        </li>
                        <li class="header__dropdown-menu-item">
                            <a href="{{ route('user.edit', Auth::user()->id) }}" class="header__dropdown-menu-link" title="Help">
                                <div class="header__dropdown-menu-svg">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="header__dropdown-menu-text">
                                    Meu perfil
                                </div>
                            </a>
                        </li>
                        <li class="header__dropdown-menu-item">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                               class="header__dropdown-menu-link" title="Help">
                                <div class="header__dropdown-menu-svg">
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <div class="header__dropdown-menu-text">
                                    {{ __('Logout') }}
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    @else
                        <li class="header__dropdown-menu-item">
                            <a href="{{ route('login') }}" class="header__dropdown-menu-link" title="Help">
                                <div class="header__dropdown-menu-svg">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>
                                <div class="header__dropdown-menu-text">
                                    Login
                                </div>
                            </a>
                        </li>
                        <li class="header__dropdown-menu-item">
                            <a href="{{ route('register') }}" class="header__dropdown-menu-link" title="Help">
                                <div class="header__dropdown-menu-svg">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="header__dropdown-menu-text">
                                    Cadastre-se
                                </div>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </transition>
    </li>
</ul>
