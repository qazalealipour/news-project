<?php
require_once BASE_PATH . "/template/admin/layouts/header.php";
?>
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>ویرایش پست</h4>
                </div>
                <div class="widget-body">
                    <form action="<?= url('admin/post/update/' . $post->id); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عنوان</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="title" value="<?= $post->title; ?>" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">عکس</label>
                            <div class="col-lg-5">
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">خلاصه</label>
                            <div class="col-lg-5">
                                <textarea class="form-control" name="summary" rows="6" required><?= $post->summary; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">بدنه پست</label>
                            <div class="col-lg-5">
                                <textarea class="form-control" name="body" id="body" rows="16" required><?= $post->body; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">تاریخ انتشار</label>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control d-none" id="published_at" name="published_at">
                                            <input type="text" class="form-control" id="date" value="<?= $post->published_at; ?>" required>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">وضعیت</label>
                            <div class="col-lg-1">
                                <div class="custom-control custom-radio styled-radio mb-3">
                                    <input class="custom-control-input" type="radio" name="status" id="opt-01" value="enable" required <?= $post->status == 'enable' ? 'checked' : ''; ?>>
                                    <label class="custom-control-descfeedback" for="opt-01">enable</label>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-1">
                                <div class="custom-control custom-radio styled-radio mb-3">
                                    <input class="custom-control-input" type="radio" name="status" id="opt-02" value="disable" required <?= $post->status == 'disable' ? 'checked' : ''; ?>>
                                    <label class="custom-control-descfeedback" for="opt-02">disable</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">دسته بندی</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <select name="cat_id" class="custom-select form-control" required>
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?= $category->id; ?>" <?= $post->cat_id == $category->id ? 'selected' : ''; ?>><?= $category->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">ذخیره</button>
                            <button class="btn btn-shadow" type="reset">بازگردانی</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
<?php
require_once BASE_PATH . "/template/admin/layouts/footer.php";
?>