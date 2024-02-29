<header>
    <nav class="navbar bg-dark navbar-expand-lg fixed-top" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My APP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['page']) && $_GET['page']==='home') echo "active"; ?>" aria-current="page" href="?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['page']) && $_GET['page']==='gallery') echo "active"; ?>" href="?page=gallery">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['page']) && $_GET['page']==='contact') echo "active"; ?>" href="?page=contact">Contact</a>
        </li>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</header>