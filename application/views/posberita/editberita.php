<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?php echo form_error('menu', '<div class="alert alert-danger pl-3" role="alert">', '</div>'); ?>

            <?php echo $this->session->flashdata('message'); ?>

            <a href="index" class=" btn btn-primary mb-3">Add New Artikel</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Berita</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Keyword</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pos as $s) : ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo character_limiter($s['judul'], 30);  ?></td>
                            <td><?php echo $s['kategori']; ?></td>
                            <td><?php echo character_limiter($s['berita'], 90); ?></td>
                            <td>
                                <div class="col-sm-12">
                                    <img src="<?php echo base_url('assets/img/gambar_berita/') . $s['gambar']; ?>" class="img-thumbnail">
                                </div>
                            </td>
                            <td><?php echo $s['keyword']; ?></td>
                            <td><?php echo date('d F Y', $s['terbit']); ?></td>
                            <td>
                                <a href="" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Button trigger modal -->