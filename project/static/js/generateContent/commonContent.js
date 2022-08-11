(function($){

    $(document).ready(function(){

        generateContainer();
        
    });

    function generateContainer(){
        let body=$("body");
        body.prepend("<container></container>");

        let container = $("container");
        let leftcollar = $("<leftcollar></leftcollar>").addClass("col-lg-2 col-md-2 col-sm-1 col-xs-1 full-height");
        let rightcollar = $("<rightcollar></rightcollar>").addClass("col-lg-2 col-md-2 col-sm-1 col-xs-1 full-height");
        container.addClass("col-lg-10 col-md-10 col-no-gutter center-block full-height");
        container.prepend(leftcollar).append(generateMainBody()).append(rightcollar);
        
        
    }

    function generateMainBody(){
        let maincontent = $("mainContent");
        maincontent.addClass("whiteBG col-lg-8 col-md-8 col-sm-9 col-xs-9 col-no-gutter min-height");
        return maincontent.prepend('<nav></nav>').prepend(generateTopNav()).append('<footer></footer>').append(generateFooter());
    }
    function generateTopNav(){
        
        let nav = $("nav").addClass("whiteBG");

        var img = $('<img />', { 
              id: 'Myid',
              src: '../../static/img/common/logo.png',
              href: '#index.html',
              alt: 'Logo'
            });

        let homelink = $('<a>Home</a>').attr('href','#index.html');
        let aboutlink = $('<a>About</a>').attr('href','#about.html');
        let shoplink = $('<a>Shop</a>').attr('href','#shop.html');


        let gallerylink = $('<a>Gallery</a>').attr('href','#gallery.html');
        let contactlink = $('<a>Contact</a>').attr('href','#contact.html');

        return nav.append(homelink).append(aboutlink).append(shoplink).append(img).append(gallerylink).append(contactlink);
        
    }

    function generateFooter(){
        
        let footer = $("footer");
        let content1 = "<small>Mix &amp; Match is an online shop for custom-made clothes and accessories.</small>";
        let content2 = "<small>Copyright &copy; 2016-2017 Mix &amp; Match</small>";

        return footer.append(content1).append('<br>').append(content2);
    }
})(jQuery);
