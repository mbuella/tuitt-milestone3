<header class="container">
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button"
          class="navbar-toggle"
          data-toggle="collapse"
          data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand logo-img visible-xs">           
          <img src="assets/images/kwntu.png" alt="kwntu">
        </span>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav">
          <li class="pull-left">
            <a href="/#">
              <span class="fa fa-home"></span>              
            </a>
          </li>
          <li class="pull-left"><a href="stories">Stories</a></li>
          <li class="pull-left"><a href="authors">Authors</a></li>

          <!-- Centered logo image -->
          <li class="hidden-xs logo-img">
            <img src="assets/images/kwntu.png" alt="kwntu">
          </li>

          <!-- Items on the right (first entry is last to display) -->
          <li class="pull-right">
            <form class="search-form">
              <input name="search-keyword"
                   class="search-box form-control"
                   placeholder="Search author, genre, etc..."></input>
            </form>
            <button class="search-button btn btn-link navbar-btn">
              <span class="fa fa-search"></span>          
            </button>
          </li>
          @if (Auth::check())
            @include('layout.header.profile')
          @else              
            <li class="pull-right">
              <a href="/login">Login</a>
            </li>
          @endif
          <li class="pull-right">
            <a href="/about">About</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>