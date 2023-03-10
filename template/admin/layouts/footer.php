                    </div>
                    <!-- End Container -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                </div>
                <!-- End Content -->
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Vendor Js -->
        <script src="<?= asset('public/admin/assets/vendors/js/base/jquery.min.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/vendors/js/base/core.min.js'); ?>"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="<?= asset('public/admin/assets/vendors/js/nicescroll/nicescroll.min.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/vendors/js/chart/chart.min.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/vendors/js/progress/circle-progress.min.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/vendors/js/calendar/moment.min.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/vendors/js/calendar/fullcalendar.min.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/vendors/js/calendar/locale/fa.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/vendors/js/owl-carousel/owl.carousel.min.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/vendors/js/app/app.min.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/jalalidatepicker/persian-date.min.js'); ?>"></script>
        <script src="<?= asset('public/admin/assets/jalalidatepicker/persian-datepicker.min.js'); ?>"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="<?= asset('public/admin/assets/js/dashboard/db-default.js'); ?>"></script>
        <!-- End Page Snippets -->
        <script>
            $(document).ready(function(){
                CKEDITOR.replace('body');
                CKEDITOR.replace('comment');

                $('#date').persianDatepicker({
                    observer: true,
                    format: 'YYYY/MM/DD HH:mm:ss',
                    toolbox: {
                        calendarSwitch:{
                                enabled: true
                        }
                    },
                    timePicker: {
                        enabled: true,
                    },
                    altField: '#published_at'
                });
            })
        </script>
    </body>
</html>
