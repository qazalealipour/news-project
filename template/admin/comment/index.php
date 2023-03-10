<?php
require_once BASE_PATH . "/template/admin/layouts/header.php";
?>
    <!-- Begin Row -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Border -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>کامنت ها</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" style="margin: auto">
                            <thead>
                            <tr style="text-align: center">
                                <th style="width: 10%">#</th>
                                <th>کامنت</th>
                                <th>عنوان پست</th>
                                <th>کاربر</th>
                                <th>وضعیت</th>
                                <th>تنظیمات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($comments as $key => $comment) { ?>
                                <tr style="text-align: center">
                                    <td><span class="text-primary"><?= ++$key; ?></span></td>
                                    <td><?= $comment->comment; ?></td>
                                    <td><?= $comment->title; ?></td>
                                    <td><?= $comment->userName; ?></td>
                                    <td>
                                        <span style="width:100px;"><span class="badge-text badge-text-small <?= $comment->status == 'approved' ? 'success' : 'danger'; ?>"><?= $comment->status == 'approved' ? 'تایید شده' : 'تایید نشده'; ?></span></span>
                                    </td>
                                    <td class="td-actions" style="width: 150px">
                                        <a role="button" href="<?= url('admin/comment/change-status/' . $comment->id); ?>" class="btn <?= $comment->status == 'approved' ? 'btn-danger' : 'btn-success'; ?> mr-1 mb-2">
                                            <?= $comment->status == 'approved' ? 'عدم تایید' : 'تایید'; ?>
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