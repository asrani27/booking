<!DOCTYPE html>
<html lang="en">
@include('bluesky.head')

<body>

<div class="super_container">

@include('bluesky.menu')

@yield('content')

</div>

@include('bluesky.footer')

@include('sweet::alert')
</body>
</html>