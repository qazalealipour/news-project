<?php
require_once BASE_PATH . "/template/admin/layouts/header.php";
?>
    <!-- Begin Row -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Border -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>کاربران</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="margin: auto">
                            <thead>
                            <tr style="text-align: center">
                                <th style="width: 10%">#</th>
                                <th>نام و نام خانوادگی</th>
                                <th>ایمیل</th>
                                <th>نوع دسترسی</th>
                                <th>وضعیت</th>
                                <th>تاریخ ثبت نام</th>
                                <th>تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $key => $user) { ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= ++$key; ?></span></td>
                                    <td><?= $user->username; ?></td>
                                    <td><?= $user->email; ?></td>
                                    <td>
                                        <span style="width:100px;"><span class="badge-text badge-text-small <?= $user->permission == 'admin' ? 'success' : 'info'; ?>"><?= $user->permission == 'admin' ? 'ادمین' : 'کاربر'; ?></span></span>
                                    </td>
                                    <td>
                                        <span style="width:100px;"><span class="badge-text badge-text-small <?= $user->is_active == 0 ? 'danger' : 'info'; ?>"><?= $user->is_active == 0 ? 'غیرفعال' : 'فعال'; ?></span></span>
                                    </td>
                                    <td><?= jalaliDate($user->created_at); ?></td>
                                    <td class="td-actions" style="width: 150px">
                                        <a href="<?= url('admin/user/destroy/' . $user->id); ?>"><i class="la la-trash-o delete"></i></a>
                                        <hr>
                                        <a role="button" href="<?= url('admin/user/permission/' . $user->id); ?>" class="btn <?= $user->permission == 'user' ? 'btn-success' : 'btn-info'; ?> mr-1 mb-2">
                                            <?= $user->permission == 'user' ? 'تبدیل به ادمین' : 'تبدیل به کاربر'; ?>
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