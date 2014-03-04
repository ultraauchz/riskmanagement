/// <reference path="jquery-1.7.1.min.js" />
$(document).ready(function () {
    $('input.int').bind('keypress', function (e) {
        return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) ? false : true;
    });

    $('input.double').bind('keypress', function (e) {
        return (e.which != 8 && e.keyCode != 46 && e.which != 0 && (e.which < 48 || e.which > 57)) ? false : true;
    });
    
    $('.int').change(function () {
        if (isNaN(parseInt($(this).val()))) $(this).val(0);
    });

});
function double(e){
	 return (e.which != 8 && e.which != 46 && e.which != 45 && e.which != 0 && (e.which < 48 || e.which > 57)) ? false : true;
}
