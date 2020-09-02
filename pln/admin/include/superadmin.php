<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h4>All Borrower</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                 <table class="table table-bordered">
          <thead>
            <tr>
              <th> No </th>
              <th> Judul Kontrak </th>
              <th> Perseroan Terbatas </th>
              <th> Kontrak Awal </th>
              <th> Kontrak Akhir </th>
              <th> Jaminan </th>
              <th> Status </th>
              <th> Aksi </th>
            </tr>
          </thead>
          <tbody>
             <?php
               $sql = "SELECT * FROM rent";
               $result = $conn->query($sql);
               $id=1;
        if (mysqli_num_rows($result) > 0) :
          while ($data = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?=$id++;?></td>
              <td><?php echo $data['judul']; ?></td>
              <td><?=$data['nama_pt']?></td>
              <td><?php echo date('d-m-Y',strtotime($data['kon_awal'])); ?></td>
              <td><?php echo date('d-m-Y',strtotime($data['kon_akhir'])); ?></td>
              <td><?php   echo "<a href='file/".$data['file']."'>".$data['file']."</a>"; ?></td>
              <td><span class="btn btn-xs btn-<?php echo $data['status'] == 1 ? 'success' : 'danger' ?>"><?php echo $data['status'] == 1 ? 'sudah selesai' : 'belum selesai'; ?></span></td>
              <td class="text-center">
 <div class="btn-group">
    <a href="edit_all.php?id=<?=$data['id']?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="" data-original-title="Edit">
      Edit
   </a>
    <a href="delete.php?id=<?=$data['id']?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="" data-original-title="Remove">
      Delete
    </a>
    </div>
            </tr>
          <?php
          };
        else : ?>
          <tr>
            <td colspan="7">Data Kosong</td>
          </tr>
        <?php
        endif;
        ?>

            </tr>
          </tbody>
        </table>
            </div>
        </div>
    </div>
  </div>
</div>
