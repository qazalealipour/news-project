<?php
require_once BASE_PATH . "/template/admin/layouts/header.php";
?>
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title"></h2>
                <div>
                    <div class="page-header-tools">
                        <a class="btn btn-gradient-01" href="<?= url('admin/menu/create'); ?>" role="button">ایجاد منو</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Begin Row -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Border -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>منوها</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="margin: auto">
                            <thead>
                            <tr style="text-align: center">
                                <th>#</th>
                                <th>نام</th>
                                <th>آدرس</th>
                                <th>والد</th>
                                <th>تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($menus as $key => $menu) { ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= ++$key; ?></span></td>
                                    <td><?= $menu->name; ?></td>
                                    <td><?= $menu->url; ?></td>
                                    <td><?= $menu->submenuName === null ? '---' : $menu->submenuName; ?></td>
                                    <td class="td-actions" style="width: 15%">
                                        <a href="<?= url('admin/menu/edit/' . $menu->id); ?>"><i class="la la-edit edit"></i></a>
                                        <a href="<?= url('admin/menu/destroy/' . $menu->id); ?>"><i class="la la-trash-o delete"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Border -->
        </div>
    </div>
    <!-- End Row -->

<?php
require_once BASE_PATH . "/template/admin/layouts/footer.php";
?>