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
                        <a class="btn btn-gradient-01" href="<?= url('admin/banner/create'); ?>" role="button">ایجاد بنر</a>
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
                    <h4>بنرها</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="margin: auto">
                            <thead>
                            <tr style="text-align: center">
                                <th style="width: 10%">#</th>
                                <th style="width: 40%">بنر</th>
                                <th style="width: 30%">آدرس</th>
                                <th style="width: 20%">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($banners as $key => $banner) { ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= ++$key; ?></span></td>
                                    <td>
                                        <img src="<?= asset($banner->image) ?>" alt="" style="width: 120px; height: 80px">
                                    </td>
                                    <td><?= $banner->url; ?></td>
                                    <td class="td-actions" style="width: 150px">
                                        <a href="<?= url('admin/banner/edit/' . $banner->id); ?>"><i class="la la-edit edit"></i></a>
                                        <a href="<?= url('admin/banner/destroy/' . $banner->id); ?>"><i class="la la-trash-o delete"></i></a>
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