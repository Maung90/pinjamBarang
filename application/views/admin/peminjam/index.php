<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
<div class="card mb-3">
    <div class="card-body">
        <div class="card-title">
            <h4>Tambah Peminjam</h4>
        </div>
        <?= $this->session->flashdata('success'); ?>
        <form action="<?= base_url('Peminjam/insert') ?>" method="POST">
            <div class="mb-3">
                <label for="no_identitas">Identitas</label>
                <input id="no_identitas" name="no_identitas" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input id="nama_peminjam" name="nama_peminjam" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="kelas">Kelas</label>
                <input id="kelas" name="kelas" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="no_telp">No Telephone</label>
                <input id="no_telp" name="no_telp" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger ms-3">Reset</button>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4>Table Peminjam</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Identtitas</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telephone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2215354079</td>
                    <td>Rangga</td>
                    <td>Denpasar Timur</td>
                    <td>083189944777</td>
                    <td>Action</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>