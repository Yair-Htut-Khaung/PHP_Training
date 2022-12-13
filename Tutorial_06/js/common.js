$(document).ready(function () {
    
    //used cookie to remain folder name 
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    $('.delete').click(function () {

        $(this).parents('td').remove();


    });
    $(".submit").click(function () {
        setCookie("cookie-fold", $('#folder').val(), 1);
    });

});
