$('.sl a').click(function(e) {
    e.preventDefault();
    const originalImage = $(this).atr('href');
    $('modal-body').html('<img src="${originalImage}">');
    $('#examleModal').modal('show');
});