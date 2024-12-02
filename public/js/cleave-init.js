var CleaveInits = {};
$('.phone-number-mask').each(function(){
    CleaveInits[$(this).attr('id')] = new Cleave($(this), {
        phone: true,
        phoneRegionCode: 'CA'
    });
});
