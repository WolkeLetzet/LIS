
$(document).ready(function() {
    $("div input#selectAll").click(function(e) {
        if ($(this).is(":checked")) {
            $(".ck:checkbox:not(:checked)").attr("checked", "checked");
        } else {
            $(".ck:checkbox:checked").removeAttr("checked");
        }

    });

});