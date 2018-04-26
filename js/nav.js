
$(document).ready(function(){
$('.box li').click(function() {
    $(this).siblings('li').removeClass('active');
    $(this).addClass('active');
});
});
