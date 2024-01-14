<?php 
$tersedia = $this->db->where('status_barang','tersedia')->get('tbbarang')->num_rows();
$dipinjam = $this->db->where('status_barang','dipinjam')->get('tbbarang')->num_rows();
$tdk_tersedia = $this->db->where('status_barang','tidak tersedia')->get('tbbarang')->num_rows();
$peminjam = $this->db->get('tbpeminjam')->num_rows();
$barang = $this->db->get('tbbarang')->num_rows();

?>
<div class="row justify-content-center">
    <div class="col-12 mb-3">
        <div class="card p-4">
            <div class="row gx-0">
                <div class="col-4">
                    <div class="h-100 d-flex flex-column border-end">
                        <h6 class="text-primary text-center small p-0 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-bolt" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M13.5 17h-7.5v-14h-2"></path>
                                <path d="M6 5l14 1l-.858 6.004m-2.642 .996h-10.5"></path>
                                <path d="M19 16l-2 3h4l-2 3"></path>
                            </svg>
                            Barang Tersedia
                        </h6>
                        <h6 class="fw-bolder text-center m-0 p-0"><?=$tersedia;   ?> </h6>
                    </div>
                </div>
                <div class="col-4">
                    <div class="h-100 d-flex flex-column border-start">
                        <h6 class="text-primary text-center small p-0 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M13 17h-7v-14h-2"></path>
                                <path d="M6 5l14 1l-1 7h-13"></path>
                                <path d="M22 22l-5 -5"></path>
                                <path d="M17 22l5 -5"></path>
                            </svg>
                            Barang Dipinjam
                        </h6>
                        <h6 class="fw-bolder text-center m-0 p-0"><?=$dipinjam;?></h6>
                    </div>
                </div>
                <div class="col-4">
                    <div class="h-100 d-flex flex-column border-start">
                        <h6 class="text-primary text-center small p-0 m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                <path d="M13 17h-7v-14h-2"></path>
                                <path d="M6 5l14 1l-1 7h-13"></path>
                                <path d="M22 22l-5 -5"></path>
                                <path d="M17 22l5 -5"></path>
                            </svg>
                            Barang Tidak Tersedia
                        </h6>
                        <h6 class="fw-bolder text-center m-0 p-0"><?=$tdk_tersedia;?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card p-4">
            <div class="row gx-0">
                <div class="col-6">
                    <div class="h-100 d-flex flex-column border-end">
                        <h6 class="text-primary text-center small p-0 m-0">
                            <i class="ti ti-users"></i>
                            Jumlah Peminjam
                        </h6>
                        <h6 class="fw-bolder text-center m-0 p-0"><?=$peminjam;?></h6>
                    </div>
                </div>
                <div class="col-6">
                    <div class="h-100 d-flex flex-column border-start">
                        <h6 class="text-primary text-center small p-0 m-0">
                            <i class="ti ti-layout-grid"></i>
                            Jumlah Barang
                        </h6>
                        <h6 class="fw-bolder text-center m-0 p-0"><?=$barang;?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-white">Grafik Peminjaman 30 Hari Terakhir</h5>
                <div id="chart"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3"></script>

    <script>
        var chartData = [
            <?php foreach (array_reverse($grafik) as $loop){ ?> {
                x: '<?= $loop['tanggal']; ?>',
                y: <?= $loop['peminjaman']; ?>
            },
        <?php } ?>
        ];

        var options = {
            chart: {
                type: 'line',
                height: 350
            },
            series: [{
                name: 'peminjaman',
                data: chartData
            }],
            xaxis: {
                type: 'datetime',
                categories: chartData.map(data => data.x)
            },
            yaxis: {
                title: {
                    text: 'Grafik Peminjaman 30 Hari Terakhir'
                }
            },
            colors: ['#7888fc']
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

</div>