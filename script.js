var num = 10;
$(function() {
   $("#getmore").click(function(){
	$.ajax({
		url: "loadmore.php",
                type: "GET",
                data: {"num": num},
                cache: false,
		success: function (res) {
                                  if(res == 0){
                                     $('#getmore').hide();
                                     $('#message').html('<h1>Записей больше нет!</h1>');
                                  } else {
			             $('#container').append(res);
                                     num = num + 10;
                                  }
		},
	});
});
});