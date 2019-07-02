<!DOCTYPE html>
<html lang="en">

    @include('layouts.head')
  
    <body class="app sidebar-mini rtl">
    
    <!-- Navbar-->
    @include('layouts.header')
    
    <!-- Sidebar menu-->
    @include('layouts.sidebar')
    
    <main class="app-content">
    
        @yield('title')
    
        @yield('content')
    
    </main>
    
    @include('layouts.footer')
    
    @include('sweet::alert')
  </body>
</html>