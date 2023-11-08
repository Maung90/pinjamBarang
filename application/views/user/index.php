    <nav class="navbar navbar-expand bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">  
                <i class="fas fa-suitcase text-white"></i>
                <span class="badge bg-danger rounded-pill badge-notifications">5</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="container">
      <div class="row mt-5">
        <div class="col-4">
          <label for="select2Icons" class="form-label">Kategori</label>
          <select id="select2Icons" class="select2-icons form-select">
            <optgroup label="Peralatan">
              <option value="" data-icon="ti ti-brand-bootstrap" selected>Proyektor</option>
              <option value="" data-icon="ti ti-brand-codepen">Kabel</option>
              <option value="" data-icon="ti ti-brand-php">HDMI</option>
              <option value="" data-icon="ti ti-brand-css3">CSS3</option>
              <option value="" data-icon="ti ti-brand-html5">HTML5</option>
            </optgroup>
          </select>
        </div>
        <div class="col-8 d-flex justify-content-end">
          <div class="input-group input-group-merge mt-4 " style="width:60%;">
            <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
            <input
            type="text"
            class="form-control"
            placeholder="Search..."
            aria-label="Search..."
            aria-describedby="basic-addon-search31" />
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6 col-lg-3 my-2">
          <div class="card  h-100 w-100">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <img
              class="img-fluid d-flex mx-0 my-2 rounded"
              src="<?= base_url('assets/img/elements/1.jpg'); ?>"
              alt="Card image cap"/>
              <button class="btn btn-sm btn-outline-primary">Card link</button>
            </div>
          </div>
        </div> 
        <div class="col-6 col-lg-3  my-2">
          <div class="card  h-100 w-100">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <img
              class="img-fluid d-flex mx-0 my-2 rounded"
              src="<?= base_url('assets/img/elements/2.jpg'); ?>"
              alt="Card image cap" />
              <button class="btn btn-sm btn-outline-primary">Card link</button>
            </div>
          </div>
        </div> 
        <div class="col-6 col-lg-3  my-2">
          <div class="card h-100 w-100">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <img
              class="img-fluid d-flex mx-0 my-2 rounded"
              src="<?= base_url('assets/img/elements/3.jpg'); ?>"
              alt="Card image cap" />
              <button class="btn btn-sm btn-outline-primary">Card link</button>
            </div>
          </div>
        </div> 
        <div class="col-6 col-lg-3  my-2">
          <div class="card  h-100 w-100">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <img
              class="img-fluid d-flex mx-0 my-2 rounded"
              src="<?= base_url('assets/img/elements/4.jpg'); ?>"
              alt="Card image cap" />
              <button class="btn btn-sm btn-outline-primary">Card link</button>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>