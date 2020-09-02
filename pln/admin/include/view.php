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
              <th> Status </th>
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
              <td><span class="btn btn-xs btn-<?php echo $data['status'] == 1 ? 'success' : 'danger' ?>"><?php echo $data['status'] == 1 ? 'sudah selesai' : 'belum selesai'; ?></span></td>
              
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
