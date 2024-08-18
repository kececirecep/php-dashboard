<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- SVG Logo -->
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">XL</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Kullanıcılar</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php if ($currentPage == 'kullanici-ekle.php') echo 'active'; ?>">
                    <a href="kullanici-ekle.php" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Kullanıcı Ekle</div>
                    </a>
                </li>
                <li class="menu-item <?php if ($currentPage == 'tum-kullanicilar.php') echo 'active'; ?>">
                    <a href="tum-kullanicilar.php" class="menu-link">
                        <div class="text-truncate" data-i18n="Analytics">Tüm Kullanıcılar</div>
                    </a>
                </li>  
            </ul>
        </li>
    </ul>
</aside>
