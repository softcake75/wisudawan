<?php echo view('layouts/header') ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php echo view('layouts/nav') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php echo view('layouts/side') ?>
        <!-- end side -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data slider</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <!-- <h3 class="card-title">DataTable with default features</h3> -->
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahModal">
                                        (+) Tambah data Sliders
                                    </button>
                                    <!-- Download Template Button -->
                                    <a href="<?= base_url('slider/downloadTemplate') ?>" class="btn btn-sm btn-secondary">
                                        Download Template
                                    </a>
                                </div>
                                <div class="card-header">
                                <form action="<?= base_url('slider/uploadExcel') ?>" method="post" enctype="multipart/form-data" class="d-inline">
                                        <?= csrf_field() ?>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="excelFile" name="excelFile" accept=".xls,.xlsx" required>
                                                <label class="custom-file-label" for="excelFile">Choose Excel file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="submit">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Images</th>
                                                <th>Deskripsi</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Program Studi</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($slider)) : ?>
                                                <?php $no = 1; ?>
                                                <?php foreach ($slider as $slider) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td class="text-center"><img src="<?= base_url($slider['image']) ?>" alt="<?= $slider['title'] ?>" width="100"></td>
                                                        <td class="text-center"><?= $slider['description'] ?? ''  ?></td>
                                                        <td class="text-center"><?= $slider['title'] ?? ''  ?></td>
                                                        <td class="text-center"><?= $slider['id_kategori'] ?? ''  ?></td>
                                                        <td class="text-center"><?= $slider['id_prodi'] ?? ''  ?></td>
                                                        <td class="text-center">
                                                            <a href="slider/edit/<?= $slider['id_slider'] ?>" class="btn btn-sm btn-info mb-2">Edit</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak ada data.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php echo view('layouts/foot') ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data Sliders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <!-- Isi form untuk input data -->
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <p style="color: red;"><?= $error ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                    <?php if (session()->getFlashdata('message')) : ?>
                        <div>
                            <p style="color: green;"><?= session()->getFlashdata('message') ?></p>
                        </div>
                    <?php endif ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div>
                            <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
                        </div>
                    <?php endif ?>

                    <form action="<?= base_url('slider/store') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="image">Images Sliders</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori Lulusan</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="Memuaskan">Memuaskan</option>
                                <option value="Sangat Memuaskan">Sangat Memuaskan</option>
                                <option value="Pujian">Pujian</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_prodi">Program Studi</label>
                            <select name="id_prodi" id="id_prodi" class="form-control">
                                <option value="1">S1 Teknik Informatika</option>
                                <option value="2">S1 PAI</option>
                                <option value="3">S1 Manajemen</option>
                            </select>
                        </div>
                        <input type="hidden" name="created_at" value="<?= date('Y-m-d H:i:s') ?>">
                        <input type="hidden" name="updated_at" value="<?= date('Y-m-d H:i:s') ?>">
                        <input type="hidden" name="deleted_at" value="">
                        <input type="hidden" name="created_by" value="1">
                        <input type="hidden" name="updated_by" value="1">
                        <input type="hidden" name="deleted_by" value="">

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ./wrapper -->

    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('plugins/jszip/jszip.min.js') ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
