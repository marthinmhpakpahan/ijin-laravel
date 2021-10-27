@include('header')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">people</i>
          </div>
          <p class="card-category">Total Dosen</p>
          <h3 class="card-title"><?php echo ($total_dosen); ?>
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
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">people</i>
          </div>
          <p class="card-category">Total Mahasiswa</p>
          <h3 class="card-title"><?php echo ($total_mahasiswa); ?>
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
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">check</i>
          </div>
          <p class="card-category">Total Request</p>
          <h3 class="card-title"><?php echo ($total_approved_request); ?> <small>REQUEST</small></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
              <i class="material-icons">info_outline</i> Data Permohonan Disetujui
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">close</i>
          </div>
          <p class="card-category">Total Request</p>
          <h3 class="card-title"><?php echo ($total_declined_request); ?> <small>REQUEST</small></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
              <i class="material-icons">info_outline</i> Data Permohonan Ditolak
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-success">
          <h4 class="card-title">Approved Requests</h4>
          <p class="card-category">Data Request dari Mahasiswa yang disetujui oleh Dosen</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-success">
              <th>#</th>
              <th>Request</th>
              <th>Dosen</th>
              <th>Mahasiswa</th>
              <th>Waktu Mulai</th>
              <th>Waktu Selesai</th>
            </thead>
            <tbody>
            <?php foreach ($approved_request as $key => $value) { ?>
                <?php
                    $created_at_datetime = date_create($value->created_at);
                    $formatted_created_at_datetime = date_format($created_at_datetime, "d M Y H:i:s");
                    $start_datetime = date_create($value->start_datetime);
                    $formatted_start_datetime = date_format($start_datetime, "d M Y H:i:s");
                    $end_datetime = date_create($value->end_datetime);
                    $formatted_end_datetime = date_format($end_datetime, "d M Y H:i:s");
                ?>
                <tr>
                    <td><?= $formatted_created_at_datetime; ?></td>
                    <td><?= $value->request_name; ?></td>
                    <td><?= $value->dosen_name; ?></td>
                    <td><?= $value->mahasiswa_name; ?></td>
                  <td><?= $formatted_start_datetime; ?></td>
                  <td><?= $formatted_end_datetime; ?></td>
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
          <h4 class="card-title">Declined Requests</h4>
          <p class="card-category">Data Request dari Mahasiswa yang ditolak oleh Dosen</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
              <thead class="text-danger">
                  <th>#</th>
                  <th>Request</th>
                  <th>Dosen</th>
                  <th>Mahasiswa</th>
                  <th>Waktu Mulai</th>
                  <th>Waktu Selesai</th>
              </thead>
              <tbody>
              <?php foreach ($declined_request as $key => $value) { ?>
                  <?php
                      $created_at_datetime = date_create($value->created_at);
                      $formatted_created_at_datetime = date_format($created_at_datetime, "d M Y H:i:s");
                      $start_datetime = date_create($value->start_datetime);
                      $formatted_start_datetime = date_format($start_datetime, "d M Y H:i:s");
                      $end_datetime = date_create($value->end_datetime);
                      $formatted_end_datetime = date_format($end_datetime, "d M Y H:i:s");
                  ?>
                  <tr>
                      <td><?= $formatted_created_at_datetime; ?></td>
                      <td><?= $value->request_name; ?></td>
                      <td><?= $value->dosen_name; ?></td>
                      <td><?= $value->mahasiswa_name; ?></td>
                    <td><?= $formatted_start_datetime; ?></td>
                    <td><?= $formatted_end_datetime; ?></td>
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
    console.log("dashboard.blade.php");
});
</script>
