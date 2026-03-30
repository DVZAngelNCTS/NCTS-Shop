<nav class="navbar navbar-expand-md navbar-dark fixed-top navbar-glass">
  <div class="container-fluid px-3 px-md-4">

    <a class="navbar-brand d-flex align-items-center gap-2 me-4" href="#">
      <div class="brand-icon-wrap">
        <i class="bi bi-stars fs-5 brand-icon"></i>
      </div>
      <span class="brand-text fw-bold text-uppercase letter-spacing-wide">NCTS</span>
    </a>

    <button class="navbar-toggler border-0 p-1" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarMain" aria-controls="navbarMain"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="toggler-icon-custom d-flex flex-column gap-1">
        <span></span><span></span><span></span>
      </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav mx-auto mb-2 mb-md-0 gap-0 gap-md-1">
        <li class="nav-item">
          <a class="nav-link nav-link-custom active" aria-current="page" href="#">
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="#">
            <span>Store</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="#">
            <span>About</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="#">
            <span>Contact</span>
          </a>
        </li>
      </ul>

      <div class="d-flex align-items-center gap-2 mt-2 mt-md-0">

        <span class="vr navbar-divider d-none d-sm-block mx-1"></span>

        <button class="btn btn-icon-glass position-relative cart-btn" aria-label="Cart">
          <i class="bi bi-bag fs-6"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-badge">
            0<span class="visually-hidden">items in cart</span>
          </span>
        </button>

        <button class="btn btn-icon-glass position-relative d-none d-sm-flex" aria-label="Notifications">
          <i class="bi bi-bell fs-6"></i>
          <span class="notif-dot"></span>
        </button>

        <span class="vr navbar-divider d-none d-sm-block mx-1"></span>

        <button class="btn account-btn d-flex align-items-center gap-2">
          <div class="account-avatar">
            <i class="bi bi-person-fill fs-6"></i>
          </div>
          <span class="account-label d-none d-sm-inline">Account</span>
          <i class="bi bi-chevron-down account-chevron d-none d-sm-inline"></i>
        </button>

      </div>
    </div>
  </div>
</nav>