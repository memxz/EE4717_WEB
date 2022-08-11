



(function($){
	$(document).ready(function(){
		selectTab();
		addToCartOnClick();
		// generateClothingItems();

		// $('form.addtomycart').submit(function(e){
		//   e.preventDefault();
		//   $.ajax({
		//     url: "processaddtocart.php",
		//     type: "POST",
		//     data: $('form#myform').serialize(),
		//     success: function(data){
		      
		//       // $('div#myoutput').load("music.html #nav li")
		//     },
		//     error: function	(jXHR, textStatus, errorThrown){},
		//   });
		// });
    });

	function selectTab(){
		var tab=$("ul.tab>li");
		tab.addClass("tablinks");
		$("div.firsttab").show();
		tab.click(function(e){
			let tabName = $(this).attr('tab');
			let tabcontent = $(".tabcontent");
			let tablinks = $(".tablinks");

			tabcontent.hide();
		    tablinks.removeClass("active");
		    $("div#"+tabName).show();
			$(this).addClass("active");
		});
	}

	function addToCartOnClick(){
		var modal = $('.modal');
      var modaltext = $('p.modal-text');
      var closebtn = $('span.close');
      var totalprice = 0;
      
      var item=$('div.item');


      $('input.addtocart').click(function(){
        var title = $(this).parent().siblings(".item-title").text();
        // var title = $(this).parent().prev().prev().prev().text();
        // var title = $(this).prev().prev().prev().text();
        var price = $(this).parent().siblings(".item-price").text().replace(/^\$/g,"");
        // var price = $(this).prev().text().replace(/^\$/g,"");
        // var price = $(this).parent().prev().text().replace(/^\$/g,"");
        var price = parseFloat(price);
        var message = "<p>"+ title +" costing $" + price + " was added to your shopping cart </p>";
        modaltext.replaceWith(message);
        modal.show();
        closebtn.click(function(){
          modal.hide();
        });

        totalprice+=price;
        $('span#totalprice').html(totalprice);
      });



	}



	function generateClothingItems(){
		let item = $("item");
		let thisbutton = $(this).children('img');
		
		
		item.each(function(){

			let thissrc = $(this).attr('src');
			let thistitle = $(this).attr('title');
			let thisprice = $(this).attr('price');

			let full_imgsrc = '<img src="../../static/img/shop/'+ thissrc +'.png">';
			let display_title = $('<div>'+thistitle+'</div>').addClass('item-title');
			let display_price = $('<div>'+'$'+thisprice+'</div>').addClass('item-price');
			let addtocart_button = $('<button>Add to Cart</button>').addClass('buttonBlack').attr('data-price',thisprice).attr('data-title',thistitle);
			let addtocart_container = $('<div></div>').addClass('center-div').append(addtocart_button);
			$(this).append(full_imgsrc).append(display_title).append(display_price).append(addtocart_container);
		});
		
		
		$('button').click(function(){
			alert('hi');
			var thisprice = $(this).data('price');
			var thistitle= $(this).data('title');
			let modal = $('.modal');
			let modaltext = $('p.modal-text');
			let closebtn = $('span.close');
			// document.getElementById("john").innerHTML = "bfeffewef";
			let message = $("<p>"+ thistitle+" costing $" + thisprice + " was adjded to your shopping cart </p>");
			message.addClass('modal-text');

			modaltext.replaceWith(message);
			modal.show();
			closebtn.click(function(){
				modal.hide();
			});



		});

	}

   
})(jQuery);


