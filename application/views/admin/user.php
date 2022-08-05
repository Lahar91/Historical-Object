<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.11/jspdf.plugin.autotable.min.js"></script>

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-tittle"></div>
        </div>

        <div class="card-body">
            <div class="row mb-3">

            <div class="ml-2">
                     <button class="btn btn-primary btn-sm" data-toggle="modal" onclick="generateTable()">Print PDF</button>
                 </div>

            </div>

            <table class="table table-bordered text-center" id="konten">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-25">id_user</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th class="w-25">Role</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($db_user as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->id_user ?></td>
                            <td><?= $value->username ?></td>
                            <td><?= $value->email ?></td>
                            <td><?php if ($value->id_role !== "1"){ ?> 
                                    <p>User</p>
                                <?php }else { ?>
                                    <p>Admin</p>
                                    <?php }?>
                        
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            
            <table class="table table-bordered text-center" id="kontenjs" hidden>
            <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-25">id_user</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th class="w-25">Role</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($db_user as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->id_user ?></td>
                            <td><?= $value->username ?></td>
                            <td><?= $value->email ?></td>
                            <td><?php if ($value->id_role !== "1"){ ?> 
                                    <p>User</p>
                                <?php }else { ?>
                                    <p>Admin</p>
                                    <?php }?>
                        
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

 
</div>

<script>
    function generateTable() {
    var doc = new jsPDF('p', 'pt', 'a4');
    var y = 20;
    doc.setLineWidth(2);
    var width = doc.internal.pageSize.getWidth()
doc.text('Historical Object', width/2, y= y+20, { align: 'center' })
doc.text('List User', width/2, y= y+30, { align: 'center' })
    doc.autoTable({
        html: '#kontenjs',
        startY: 85,
        theme: 'grid',
    })
    doc.save('ListUser.pdf');
}
</script>