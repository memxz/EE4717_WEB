

$('form#myform').submit(function(e){
  e.preventDefault();
  $.ajax({
    url: "php/processcoffeeinfo.php",
    type: "POST",
    data: $('form#myform').serialize(),
    success: function(data){
      location.reload();
      // $('div#myoutput').load("music.html #nav li")
    },
    error: function	(jXHR, textStatus, errorThrown){},
  });
});
var inputsel = "input[type=text]";
$(inputsel).prop('disabled', true);
$('input[type="checkbox"]').click(function(){
    if($(this).prop("checked") == true){
        var tablerow = $(this).closest("tr");
        tablerow.find(inputsel).prop('disabled', false);

    }
    else if($(this).prop("checked") == false){
        $(inputsel).prop('disabled', true);
    }
});