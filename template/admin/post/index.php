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
                        <a class="btn btn-gradient-01" href="<?= url('admin/post/create'); ?>" role="button">ایجاد پست</a>
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
                    <h4>پست ها</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="margin: auto">
                            <thead>
                            <tr style="text-align: center">
                                <th style="width: 10%">#</th>
                                <th style="width: 20%">عنوان</th>
                                <th style="width: 10%">تعداد بازدیدها</th>
                                <th style="width: 20%">وضعیت</th>
                                <th style="width: 10%">دسته بندی</th>
                                <th style="width: 15%">نویسنده</th>
                                <th style="width: 40%">تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($posts as $key => $post) { ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= ++$key; ?></span></td>
                                    <td><?= $post->title; ?></td>
                                    <td><?= $post->view; ?></td>
                                    <td>
                                        <?= $post->breaking_news == 1 ? '<span style="width:100px;"><span class="badge-text badge-text-small info">خبر فوری</span></span>' : ''; ?>
                                        <hr>
                                        <?= $post->selected ==1 ? '<span style="width:100px;"><span class="badge-text badge-text-small success">منتخب سردبیر</span></span>' : ''; ?>
                                    </td>
                                    <td><?= $post->categoryName; ?></td>
                                    <td><?= $post->userName; ?></td>
                                    <td class="td-actions" style="width: 150px">
                                        <a href="<?= url('admin/post/show/' . $post->id); ?>"><i class="la la-check-square delete" id="showInfo"></i></a>
                                        <a href="<?= url('admin/post/edit/' . $post->id); ?>"><i class="la la-edit edit"></i></a>
                                        <a href="<?= url('admin/post/destroy/' . $post->id); ?>"><i class="la la-trash-o delete"></i></a>
                                        <hr>
                                        <a role="button" href="<?= url('admin/post/breaking-news/' . $post->id); ?>" class="btn btn-info mr-1 mb-2">
                                            <?= $post->breaking_news == 0 ? 'اضافه کردن به خبرهای فوری' : 'حذف کردن از خبرهای فوری'; ?>
                                        </a>
                                        <a role="button" href="<?= url('admin/post/selected/' . $post->id); ?>" class="btn btn-success mr-1 mb-2">
                                            <?= $post->selected == 0 ? 'اضافه کردن به خبرهای منتخب سردبیر' : 'حذف کردن از خبرهای منتخب سردبیر'; ?>
                                        </a>
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