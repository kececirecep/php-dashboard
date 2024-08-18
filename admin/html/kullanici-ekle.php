<?php
include('head.php');
include('/xampp/htdocs/admin/includes/db.php');
include('/xampp/htdocs/admin/includes/function.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $adSoyad = $_POST['adSoyad'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $yas = $_POST['yas'];

  $success = addUser($adSoyad, $email, $tel, $yas);

  if ($success) {
    echo "Kullanıcı başarıyla eklendi!";
  } else {
    echo "Kullanıcı eklenirken bir hata oluştu.";
  }
}

?>

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?php
    include('menu.php');
    ?>


    <div class="layout-page">
      <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="card p-6">
              <div class="col-xl-6">
                <div class="card mb-6">
                  <h5 class="card-header">Kullanıcı Ekle</h5>
                  <div class="card-body">
                    <form method="post" action="kullanici-ekle.php">
                      <div class="mb-4 row">
                        <label for="adSoyad" class="col-md-2 col-form-label">Ad Soyad</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="adSoyad" id="adSoyad" required />
                        </div>
                      </div>
                      <div class="mb-4 row">
                        <label for="email" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                          <input class="form-control" type="email" name="email" id="email" required />
                        </div>
                      </div>
                      <div class="mb-4 row">
                        <label for="tel" class="col-md-2 col-form-label">Telefon</label>
                        <div class="col-md-10">
                          <input class="form-control" type="tel" name="tel" id="tel" required />
                        </div>
                      </div>
                      <div class="mb-4 row">
                        <label for="yas" class="col-md-2 col-form-label">Yaş</label>
                        <div class="col-md-10">
                          <input class="form-control" type="number" name="yas" id="yas" required />
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Ekle</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Core JS -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- GitHub widget -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>