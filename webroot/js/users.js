$(document).ready(function () {
    // alert(BASE_PATH);
    userID = 0;
    type = '';
    var editUser = $('#long'), editUserBody = $('#long .modal-body');
    editUser.on('show.bs.modal', function () {
        editUserBody.load();
        if(userID>0)
            editUserBody.load(BASE_PATH + 'users/edit/' + userID+type);
        else
            editUserBody.load(BASE_PATH + 'users/add'+type);
    });
    editUser.on('hidden.bs.modal', function () {
        editUserBody.html('<img src="' + BASE_PATH + 'img/components/ajax-modal-loading.gif" class="align-center" />');
    });
    $('.edit-user').on('click', function (e) {
        userID = $(this).data('user-id');
        type = '';
        if($(this).data('type')=='admin'){
            type = '?type=admin';
        }
        $('#long .modal-title').html('Edit User');
        if(type=='?type=admin'){
            $('#long .modal-title').html('Edit Admin');
        }
        editUser.modal();
        e.preventDefault();
    });

    $('.add-user').on('click', function (e) {
        userID = -1;
        type = '';
        if($(this).data('type')=='admin'){
            type = '?type=admin';
        }
        $('#long .modal-title').html('Add New Member');
        if(type=='?type=admin'){
            $('#long .modal-title').html('Add New Admin');
        }
        editUser.modal();
        e.preventDefault();
    });

    var sendMessage = $('#email'), sendMessageBody = $('#email .modal-body');
    sendMessage.on('show.bs.modal', function () {
        // alert(userID);
        // sendMessageBody.load();
        //    alert('<?=$this->Url->build(["controller" => "Users","action" => "view/"], true);?>/'+userID);
        sendMessageBody.load(BASE_PATH + 'users/message/' + userID);
    });
    sendMessage.on('hidden.bs.modal', function () {
        sendMessageBody.html('<img src="' + BASE_PATH + 'img/components/ajax-modal-loading.gif" class="align-center" />');
    });

    $('.send-message').on('click', function (e) {
        userID = $(this).data('user-id');
        sendMessage.modal();
        e.preventDefault();
    });


    // $('#tableID').DataTable();

    $('.user-status').on('click', function () {
        // alert($(this).data('uid') + '/' + $(this).data('status'));
        $_this = $(this);
        $.ajax({
            method: "GET",
            url: BASE_PATH + 'users/status/' + $(this).data('uid') + '/' + $(this).data('status'),
            dataType: "json"
        }).success(function (result) {
            if (result.status) {
                alert(result.message);
                // console.log($(this).parent().parent());
                // $_this.parents('tr').remove();
                location.reload();
                // $('#tableID').dataTable().fnDestroy();
                // $('#tableID').DataTable();
            } else {
                alert(result.message);
            }
            // alert('done');
        });
    });

    // $('.group-checkable').on('click', function () {
    //     $('input.checkboxes').not(this).prop('checked', this.checked);
    // });

    // $('input.checkboxes').on('click',function(){
    //     if($(this).prop('checked')==false)
    //         $('.group-checkable').prop('checked',false);
    // })

    $('#users_list').on('submit', function () {
        if ($('input[name="uids[]"]:checked').length < 1) {
            alert('Select at least 1 user to perform bulk action!');
            return false;
        }
    });

    // $('select[name=show]').on('change',function(){

    // });
});
function deleteUser(uid) {
    $.ajax({
        method: "DELETE",
        url: BASE_PATH + 'users/delete/' + uid,
        dataType: "json",
        data: "id=" + uid
    }).success(function (result) {
        if (result.status) {
            //alert(result.message);
            location.reload();
        } else {
            alert(result.message);
        }
    });
}