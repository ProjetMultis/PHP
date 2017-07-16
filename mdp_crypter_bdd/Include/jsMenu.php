<script type="text/javascript">

//fonction menu

  $(function() {
       var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
       $(".ui.menu a").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
            $(this).addClass("active");
       })
  });

//fonction menu déroulant
    $('.ui.dropdown').dropdown();

</script>