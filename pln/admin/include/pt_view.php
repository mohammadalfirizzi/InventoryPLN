<div class="row">
    <div class="col-md-5 grid-margin stretch-card">
    <div class="card">
        <h5 class="card-header">
            Tambahkan Perseroan Terbatas
        </h5>
        <div class="card-body">
            <h6 class="card-title">
                Nama Perseroan Terbatas
            </h6>
            <form method="post" action="add_pete.php">
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Perseroan Terbatas Name">
                </div>
                <button type="submit" name="add_pt" class="btn btn-primary">Add Perseroan Terbatas</button>
            </form>
        </div>
    </div>
    </div>
    <div class="col-md-7">
         <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <h5 class="card-header">Daftar Kategori Perseroan Terbatas</h5>
                <div class="card-body">
                    <h6 class="card-title text-center">List Kategori</h6>
                     <div class="table-responsive">
                    <table class="table table-bordered">
          <thead>
            <tr>
              <th> No </th>
              <th> Name </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
             <?php
             $sql = "SELECT * FROM pt";
             $result = $conn->query($sql);
             $id=1;
        if (mysqli_num_rows($result) > 0) :
          while ($data = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?=$id++;?></td>
              <td><?=$data['nama']?></td>
              <td class="text-center">
 <div class="btn-group">
    <a href="delete_categorie.php?id=<?=$data['id']?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="" data-original-title="Remove">
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
</div>
