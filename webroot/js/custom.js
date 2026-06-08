
jQuery.validator.addMethod("validEmail", function (value, element) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,23})?$/;
    return emailReg.test(value);
});
jQuery(document).ready(function () {
    //Custom jQuery Validator
    
    jQuery('body').on('keypress', 'input', function (e) {
        // alert(e.which);
        if (e.which == 13) {
            jQuery(this).parents('form').submit();
            // return false;    //<---- Add this line
        }
    });
    var $q = $('input.table-search').val();
    var delayTimer;
    //auto submit search fields
    jQuery('body').on('keyup', 'input.table-search', function (e) {
        $this = $(this);
        clearTimeout(delayTimer);
        delayTimer = setTimeout(function() {
            if ($q != $this.val()) {
                $q = $this.val();
                var uri = new URI(window.location.href);
                $query = uri.search(true);
                $query.search = $q;
                $query.page = 1; //reset page to 1 so that all results are shown
                var $newURI = uri.search($query);
                $.ajax({
                    method: "GET",
                    url: $newURI,
                }).success(function (result) {
                    $('.page-content').html(result);
                    $('input.table-search').focus();
                    $('input.table-search').val('');
                    $('input.table-search').val($q);
                    $("[data-toggle=confirmation]").confirmation({
                        btnOkClass: "btn btn-sm btn-success", 
                        btnCancelClass: "btn btn-sm btn-danger" 
                    });
                });
            }
        }, 300); 
        
    });

    $('.dataTable').on('init.dt', function () {
        $('select[name=tableID_length]').addClass('form-control input-sm input-xsm input-inline');
        $('.dataTables_filter input').addClass('form-control input-sm input-inline');
        
        // console.log('Table initialisation complete: ' + new Date().getTime());
        $(this).parent().next('.datatable-form-actions').insertAfter('table.dataTable');
        if(!$(this).hasClass('searchable')){
            $(this).parent().find('.dataTables_filter').hide();
        }
    })
        .dataTable({
            bLengthChange: false,
            "ordering": false
        });
    // var table = $('#ui_table').dataTable();
    $('.group-checkable-datatable').on('click', function () {
        // var table = $(this).parents('.dataTable').DataTable();
        // table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
        //     var $tr = this.nodes().to$()
        //     $tr.find('#ui_table .checkboxes').prop('checked', true)
        // }) 
        // var p = table.rows({ page: 'current' }).nodes().to$();

        $selector = $(this).data('set');
        // console.log(p);
        // p.find('.checkboxes').prop('checked', this.checked)
        // alert($selector);
        $($selector).not(this).prop('checked', this.checked);
        $($selector).prop('checked', this.checked);
    });

    $('body').on('click','.group-checkable', function () {
        $selector = $(this).data('set');
        $($selector).not(this).prop('checked', this.checked);
    });
    $('body').on('click','input.checkboxes', function () {
        if ($(this).prop('checked') == false)
            $('.group-checkable').prop('checked', false);
    });

    $(document).on('submit', '#bulk_action, .bulk-action', function () {
        // alert(1);
        if ($('input[name="selected_items[]"]:checked', $(this)).length < 1) {
            alert('Select at least 1 Item to perform bulk action!');
            return false;
        }
        if ($(this).find('select[name=group_action]').val() == '') {
            alert('Please select a bulk Action');
            return false;
        }
    });

    $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd"});


    //EDIT ITEMS MODAL
    editID = 0;
    url = '';
    // var edit = $('#edit'),
    //     editBody = $('#edit .modal-body');
    // $('#edit').on('show.bs.modal', function () {
    //     // editBody.load();
    //     $('#edit .modal-body').load(BASE_PATH + url + editID);
    // });
    // $('#edit').on('hidden.bs.modal', function () {
    //     $('#edit .modal-body').html('<img src="' + BASE_PATH + 'img/components/ajax-modal-loading.gif" class="align-center" />');
    // });
    $('body').on('click','.edit-item', function (e) {
        editID = $(this).data('edit-id');
        url = $(this).data('edit-url');
        $('#edit').modal();
        $('#edit .modal-body').html('<img src="' + BASE_PATH + 'img/components/ajax-modal-loading.gif" class="align-center" />');
        $('#edit .modal-body').load(BASE_PATH + url + editID);
        e.preventDefault();
    });

    //ADD ITEM MODAL
    // var add = $('#add','body'),
    //     addBody = $('#add .modal-body');
    // $('#add').on('show.bs.modal', function () {
    //     // addBody.load();
    //     $('#add .modal-body').load(BASE_PATH + url);
    // });
    // $('#add').on('hidden.bs.modal', function () {
    //     $('#add .modal-body').html('<img src="' + BASE_PATH + 'img/components/ajax-modal-loading.gif" class="align-center" />');
    // });
    $('body').on('click','.add-item', function (e) {
        editID = -1;
        url = $(this).data('add-url');
        $('#add').modal();
        $('#add .modal-body').html('<img src="' + BASE_PATH + 'img/components/ajax-modal-loading.gif" class="align-center" />');
        $('#add .modal-body').load(BASE_PATH + url);
        e.preventDefault();
    });
    // $('#add').on('hidden.bs.modal', function () {
    //     $('.modal-backdrop').remove();
    // // do something…
    // })
    $('.editor').summernote({
        minHeight: 130,
    });


});

