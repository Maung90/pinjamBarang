<div class="row">
<!-- Basic Layout -->
<div class="col-xxl">
    <div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Barang</h5>
    </div>
    <div class="card-body">
        <form>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Kode Barang</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="basic-default-name" placeholder="Masukan Kode" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Barang</label>
            <div class="col-sm-10">
            <input
                type="password"
                class="form-control"
                id="basic-default-company"
                placeholder="Masukan Nama" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Merk Barang</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="basic-default-name" placeholder="Masukan Merk" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Status Barang</label>
            <div class="col-sm-10">
            <input
                type="text"
                id="basic-default-phone"
                class="form-control phone-mask"
                placeholder="Masukan Status"
                aria-describedby="basic-default-phone" />
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Gambar Barang</label>
            <div class="col-sm-10">
            <textarea
                id="basic-default-message"
                class="form-control"
                placeholder="Masukan Gambar"
            ></textarea>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Kode Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Merk Barang</th>
      <th scope="col">Status Barang</th>
      <th scope="col">Gambar Barang</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        	<button type="button" class="btn btn-sm btn-primary">Edit</button>
        	<button type="button" class="btn btn-sm btn-danger">Hapus</button>
        </td>
      </tr>
      
  </tbody>
</table>