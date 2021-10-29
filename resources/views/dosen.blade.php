@include('header')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">people</i>
          </div>
          <p class="card-category">Total Dosen Aktif</p>
          <h3 class="card-title"><?php echo ($total_active); ?>
            <small>ORANG</small>
          </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
              <i class="material-icons">info_outline</i> Data Dosen Aktif
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">people</i>
          </div>
          <p class="card-category">Total Dosen Tidak Aktif</p>
          <h3 class="card-title"><?php echo ($total_inactive); ?>
            <small>ORANG</small>
          </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
              <i class="material-icons">info_outline</i> Data Mahasiswa Aktif
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">Dosen Aktif</h4>
          <p class="card-category">Data Dosen yang terdaftar dengan status aktif</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-success">
              <th>#</th>
              <th>NIP</th>
              <th>Nama Lengkap</th>
              <th>Jenis Kelamin</th>
              <th>Username</th>
              <th></th>
            </thead>
            <tbody>
            <?php foreach ($active_dosen as $key => $value) { ?>
                <?php
                    $created_at_datetime = date_create($value->created_at);
                    $formatted_created_at_datetime = date_format($created_at_datetime, "d M Y H:i:s");
                ?>
                <tr>
                    <td><?= $formatted_created_at_datetime; ?></td>
                    <td><?= $value->nip; ?></td>
                    <td><?= $value->nama_lengkap; ?></td>
                    <td><?= $value->jenis_kelamin; ?></td>
                    <td><?= $value->username; ?></td>
                    <td>
                        <a href="" data-dosen-id="<?= $value->id; ?>" class="btn btn-info btn-sm btn-dosen-detail"><i class="material-icons">person_search</i></a>
                        <a href="" data-dosen-id="<?= $value->id; ?>" class="btn btn-danger btn-sm btn-dosen-disable"><i class="material-icons">close</i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-danger">
          <h4 class="card-title">Dosen Tidak Aktif</h4>
          <p class="card-category">Data Dosen yang terdaftar dengan status tidak aktif</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
              <thead class="text-danger">
                  <th>#</th>
                  <th>NIP</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>Username</th>
                  <th></th>
              </thead>
              <tbody>
                  <?php foreach ($inactive_dosen as $key => $value) { ?>
                      <?php
                          $created_at_datetime = date_create($value->created_at);
                          $formatted_created_at_datetime = date_format($created_at_datetime, "d M Y H:i:s");
                      ?>
                      <tr>
                          <td><?= $formatted_created_at_datetime; ?></td>
                          <td><?= $value->nip; ?></td>
                          <td><?= $value->nama_lengkap; ?></td>
                          <td><?= $value->jenis_kelamin; ?></td>
                          <td><?= $value->username; ?></td>
                          <td>
                              <a href="" data-dosen-id="<?= $value->id; ?>" class="btn btn-info btn-sm btn-dosen-detail"><i class="material-icons">person_search</i></a>
                              <a href="" data-dosen-id="<?= $value->id; ?>" class="btn btn-danger btn-sm btn-dosen-enable"><i class="material-icons">check</i></a>
                          </td>
                      </tr>
                  <?php } ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@include('footer')
<script>
$(document).ready(function() {
    console.log("dosen.blade.php");
    $('.btn-dosen-enable').on("click", function(event) {
        event.preventDefault();
        var dosen_id = $(this).data("dosen-id");
        var url = "http://api-ijin.mmhp.tech/user/dosen/enable/" + dosen_id;
        $.get(url, function(response) {
            var data = JSON.parse(response);
            if(data.error != true) {
                window.location.replace("/dosen");
            } else {
                console.log(data);
            }
        });
    });
    $('.btn-dosen-disable').on("click", function(event) {
        event.preventDefault();
        var dosen_id = $(this).data("dosen-id");
        var url = "http://api-ijin.mmhp.tech/user/dosen/disable/" + dosen_id;
        $.get(url, function(response) {
            var data = JSON.parse(response);
            if(data.error != true) {
                window.location.replace("/dosen");
            } else {
                console.log(data);
            }
        });
    });
});
</script>
