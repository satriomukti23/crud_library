  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Table
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/table" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Table Page</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/data-table" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data - Table Page</p>
            </a>
          </li>
        </ul>
      </li>
      @auth
      <li class="nav-item">
        <a href="/category" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>
            Category
          </p>
        </a>
      </li>
      @endauth
      @auth
      <li class="nav-item">
        <a href="/book" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Books 
          </p>
        </a>
      </li>
      @endauth
      
      @auth
      <li class="nav-item bg-danger ">
        <a class="nav-link nav-icon fas fa-arrow-right" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
      @endauth

      @guest
      <li class="nav-item bg-blue">
        <a href="/login" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Login
          </p>
        </a>
      </li>
      @endguest
      
  </nav>