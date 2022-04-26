 <div class="col-md-12">
     <div class="card card-primary">
         <div class="card-header">
             <div class="card-tittle"></div>
         </div>

         <div class="card-body">
             <div class="row mb-3">
                 <div class="ml-2">
                     <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">Tambah</button>
                 </div>


             </div>

             <table class="table table-bordered text-center" id="konten">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Nama Kategori</th>
                         <th>Action</th>
                     </tr>
                 </thead>

                 <tbody>
                     <?php
                        $no = 1;
                        foreach ($db_kategori as $key => $value) {
                        ?>
                         <tr>
                             <td><?= $no++; ?></td>
                             <td><?= $value->nama_kategori ?></td>
                             <td>

                                 <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>"><i class="fa fa-edit"></i></button>
                                 <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_kategori ?>"><i class="fa fa-trash"></i></button>


                             </td>
                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>

     </div>

     <!-- model add-->
     <div class="modal fade" id="add">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Tambah <?= $tittle ?></h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <?php echo form_open('admin/kategori/add'); ?>
                     <div class="form-group">
                         <label>Nama Kategori</label>
                         <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori">
                     </div>

                 </div>
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save</button>
                 </div>
             </div>
             <?php echo form_close(); ?>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>
     <!-- /.modal -->


     <!-- model edit-->
     <?php foreach ($db_kategori as $key => $value) { ?>

         <div class="modal fade" id="edit<?= $value->id_kategori ?>">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">edit <?= $tittle ?></h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <?php echo form_open('admin/kategori/edit/' . $value->id_kategori) ?>

                         <div class="form-group">
                             <label>Nama Kategori</label>
                             <input type="text" class="form-control" name="nama_kategori" value="<?= $value->nama_kategori ?>" placeholder="Nama Kategori">
                         </div>

                     </div>
                     <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save</button>
                     </div>
                 </div>
                 <?php echo form_close(); ?>
                 <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
         </div>
     <?php } ?>
     <!-- /.modal -->

     <!-- model Delete-->
     <?php foreach ($db_kategori as $key => $value) { ?>
         <div class="modal fade" id="delete<?= $value->id_kategori ?>">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">Hapus <?= $tittle ?></h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <?php echo form_open('admin/kategori/delete'); ?>

                         <h5>Apakah anda kayakin Menghapus Data ini ?</h5>

                     </div>
                     <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <a href="<?= base_url('admin/kategori/delete/' . $value->id_kategori) ?>" class="btn btn-danger">Delete</a>
                     </div>
                 </div>
                 <?php echo form_close(); ?>
                 <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
     <?php } ?>
     <!--End Modal Delete-->


 </div>