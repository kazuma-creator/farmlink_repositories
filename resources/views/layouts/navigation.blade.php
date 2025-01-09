<nav x-data="{ open: false }" class="header-bg bg-green-700 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Hamburger -->
                {{-- <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-yellow-100 hover:text-yellow-300 hover:bg-green-800 focus:outline-none focus:bg-green-800 focus:text-yellow-300 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div> --}}
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('crops.index') }}" class="text-yellow-100 text-xl font-bold tracking-wide">
                        FARMLINK
                    </a>
                </div>
                <!-- 台帳リンク -->
                {{-- <div class="ms-10 flex items-center space-x-4">
                    <a href="{{ route('ledger.index') }}" class="text-yellow-100 hover:text-yellow-300 font-medium">
                        台帳
                    </a>
                    <a href="{{ route('cropping.index') }}" class="text-yellow-100 hover:text-yellow-300 font-medium">
                        作付
                    </a>
                    <a href="{{ route('materials.index')}}" class="text-yellow-100 hover:text-yellow-300 font-medium">
                        資材
                    </a>
                </div> --}}
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-yellow-100 bg-green-700 hover:text-yellow-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-green-600 text-yellow-100 hover:text-yellow-300">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="hover:bg-green-600 text-yellow-100 hover:text-yellow-300"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-green-700">
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-green-600">
            <div class="px-4">
                <div class="font-medium text-base text-yellow-100">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-yellow-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-yellow-100 hover:bg-green-800 hover:text-yellow-300">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" class="text-yellow-100 hover:bg-green-800 hover:text-yellow-300"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    .header-bg {
        position: fixed;
        top: 0;
        left: 0; /* サイドバーの幅と一致させる */
        right: 0;
        height: 4rem;
        background-color: #047857; /* ナビゲーションバーの背景色 */
        color: #facc15; /* テキストの色 */
        display: flex;
        align-items: center;
        padding: 0 1.5rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 1000; /* 高いz-indexで他の要素の上に表示 */
    }

    /* コンテンツが隠れないように余白を確保 */
    .main-content {
        padding-top: 4rem; /* ナビゲーションバーの高さ分余白を確保 */
    }

    /* レスポンシブ対応 */
    @media (max-width: 768px) {
        .header-bg {
            height: auto; /* 小さい画面で高さを自動調整 */
        }
    }
</style>
