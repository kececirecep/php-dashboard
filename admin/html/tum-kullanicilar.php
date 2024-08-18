<?php
include('head.php');
include('/xampp/htdocs/admin/includes/db.php');
include('/xampp/htdocs/admin/includes/function.php');

// Kullanıcıları listeleyin
try {
  $kullanicilar = listUsers(); // Kullanıcıları al
} catch (Exception $e) {
  die("Hata: " . $e->getMessage());
}


// Silme işlemi
if (isset($_GET['delete'])) {
  $userId = intval($_GET['delete']);
  try {
    $success = userDelete($userId);
    if ($success) {
      echo "Kullanıcı başarıyla silindi!";
    } else {
      echo "Kullanıcı silinirken bir hata oluştu.";
    }
  } catch (Exception $e) {
    echo "Hata: " . $e->getMessage();
  }
}

?>

<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <?php include('menu.php'); ?>

    <div class="layout-page">
      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="row">
            <div class="card p-6">
              <div class="col-xl-12">
                <!-- HTML5 Inputs -->
                <div class="card overflow-hidden">
                  <h5 class="card-header">Tüm Kullanıcılar</h5>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>Ad Soyad</th>
                          <th>Email</th>
                          <th>Telefon</th>
                          <th>Yaş</th>
                          <th>İşlem</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <?php foreach ($kullanicilar as $kullanici): ?>
                          <tr>
                            <td><?php echo htmlspecialchars($kullanici['ad']); ?></td>
                            <td><?php echo htmlspecialchars($kullanici['email']); ?></td>
                            <td><?php echo htmlspecialchars($kullanici['telefon']); ?></td>
                            <td><?php echo htmlspecialchars($kullanici['yas']); ?></td>
                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item" href="?delete=<?php echo htmlspecialchars($kullanici['id']); ?>" onclick="return confirm('Bu kullanıcıyı silmek istediğinizden emin misiniz?');"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
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