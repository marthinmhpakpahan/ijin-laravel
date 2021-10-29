@include('header')
<div class="container-fluid">
  <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="material-icons">cached</i>
            </div>
            <p class="card-category">Total Request Belum Diproses</p>
            <h3 class="card-title"><?php echo ($total_pending); ?>
              <small>REQUEST</small>
            </h3>
          </div>
          <div class="card-footer">
              <div class="stats">
                <i class="material-icons">info_outline</i> Data Request Disetujui
              </div>
          </div>
        </div>
      </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">check</i>
          </div>
          <p class="card-category">Total Request Disetujui</p>
          <h3 class="card-title"><?php echo ($total_accepted); ?>
            <small>REQUEST</small>
          </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
              <i class="material-icons">info_outline</i> Data Request Disetujui
            </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">close</i>
          </div>
          <p class="card-category">Total Request Ditolak</p>
          <h3 class="card-title"><?php echo ($total_rejected); ?>
            <small>REQUEST</small>
          </h3>
        </div>
        <div class="card-footer">
            <div class="stats">
              <i class="material-icons">info_outline</i> Data Request Disetujui
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">Request Belum Diproses</h4>
            <p class="card-category">Data Request yang belum diproses oleh Dosen</p>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-success">
                <th>#</th>
                <th>Tipe Request</th>
                <th>Dosen</th>
                <th>Mahasiswa</th>
                <th>Deskripsi</th>
                <th>Waktu Pertemuan</th>
                <th></th>
              </thead>
              <tbody>
              <?php foreach ($pending_request as $key => $value) { ?>
                  <?php
                      $created_at_datetime = date_create($value->created_at);
                      $formatted_created_at_datetime = date_format($created_at_datetime, "d M Y");
                      $start_datetime = date_create($value->start_datetime);
                      $formatted_start_date = date_format($start_datetime, "d M Y");
                      $formatted_start_time = date_format($start_datetime, "H;i");
                      $end_datetime = date_create($value->end_datetime);
                      $formatted_end_time = date_format($end_datetime, "H:i");
                      $meeting_time = $formatted_start_date . ", " . $formatted_start_time . " s/d " . $formatted_end_time;
                  ?>
                  <tr>
                      <td><?= $formatted_created_at_datetime; ?></td>
                      <td><?= $value->request_name; ?></td>
                      <td><?= $value->dosen_name; ?></td>
                      <td><?= $value->mahasiswa_name; ?></td>
                      <td><?= $value->description; ?></td>
                      <td><?= $meeting_time; ?></td>
                      <td>
                          <a href="" data-request-id="<?= $value->id; ?>" class="btn btn-info btn-sm btn-request-detail"><i class="material-icons">search</i></a>
                          <?php if($_COOKIE['role'] == "admin" || $_COOKIE['role'] == "dosen") { ?>
                          <a href="" data-request-id="<?= $value->id; ?>" class="btn btn-success btn-sm btn-request-accept"><i class="material-icons">check</i></a>
                          <a href="" data-request-id="<?= $value->id; ?>" class="btn btn-danger btn-sm btn-request-reject"><i class="material-icons">close</i></a>
                          <?php } ?>
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
        <div class="card-header card-header-success">
          <h4 class="card-title">Request Disetujui</h4>
          <p class="card-category">Data Request yang disetujui oleh Dosen</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-success">
              <th>#</th>
              <th>Tipe Request</th>
              <th>Dosen</th>
              <th>Mahasiswa</th>
              <th>Deskripsi</th>
              <th>Waktu Pertemuan</th>
              <th></th>
            </thead>
            <tbody>
            <?php foreach ($accepted_request as $key => $value) { ?>
                <?php
                    $created_at_datetime = date_create($value->created_at);
                    $formatted_created_at_datetime = date_format($created_at_datetime, "d M Y");
                    $start_datetime = date_create($value->start_datetime);
                    $formatted_start_date = date_format($start_datetime, "d M Y");
                    $formatted_start_time = date_format($start_datetime, "H;i");
                    $end_datetime = date_create($value->end_datetime);
                    $formatted_end_time = date_format($end_datetime, "H:i");
                    $meeting_time = $formatted_start_date . ", " . $formatted_start_time . " s/d " . $formatted_end_time;
                ?>
                <tr>
                    <td><?= $formatted_created_at_datetime; ?></td>
                    <td><?= $value->request_name; ?></td>
                    <td><?= $value->dosen_name; ?></td>
                    <td><?= $value->mahasiswa_name; ?></td>
                    <td><?= $value->description; ?></td>
                    <td><?= $meeting_time; ?></td>
                    <td>
                        <a href="" data-request-id="<?= $value->id; ?>" class="btn btn-info btn-sm btn-request-detail"><i class="material-icons">search</i></a>
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
          <h4 class="card-title">Request Ditolak</h4>
          <p class="card-category">Data Request yang ditolak oleh Dosen</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
              <thead class="text-success">
                <th>#</th>
                <th>Tipe Request</th>
                <th>Dosen</th>
                <th>Mahasiswa</th>
                <th>Deskripsi</th>
                <th>Waktu Pertemuan</th>
                <th></th>
              </thead>
              <tbody>
              <?php foreach ($rejected_request as $key => $value) { ?>
                  <?php
                      $created_at_datetime = date_create($value->created_at);
                      $formatted_created_at_datetime = date_format($created_at_datetime, "d M Y");
                      $start_datetime = date_create($value->start_datetime);
                      $formatted_start_date = date_format($start_datetime, "d M Y");
                      $formatted_start_time = date_format($start_datetime, "H;i");
                      $end_datetime = date_create($value->end_datetime);
                      $formatted_end_time = date_format($end_datetime, "H:i");
                      $meeting_time = $formatted_start_date . ", " . $formatted_start_time . " s/d " . $formatted_end_time;
                  ?>
                  <tr>
                      <td><?= $formatted_created_at_datetime; ?></td>
                      <td><?= $value->request_name; ?></td>
                      <td><?= $value->dosen_name; ?></td>
                      <td><?= $value->mahasiswa_name; ?></td>
                      <td><?= $value->description; ?></td>
                      <td><?= $meeting_time; ?></td>
                      <td>
                          <a href="" data-request-id="<?= $value->id; ?>" class="btn btn-info btn-sm btn-request-detail"><i class="material-icons">search</i></a>
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
    console.log("request.blade.php");
    $('.btn-request-accept').on("click", function(event) {
        event.preventDefault();
        var request_id = $(this).data("request-id");
        var url = "http://api-ijin.mmhp.tech/request/dosen/accept/" + request_id;
        $.get(url, function(response) {
            var data = JSON.parse(response);
            if(data.error != true) {
                window.location.replace("/request");
            } else {
                console.log(data);
            }
        });
    });
    $('.btn-request-reject').on("click", function(event) {
        event.preventDefault();
        var request_id = $(this).data("request-id");
        var url = "http://api-ijin.mmhp.tech/request/dosen/reject/" + request_id;
        $.get(url, function(response) {
            var data = JSON.parse(response);
            if(data.error != true) {
                window.location.replace("/request");
            } else {
                console.log(data);
            }
        });
    });
});
</script>
