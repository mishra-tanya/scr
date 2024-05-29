<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,300italic&subset=latin' rel='stylesheet' type='text/css'>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/home.css">
   
<nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="#">SCR</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">SCR</span>
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li><a href="/">Home</a></li>
          <li><a href="/home">Dashboard</a></li>

          {{-- <li>
            <a href="#">HTML & CSS</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Login Forms</a></li>
              <li><a href="#">Card Design</a></li>
              <li class="more">
                <span><a href="#">More</a>
                <i class='bx bxs-chevron-right arrow more-arrow'></i>
              </span>
                <ul class="more-sub-menu sub-menu">
                  <li><a href="#">Neumorphism</a></li>
                  <li><a href="#">Pre-loader</a></li>
                  <li><a href="#">Glassmorphism</a></li>
                </ul>
              </li>
            </ul>
          </li> --}}
          {{-- <li>
            <a href="#">JAVASCRIPT</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="#">Dynamic Clock</a></li>
              <li><a href="#">Form Validation</a></li>
              <li><a href="#">Card Slider</a></li>
              <li><a href="#">Complete Website</a></li>
            </ul>
          </li> --}}
          <li><a href="/#about">About us</a></li>
          <li><a href="/#contact">Contact us</a></li>
          <li><a href={{ url('logout') }}>Logout</a></li>

        </ul>
      </div>
      {{-- <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box">
          <input type="text" placeholder="Search...">
        </div>
      </div> --}}
    </div>
  </nav>
  <script src="js/script.js"></script>
