$(document).on('click','#btn-add',function(e) {
    $('#error-name').removeClass("d-block").addClass("d-none");
    $('#error-year').removeClass("d-block").addClass("d-none");
    let name = $('#name').val().trim();
    let year = $('#year').val();
    let validInput = true;
    if (name.length < 5 || name.length > 40 ) {
        $('#error-name').removeClass("d-none").addClass("d-block");
        validInput = false;
    }
    if ( year < 1990 || year > 2015 ) {
        $('#error-year').removeClass("d-none").addClass("d-block");
        validInput = false;
    }
    if (validInput) {
        let data = $("#car_form").serialize();
        $.ajax({
            data: data,
            type: "post",
            url: "backend/function.php",
            success: function(result){
                    let dataResult = JSON.parse(result);
                    if(dataResult.statusCode==200){
                        $('#addCarModal').modal('hide');
                        alert('Thêm mới thành công!'); 
                        location.reload();						
                    }
                    else if(dataResult.statusCode==201){
                        alert(dataResult);
                    }
            }
        });
    }
});
$(document).on('click','.update',function(e) {
    let id = $(this).attr("data-id");
    let name = $(this).attr("data-name");
    let year = $(this).attr("data-year");
    $('#id_u').val(id);
    $('#name_u').val(name);
    $('#year_u').val(year);
});

$(document).on('click','#update',function(e) {
    $('#error-name-u').removeClass("d-block").addClass("d-none");
    $('#error-year-u').removeClass("d-block").addClass("d-none");
    let name = $('#name_u').val().trim();
    let year = $('#year_u').val();
    let validInput = true;
    if (name.length < 5 || name.length > 40 ) {
        $('#error-name-u').removeClass("d-none").addClass("d-block");
        validInput = false;
    }
    if ( year < 1990 || year > 2015 ) {
        $('#error-year-u').removeClass("d-none").addClass("d-block");
        validInput = false;
    }
    if (validInput) {
        let data = $("#update_form").serialize();

        $.ajax({
            data: data,
            type: "post",
            url: "backend/function.php",
            success: function(result){
                    let dataResult = JSON.parse(result);
                    if(dataResult.statusCode==200){
                        $('#editCarModal').modal('hide');
                        alert('Cập nhật thành công!'); 
                        location.reload();						
                    }
                    else if(dataResult.statusCode==201){
                        alert(dataResult);
                    }
            }
        });
    }
    
});
$(document).on("click", ".delete", function() { 
    let id=$(this).attr("data-id");
    $('#id_d').val(id);
    
});
$(document).on("click", "#delete", function() { 
    $.ajax({
        url: "backend/function.php",
        type: "POST",
        cache: false,
        data:{
            type:3,
            id: $("#id_d").val()
        },
        success: function(dataResult){
                $('#deleteCarModal').modal('hide');
                $("#"+dataResult).remove();
        
        }
    });
});
$(document).on("click", "#delete_multiple", function() {
    let user = [];
    $(".user_checkbox:checked").each(function() {
        user.push($(this).data('user-id'));
    });
    if(user.length <= 0) {
        alert("Bạn chưa chọn dòng nào."); 
    } 
    else { 
        WRN_PROFILE_DELETE = "Bạn có chắc chắn muốn xóa "+(user.length>1?"những ":" ")+"dòng này?";
        let checked = confirm(WRN_PROFILE_DELETE);
        if(checked == true) {
            let selected_values = user.join(",");
            console.log(selected_values);
            $.ajax({
                type: "POST",
                url: "backend/function.php",
                cache:false,
                data:{
                    type: 4,						
                    id : selected_values
                },
                success: function(response) {
                    let ids = response.split(",");
                    for (let i=0; i < ids.length; i++ ) {	
                        $("#"+ids[i]).remove(); 
                    }	
                } 
            }); 
        }  
    } 
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    let checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;                        
            });
        } else{
            checkbox.each(function(){
                this.checked = false;                        
            });
        } 
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });
});