<script type="text/javascript">
    $.validate({
        lang: 'en'
    });
</script>

 @if(Session('success'))
     <div class="alert bg-success fade in">
     <a style="text-align: left;"  href="#" class="close" data-dismiss="alert">x</a>
     {{Session('success')}}
     </div>
      @endif

      