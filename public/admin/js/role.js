function check_all_children(element) {

    $(element).parents(".card").find(".children_check_box").
    prop("checked", $(element).prop("checked"));

}


function check_all_input(element) {


    $(element).parents().find("#box-module input").
    prop("checked", $(element).prop("checked"));

}