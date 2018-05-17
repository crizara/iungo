$( document ).ready(function() {
    $('.search input').keyup(function(){
        $('.people-list .list li').each(function() {
        	if ($(this).find('.name').text().toUpperCase().includes($('.search input').val().toUpperCase()) == false) {
        		$(this).css('display', 'none');
        	} else {
        		$(this).css('display', 'block');
        	}
        });
    });
});