function deleteUser(id) {
    $.ajax({
        method: "DELETE",
        url: BASE_PATH + "users/delete/" + id,
        // dataType: "json"
        // data: "id=" + id
    }).success(function (result) {
        location.reload();
        var data = {};
         try {
            data = JSON.parse(result);
        } catch (e) {
            data = {};
        }
        if (data.status) {
//           alert(data.status);
//             alert(result.message);
//             location.reload();
            $('#row_' + id).remove();
        } else if(data.message){
            alert(data.message);
        } else{
            // alert(4)
            $("#edit .modal-body").html(result);
        }
    });
}




function deleteItem(url, id) {
    $.ajax({
        method: "DELETE",
        url: BASE_PATH + url + id,
        // dataType: "json"
        // data: "id=" + id
    }).success(function (result) {
        location.reload();
        var data = {};
         try {
            data = JSON.parse(result);
        } catch (e) {
            data = {};
        }
        if (data.status) {
//           alert(data.status);
//             alert(result.message);
//             location.reload();
            $('#row_' + id).remove();
        } else if(data.message){
            alert(data.message);
        } else{
            // alert(4)
            $("#edit .modal-body").html(result);
        }
    });
}

function unarchiveItem(url, id) {
    $.ajax({
        method: "PUT",
        url: BASE_PATH + url + id,
        // dataType: "json"
        data: "status=A"
    }).success(function (result) {
        var data = {};
         try {
            data = JSON.parse(result);
        } catch (e) {
            data = {};
        }
        if (data.status) {
            // alert(data.status);
            // alert(result.message);
            // location.reload();
            $('#row_' + id).remove();
        } else if(data.message){
            alert(data.message);
        } else{
            location.reload();
            // alert(4)
            $("#edit .modal-body").html(result);
        }
    });
    // CKEDITOR.replace( '.ckeditor', {
    //     height: 260,
    //     width: 700,
    // });
}

function validateForm(form_selector,rules){
    var form2 = $(form_selector);
              var error2 = $('.alert-danger', form2);
              var success2 = $('.alert-success', form2);
              var handleValidation2 = function() {
                // for more info visit the official plugin documentation:
                // http://docs.jquery.com/Plugins/Validation
                form2.validate({
                  errorElement: 'span', //default input error message container
                  errorClass: 'help-block help-block-error', // default input error message class
                  focusInvalid: false, // do not focus the last invalid input
                  ignore: "", // validate all fields including form hidden input
                  rules: rules,
                  invalidHandler: function(event, validator) { //display error alert on form submit
                    success2.hide();
                    error2.show();
                    App.scrollTo(error2, -100);
                  },
                  errorPlacement: function(error, element) { // render error placement for each input type
                    var icon = $(element).parents('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");
                    icon.attr("data-original-title", error.text()).tooltip({
                      'container': 'body'
                    });
                  },
                  highlight: function(element) { // hightlight error inputs
                    $(element)
                      .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
                  },
                  unhighlight: function(element) { // revert the change done by hightlight
                  },
                  success: function(label, element) {
                    var icon = $(element).parents('.input-icon').children('i');
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                    icon.removeClass("fa-warning").addClass("fa-check");
                  },
                  submitHandler: function(form) {
                    //  success2.show();
                    //  error2.hide();
                    //  call submit function
                    //  form2[0].submit(); // submit the form
                    //  submitform();
                  }
                });
              }
              handleValidation2();
}
