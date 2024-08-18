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


// Güncelleme işlemi
if (isset($_POST['update'])) {
  $userId = intval($_POST['userId']);
  $adSoyad = $_POST['adSoyad'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $yas = intval($_POST['yas']);

  try {
    $success = updateUser($userId, $adSoyad, $email, $tel, $yas);
    if ($success) {
      echo "Kullanıcı başarıyla güncellendi!";
    } else {
      echo "Kullanıcı güncellenirken bir hata oluştu.";
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
                          <th>Actions</th>
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
                                  <button class="updateBtn dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo htmlspecialchars($kullanici['id']); ?>"><i class="bx bx-edit-alt me-1"></i>Edit</button> 
                                  <a class="dropdown-item" href="?delete=<?php echo htmlspecialchars($kullanici['id']); ?>" onclick="return confirm('Bu kullanıcıyı silmek istediğinizden emin misiniz?');"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <!-- Modal for editing user -->
                          <div class="modal fade" id="editModal-<?php echo htmlspecialchars($kullanici['id']); ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="editModalLabel">Kullanıcıyı Düzenle</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form method="post" action="">
                                    <input type="hidden" name="userId" value="<?php echo htmlspecialchars($kullanici['id']); ?>">
                                    <div class="mb-4">
                                      <label for="adSoyad" class="form-label">Ad Soyad</label>
                                      <input class="form-control" type="text" name="adSoyad" id="adSoyad" value="<?php echo htmlspecialchars($kullanici['ad']); ?>" required />
                                    </div>
                                    <div class="mb-4">
                                      <label for="email" class="form-label">Email</label>
                                      <input class="form-control" type="email" name="email" id="email" value="<?php echo htmlspecialchars($kullanici['email']); ?>" required />
                                    </div>
                                    <div class="mb-4">
                                      <label for="tel" class="form-label">Telefon</label>
                                      <input class="form-control" type="tel" name="tel" id="tel" value="<?php echo htmlspecialchars($kullanici['telefon']); ?>" required />
                                    </div>
                                    <div class="mb-4">
                                      <label for="yas" class="form-label">Yaş</label>
                                      <input class="form-control" type="number" name="yas" id="yas" value="<?php echo htmlspecialchars($kullanici['yas']); ?>" required />
                                    </div>
                                    <button type="submit" name="update" class="btn btn-primary">Güncelle</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

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