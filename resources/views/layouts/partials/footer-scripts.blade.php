		
		<!--end::Demo Panel-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#8950FC", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#EEE5FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/widgets.js')}}"></script>

	
		<!--end::Page Scripts-->

<script>
    $(document).on('click', '.edithsn', function () {
        var id = $(this).attr('data-id'); // 🔥 safest
        
    if(id){
      $.ajax({
					type: "POST",
                    url: "{{route('hsnfetch')}}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
					console.log(res);
          var obj=JSON.parse(res)
		 
          $('#hsncode').val(obj.hsncode);
		  $('#tax').val(obj.gst); 
          $('#igst').val(obj.igst);
          $('#cgst').val(obj.cgst);
		  $('#keyid').val(id);
					},
					});	
		}
        $('#editmodal').modal('show');
    });
</script>

<script>
    $(document).on('click', '.editcategory', function () {
        var id = $(this).attr('data-id'); // 🔥 safest
        
    if(id){
      $.ajax({
					type: "POST",
                    url: "{{route('categoryfetch')}}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
					console.log(res);
          var obj=JSON.parse(res)
		 
          $('#category_name').val(obj.category_name);
		  $('#cat_keyid').val(id);
					},
					});	
		}
        $('#edit_cat_modal').modal('show');
    });
</script>


<script>
    $(document).on('click', '.editmaterials', function () {
        var id = $(this).attr('data-id'); // 🔥 safest


	
        
    if(id){
      $.ajax({
					type: "POST",
                    url: "{{route('materialfetch')}}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
					// console.log(res);
          var obj=JSON.parse(res)
		 
          $('#materialname').val(obj.name);
		  $('#mrp').val(obj.mrp);
		  $('#keyid').val(id);
					},
					});	
		}
        $('#edit_cat_modal').modal('show');
    });
</script>



<script>
    $(document).on('click', '.editmenus', function () {
        var id = $(this).attr('data-id'); // 🔥 safest
        
    if(id){
      $.ajax({
					type: "POST",
                    url: "{{route('menufetch')}}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
					console.log(res);
          var obj=JSON.parse(res)
		 
          $('#create_menu').val(obj.create_menu);
		  $('#shop_id').val(obj.shop_id);
		  $('#item_id').val(obj.item_id);
		  $('#menu_keyid').val(id);
					},
					});	
		}
        $('#edit_menu_modal').modal('show');
    });
</script>




<script>
    $(document).on('click', '.editstaff', function () {
        var id = $(this).attr('data-id'); // 🔥 safest
        
    if(id){
      $.ajax({
					type: "POST",
                    url: "{{route('stafffetch')}}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
					console.log(res);
          var obj=JSON.parse(res)
		 
          $('#staff_name').val(obj.staff_name);
		  $('#phone_number').val(obj.phone_number);
		  $('#email').val(obj.email);
		  $('#password').val(obj.password);
		  $('#staff_id').val(obj.staff_id);
		  $('#staff_image_preview').attr('src', obj.staff_image_url); 

		  
		  $('#staff_keyid').val(id);
					},
					});	
		}
        $('#edit_staff_modal').modal('show');
    });
</script>

<script>
    $(document).on('click', '.edititem', function () {
        var id = $(this).attr('data-id'); // 🔥 safest
        
    if(id){
      $.ajax({
					type: "POST",
                    url: "{{route('itemfetch')}}",
					data: {  "_token": "{{ csrf_token() }}",
					id: id },
					success: function (res) {
					console.log(res);
          var obj=JSON.parse(res)
		 
          $('#item_name').val(obj.item_name);
		  $('#image_preview').attr('src', obj.image_url); 
		  $('#normal_price').val(obj.normal_price);
		  $('#offer_price').val(obj.offer_price);
		  $('#category_id').val(obj.category_id);

		  
		  $('#item_keyid').val(id);
					},
					});	
		}
        $('#edit_item_modal').modal('show');
    });
</script>


	<script>
$(document).ready(function () {

    // Add new row
    $("#addRow").click(function () {

        var row = `
        <tr>
            <td><input type="text" class="form-control" name="material[]"></td>

            <td><input type="number" class="form-control qty" name="qty[]"></td>

            <td><input type="number" class="form-control price" name="price[]"></td>

            <td><input type="number" class="form-control total" name="total[]" readonly></td>

            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm removeRow">-</button>
            </td>
        </tr>`;

        $("#materialTable tbody").append(row);
    });

    // Remove row
    $(document).on("click", ".removeRow", function () {

        if ($("#materialTable tbody tr").length > 1) {
            $(this).closest("tr").remove();
        } else {
            alert("At least one row is required.");
        }

    });


});
</script>

