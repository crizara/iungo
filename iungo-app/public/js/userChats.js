$( document ).ready(function() {

	var totalmissatges;

	$('#people-list ul li').click(function() {
		totalmissatges = 99999999999999999;
		carregarchat($(this).attr('data-id'), false);
		totalmissatges = $('.chat-history ul li.personachat').length;
		$('.chat-history').animate({ scrollTop: $('.chat-history').prop("scrollHeight")}, 1500);         
		setInterval(function(){
			carregarchat($('#form1').attr('data-id-user'), true);
			totalmissatges = $('.chat-history ul li.personachat').length;
		}, 3000);
	});

	$('.search input').keyup(function(){
		$('.people-list .list li').each(function() {
			if ($(this).find('.name').text().toUpperCase().includes($('.search input').val().toUpperCase()) == false) {
				$(this).css('display', 'none');
			} else {
				$(this).css('display', 'block');
			}
		});
	});

	function carregarchat(idReceptor, async) {

		$('#form1').attr("data-id-user", idReceptor);

		$.ajax({
			url: "chatUser/" + idReceptor,
			type:'GET',
			async: async,
			success: function(data){
				$('.chat-history ul').html(data);
			}
		});

		if (totalmissatges < $('.chat-history ul li.personachat').length) {
			if ($('.chat-history').scrollTop() > $('.chat-history').prop("scrollHeight") - 1000) {
				$('.chat-history').animate({ scrollTop: $('.chat-history').prop("scrollHeight")}, 2000);
			}

			var ultimmissatge = $('.chat-history ul li').last().find('.message').html();
			var ultimapersona = $('.chat-history ul li').last().find('.persona').html();

			if (!("Notification" in window)) {
				alert("This browser does not support desktop notification");
			}

			else if (Notification.permission === "granted") {
				var notification = new Notification('Nuevo mensaje de ' + ultimapersona, {
					icon: 'images/fondoiungo.jpg',
					body: ultimmissatge,
				});

				notification.onclick = function () {
					window.open("chat");      
				};
			}
			else if (Notification.permission !== "denied") {
				Notification.requestPermission(function (permission) {
					if (permission === "granted") {
						var notification = new Notification('Nuevo mensaje', {
							icon: 'images/fondoiungo.jpg',
							body: ultimmissatge,
						});

						notification.onclick = function () {
							window.open("chat");      
						};
					}
				});
			}
		}       	
	}


	$('#message-to-send').keypress(function(e) {
		if(e.which == 13) {
			e.preventDefault();
			enviartext();
			$('#message-to-send').val("");
		}
	});

	function enviartext() {		
		idUser = $('#form1').attr('data-id-user');
		mensaje = $('#message-to-send').val();
		$.ajax({
			url:"sendChat",
			type: "GET",
			dataType: "json",
			data: {'idReceptor' : idUser, 'mensaje' : mensaje},
			async: false,
			success: function(data) {
				carregarchat($('#form1').attr('data-id-user'), false);                
			}
		});
		$('.chat-history').animate({ scrollTop: $('.chat-history').prop("scrollHeight")}, 2000); 
	}

	$('#form1 button').click(function (event) {
		event.preventDefault();
		enviartext();
		$('#message-to-send').val("");
	});
});