@include('header')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">people</i>
          </div>
          <p class="card-category">Total Mahasiswa Aktif</p>
          <h3 class="card-title"><?php echo ($total_active); ?>
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
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">people</i>
          </div>
          <p class="card-category">Total Mahasiswa Tidak Aktif</p>
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
          <h4 class="card-title">Mahasiswa Aktif</h4>
          <p class="card-category">Data Mahasiswa yang terdaftar dengan status aktif</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-success">
              <th>#</th>
              <th>NIP</th>
              <th>Nama Lengkap</th>
              <th>Jenis Kelamin</th>
              <th>Username</th>
              <th>Kelas</th>
              <th>Tahun Masuk</th>
              <th>Semester</th>
              <th></th>
            </thead>
            <tbody>
            <?php foreach ($active_mahasiswa as $key => $value) { ?>
                <?php
                    $created_at_datetime = date_create($value->created_at);
                    $formatted_created_at_datetime = date_format($created_at_datetime, "d M Y");
                ?>
                <tr>
                    <td><?= $formatted_created_at_datetime; ?></td>
                    <td><?= $value->nim; ?></td>
                    <td><?= $value->nama_lengkap; ?></td>
                    <td><?= $value->jenis_kelamin; ?></td>
                    <td><?= $value->username; ?></td>
                    <td><?= $value->kelas; ?></td>
                    <td><?= $value->tahun_masuk; ?></td>
                    <td><?= $value->semester; ?></td>
                    <td>
                        <a href="" data-mahasiswa-id="<?= $value->id; ?>" class="btn btn-info btn-sm btn-mahasiswa-detail"><i class="material-icons">person_search</i></a>
                        <a href="" data-mahasiswa-id="<?= $value->id; ?>" class="btn btn-danger btn-sm btn-mahasiswa-disable"><i class="material-icons">close</i></a>
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
          <h4 class="card-title">Mahasiswa Tidak Aktif</h4>
          <p class="card-category">Data Mahasiswa yang terdaftar dengan status tidak aktif</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
              <thead class="text-success">
                <th>#</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Username</th>
                <th>Kelas</th>
                <th>Tahun Masuk</th>
                <th>Semester</th>
                <th></th>
              </thead>
              <tbody>
              <?php foreach ($inactive_mahasiswa as $key => $value) { ?>
                  <?php
                      $created_at_datetime = date_create($value->created_at);
                      $formatted_created_at_datetime = date_format($created_at_datetime, "d M Y");
                  ?>
                  <tr>
                      <td><?= $formatted_created_at_datetime; ?></td>
                      <td><?= $value->nim; ?></td>
                      <td><?= $value->nama_lengkap; ?></td>
                      <td><?= $value->jenis_kelamin; ?></td>
                      <td><?= $value->username; ?></td>
                      <td><?= $value->kelas; ?></td>
                      <td><?= $value->tahun_masuk; ?></td>
                      <td><?= $value->semester; ?></td>
                      <td>
                          <a href="" data-mahasiswa-id="<?= $value->id; ?>" class="btn btn-info btn-sm btn-mahasiswa-detail"><i class="material-icons">person_search</i></a>
                          <a href="" data-mahasiswa-id="<?= $value->id; ?>" class="btn btn-danger btn-sm btn-mahasiswa-enable"><i class="material-icons">check</i></a>
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
    console.log("mahasiswa.blade.php");
    $('.btn-mahasiswa-enable').on("click", function(event) {
        event.preventDefault();
        var mahasiswa_id = $(this).data("mahasiswa-id");
        var url = "http://api-ijin.mmhp.tech/user/mahasiswa/enable/" + mahasiswa_id;
        $.get(url, function(response) {
            var data = JSON.parse(response);
            if(data.error != true) {
                window.location.replace("/mahasiswa");
            } else {
                console.log(data);
            }
        });
    });
    $('.btn-mahasiswa-disable').on("click", function(event) {
        event.preventDefault();
        var mahasiswa_id = $(this).data("mahasiswa-id");
        var url = "http://api-ijin.mmhp.tech/user/mahasiswa/disable/" + mahasiswa_id;
        $.get(url, function(response) {
            var data = JSON.parse(response);
            if(data.error != true) {
                window.location.replace("/mahasiswa");
            } else {
                console.log(data);
            }
        });
    });
});
</script>
