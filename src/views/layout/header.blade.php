
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      

        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Firewall
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('firewall.whitelist')}}">White List IP</a></li>
            <li><a class="dropdown-item" href="{{route('firewall.blacklist')}}">Black List IP</a></li>
            <li><a class="dropdown-item" href="{{route('firewall.browserlist')}}">Browser List</a></li>
            <!-- <li><a class="dropdown-item" href="{{route('firewall.geolist')}}">GEO List</a></li> -->
            <li><a class="dropdown-item" href="{{route('firewall.oslist')}}">OS List</a></li>
           
           
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
