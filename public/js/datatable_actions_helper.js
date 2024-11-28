let action = $('.datatables_action');
let url = window.location.href.split('?')[0];
$(action).each(function (){
    $(action).find('a').each(function() {
        if($(this).attr('href') === url){
            $(this).addClass("d-none")
        }
    });
});
