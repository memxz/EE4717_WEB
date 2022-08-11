      $('p#searchoptionslink').one("click", moresearchoptions);

      function moresearchoptions(){ 
        $(this).html('Less Search Options');
        $('div.searchoptions').addClass('show');
        $(this).one("click", lesssearchoptions);
      }
      function lesssearchoptions(){ 
        $(this).html('More Search Options ');
        $('div.searchoptions').removeClass('show');
        $(this).one("click", moresearchoptions);
      }