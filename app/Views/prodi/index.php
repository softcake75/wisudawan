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
                            <h1>Data prodi</h1>
                        </div>
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div> -->
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
                                        (+) Tambah data Program Studi
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Prodi</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($prodi)) : ?>
                                                <?php $no = 1; ?>
                                                <?php foreach ($prodi as $prodi) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++; ?></td>
                                                        <td class="text-center"><?= $prodi['nama_prodi'] ?? ''  ?></td>
                                                        <td class="text-center">
                                                            <a href="prodi/edit/<?= $prodi['id_prodi'] ?>" class="btn btn-sm btn-info mb-2">Edit</a>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak ada data pengguna.</td>
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
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data Program Studi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi form untuk input data -->
                    <form action="<?= base_url('prodi/store') ?>" method="post">
                        <!-- ... -->
                        <div class="form-group">
                            <label for="nama_prodi">Nama Program Studi</label>
                            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
                        </div>
                        
                        <!-- (Tambahkan input fields sesuai kebutuhan Anda) -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- End Edit Data -->

    <!-- ./wrapper -->

    <script src="<?= base_url('/public/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('/public/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('/public/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/jszip/jszip.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/pdfmake/pdfmake.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/pdfmake/vfs_fonts.js')?>"></script>
    <script src="<?= base_url('/public/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
    <script src="<?= base_url('/public/plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/public/dist/js/adminlte.min.js')?>"></script>

    <!-- Modal js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>