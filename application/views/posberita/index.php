<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?php echo $this->session->flashdata('message'); ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-lg-10">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <?php echo form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">Select Kategori</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?php echo $k['id']; ?>"><?php echo $k['kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <label for="berita">Berita</label>
                        <textarea name="berita" class="ckeditor" id="berita"></textarea>
                        <?php echo form_error('berita', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-5">
                        <label for="keyword">Keyword</label>
                        <input type="text" class="form-control" id="keyword" name="keyword">
                        <?php echo form_error('keyword', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg">
                        <label for="picture">Gambar</label>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="gambar">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->