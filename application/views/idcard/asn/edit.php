<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-1">
                <h3 class="content-header-title">Halaman <?=$judul?></h3>
            </div>
            <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=site_url('beranda')?>">Beranda</a>
                        </li>

                        <li class="breadcrumb-item active"><?=$judul?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic Elements start -->
            <section class="basic-elements">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <?= form_open_multipart()?>

                            <input type="hidden" name="foto_lama" value="<?=$data['foto']?>">
                            <div class="card-header">
                                <h4 class="card-title"><?=$judul?></h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <?= $this->session->flashdata('message') ?>
                                            <fieldset class="form-group">
                                                <label for="basicInput">NIP</label>
                                                <input type="text" name="nip" id="nip" value="<?=$data['nip']?>"
                                                    class="form-control" required readonly>


                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Nama</label>
                                                <input type="text" name="nama" id="nama" class="form-control" required
                                                    readonly>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Instansi</label>


                                                <textarea name="instansi" id="instansi" class="form-control" rows="5"
                                                    readonly required></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Jabatan</label>
                                                <input type="text" name="jabatan" id="jabatan" class="form-control"
                                                    required readonly>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Eselon</label>
                                                <input type="text" name="jabatan" id="eselon" class="form-control"
                                                    required readonly>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Golongan Darah</label>
                                                <select name="goldar" id="goldar" class="form-control" required>
                                                    <option value="">Pilih</option>
                                                    <?php foreach(goldar() as $row) : ?>
                                                    <option <?php if($data['goldar'] == $row){echo 'selected';}?>
                                                        value="<?=$row?>"><?=$row?></option>

                                                    <?php endforeach?>
                                                </select>

                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tanggal Dikeluarkan</label>
                                                <input type="date" value="<?=$data['tgl_dikeluarkan']?>"
                                                    name="tgl_dikeluarkan" id="tgl_dikeluarkan" class="form-control"
                                                    required>
                                            </fieldset>
                                        </div>

                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Alamat Kantor</label>
                                                <textarea name="alamat_kantor" id="alamat" class="form-control" rows="5"
                                                    placeholder="wajib diisi"
                                                    required><?=$data['alamat_kantor']?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Foto</label>
                                                <input type="file" name="foto" id="foto" class="form-control">

                                            </fieldset>
                                        </div>


                                        <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                            <img src="<?= base_url().$data['foto']?>" alt="" width="100">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="<?= site_url('idcard/page/asn')?>"> <button type="button"
                                            class="btn btn-outline-danger"><i class="fa fa-times"></i>
                                            Batal</button></a>
                                    <button type="submit" class="btn btn-outline-success"><i class="ft-save"></i>
                                        Simpan</button>

                                </div>
                                <?= form_close()?>
                            </div>
                        </div>

                    </div>
            </section>
            <!-- Basic Inputs end -->



        </div>
    </div>
</div>