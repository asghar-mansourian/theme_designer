    @include('admin.partials.head')
  <body class="app sidebar-mini rtl" >
    <!-- Navbar-->
    @include('admin.partials.header')
    <!-- Sidebar menu-->
    @include('admin.partials.sidebar')
    <main class="app-content">
        @yield('content')
    </main>
    @include('admin.partials.scripts')
    @stack('scripts')
  </body>
</html>
