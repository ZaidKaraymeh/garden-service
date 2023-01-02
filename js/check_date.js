let formoh = document.getElementById("reserve_btn");
$( document ).ready(function() {
    $("#floatingSelect").attr('disabled', true);
    $("#reserve_btn").attr('disabled', true);
    addOption("No","Choose Date");
});
function check_dateo(){
    let dateo = $('#floatingInputGroup1').val();
    let srv_id = $('#srv_id').val();
    if(dateo !=""){
        $.ajax({
            url: "PHP/booking_check.php",
            type: "POST",
            data: {
                'checkDate' : true,
                'datoO': dateo,
                'srv_id':srv_id
            },
            success: function (response) {
                if(response.length != 0) {
                    if(response === "All" || response === "Valid"){
                        $("#floatingSelect").html("");
                        $("#floatingSelect").removeAttr('disabled');
                        $("#reserve_btn").removeAttr('disabled');
                        addOption("day","Day");
                        addOption("evening","Evening");
                    } else if(response === "Eve Available"){
                        $("#floatingSelect").html("");
                        $("#floatingSelect").removeAttr('disabled');
                        $("#reserve_btn").removeAttr('disabled');
                        addOption("evening","Evening");
                    } else if(response === "Day Available"){
                        $("#floatingSelect").html("");
                        $("#floatingSelect").removeAttr('disabled');
                        $("#reserve_btn").removeAttr('disabled');
                        addOption("day","Day");
                    } else if(response === "Both times of service have been reserved for this day."){
                        $("#floatingSelect").html("");
                        $("#floatingSelect").attr('disabled', true);
                        $("#reserve_btn").attr('disabled', true);
                        addOption("No","Both times of service have been reserved for this day.");
                    } else if (response === "Not Valid"){
                        $("#floatingSelect").html("");
                        $("#floatingSelect").attr('disabled', true);
                        $("#reserve_btn").attr('disabled', true);
                        addOption("No","Select an appropriate time.");
                    }
                }
            }
        });
    }
}
function addOption(value,text){
    let value_v = value;
    let text_t = text;
    $("#floatingSelect").append(`<option value="${value_v}">${text_t}</option>`);
}