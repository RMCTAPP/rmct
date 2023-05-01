<script src="assets/js/lib/bootstrap.bundle.min.js"></script>
<script src="assets/js/lib/jquery/jquery.min.js"></script>
<script src="assets/js/lib/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/lib/jquery-validation/additional-methods.min.js"></script>
<script src="assets/js/lib/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="assets/plugins/splide/splide.min.js"></script>
<script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
<script src="assets/plugins/calendar/js/gijgo.min.js"></script>
<script src="assets/js/base.js"></script>

<script type="text/javascript">
	$(function(){ 
        $('.input-mask').inputmask();
		var ts = $("input.ts").TouchSpin({
	        min: 0,
	        step: 1,
		});

		$('a.logout').on('click', function() {
            appJsInterface.destroySession();
        });

        // $('a.try-again').on('click', function() {
        //     appJsInterface.reloadPage();
        // });
	});
</script>