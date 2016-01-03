<!-- select a language -->           
<li class="dropup">
  <a href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    <?php echo $language['footer_language']?>
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a class="myformlink" id="English"      data-formname="English" role="menuitem" tabindex="-1" href="#">English</a></li>
    <li role="presentation"><a class="myformlink" id="French"     data-formname="French" role="menuitem" tabindex="-1" href="#">Francais</a></li>
    <li role="presentation"><a class="myformlink" id="Portuguais"   data-formname="Portuguais" role="menuitem" tabindex="-1" href="#">Português</a></li>
  </ul>
</li>
<script type="text/javascript">
        $(document).ready(function() {
        $('.myformlink').click(function(){
            document.cookie="language="+$(this).data('formname')+"; path=/";
            location.reload();
            $($(this).data('formname')).submit();
        });
    });
</script>
