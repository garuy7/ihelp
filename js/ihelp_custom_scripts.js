function hide_boxes(){
$('.msg_box').hide();
$('.chat_body').hide();
};

$(document).on("click",".user",function(){
    $('.msg_footer').show();
    $('.msg_wrap').show();
    $('.msg_box').show();
    $('.recipient').attr('id',this.id);
    $('.recipient').html(this);
});

$(document).on("click",".close",function(){

$('.close').click(function(){
$('.msg_box').hide();
});

});

$(document).on("click",".msg_head",function(){

		$('.msg_wrap').slideToggle('slow');
		$('.msg_footer').slideToggle('slow');
})

$(document).ready(function(){
	hide_boxes();
	$('.chat_head').click(function(){
		$('.chat_body').slideToggle('slow');
	});

	$('textarea').keypress(
    function(e){
        if (e.keyCode == 13) {
            e.preventDefault();
            var msg = $(this).val();
			$(this).val('');
			if(msg!=''){
                var receiver=$('.recipient').attr('id');
				sendMessage(msg,receiver);
			}
			$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
        }
    });
});


  function getMessages(){

      var receiver=$('.recipient').attr('id');
      var datastring='receiver='+receiver;

	  $.ajax({
	  type: 'post',
	  url: 'ihelp_chat_selectMessages.php',
      data:datastring,
	  async: true,
	  cache: false,
	  timeout:50000,

	  success: function (response) {
	   // We get the element having id of display_info and put the response inside it
	   $( '.msg_body' ).html(response);
	   setTimeout(
		getMessages,
		1000)
	  }

	  });
  }


function getUsers(){

	 $.ajax({
	  type: 'get',
	  url: 'ihelp_chat_selectUsers.php',

	  async: true,
	  cache: false,
	  timeout:50000,

	  success: function (response) {
	   // We get the element having id of display_info and put the response inside it
	   $( '.chat_body' ).html(response);
	   setTimeout(
		getUsers,
		1000)
	  }

	  });
}
function sendMessage(){

    var message=arguments[0];
    var receiver=arguments[1]
	var dataString = 'message='+message+'&receiver='+receiver;
		$.ajax({
		  type:'POST',
		  url:"ihelp_chat_sendMessages.php",
		  data:dataString,
		  cache:false,
		  success:function(html){

		  }
	  });

}
