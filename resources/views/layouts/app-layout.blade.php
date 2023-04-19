<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ (config('app.name') ?? 'app') . ' | '. $title }}</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    defer
    ></script>
    {{-- <script src="{{ asset('assets/js/charts-lines.js')}}" defer></script> --}}
    <script src="{{ asset('assets/admin/js/charts-pie.js')}}" defer></script>
    {{-- <script src="{{ asset('assets/js/init-alpine.js') }}"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js',])
  </head>
  <body class="scrollbar-thin scrollbar-thumb-yellow-700 scrollbar-track-gray-300  overflow-y-auto">
    @include('sweetalert::alert')
    <div
      class="flex min-h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      {{-- @include('_includes.admin.aside') --}}
      <x-aside-nav/>
      <div class="flex flex-col flex-1 w-full">
        @include('_includes.header')
        <main class="px-4">
          @isset($header)
            {{ $header }}
          @endisset 
          {{ $slot }}
        </main>
      </div>
    </div>
  </body>
  @stack('scripts')
  <script>
    function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }
    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }

  function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
  }

  return {
    dark: getThemeFromLocalStorage(),
    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
      console.log({'trrr': this.isNotificationsMenuOpen});
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen
    },
    // Modal
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
      this.isModalOpen = true
      // this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },
    closeModal() {
      this.isModalOpen = false
      // this.trapCleanup()
    },
  }
}

  </script>
</html>
