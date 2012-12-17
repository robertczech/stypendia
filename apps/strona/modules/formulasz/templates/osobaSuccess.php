
<div id="dialog-form" title="Create new user">
    <p class="validateTips">Dochód</p>

    <form>
    <fieldset>
        <label for="typ">Typ</label>
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>"/>
        <input type="text" name="typ" id="typ" class="text ui-widget-content ui-corner-all" />
        <label for="dochod">Dochud</label>
        <input type="text" name="dochod" id="dochod" value="" class="text ui-widget-content ui-corner-all" />
    </fieldset>
    </form>
</div>
<script>
    $(function() {
        $( "#tabs" ).tabs({       
        });
        $('.ziemia').dblclick(function(){
            ziemia = $(this).html()
            wartosc = parseFloat(ziemia)
            if( (parseFloat(ziemia)) || (wartosc == 0) ){
                wartosc = parseFloat(ziemia)
                $(this).html("<input id=\"ziemia\"  value=\"" + wartosc + "\"/>")
                $("#ziemia").select()
            }
            $("#ziemia").blur(function() 
            { 
                var ziemia; 
                ziemia = $("#ziemia").val(); 
                wartosc = parseFloat(ziemia)
                if( (parseFloat(ziemia)) || (wartosc == 0) ) {
                    html = $(this).parent().parent().parent()
                    id = $("td :eq(0)", html).html()
                    $.get('http://127.0.0.1/ug/web/osoba/ziemia?ziemia=' + wartosc + '&id=' + id );
                    $("#ziemia").parent().html(wartosc)
                } else {
                    //alert(wartosc)
                }
            }); 
       });
    });
</script>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">osoby</a></li>
        <li><a href="#tabs-2">Dochód</a></li>
    </ul>
    <div id="tabs-1">
        <form action="<?php echo url_for('/ug/web/formulasz/osoba?id_r='.$rodzina); ?>" method="POST">
          <table>
            <tr>
              <?php echo $form ?>
              <td colspan="2">
                <input type="submit" />
              </td>
            </tr>
          </table>
        </form>  
        <?php include_component('osoba', 'lista') ?>
    </div>
    <div id="tabs-2">
        <?php include_component('dochud', 'listar') ?>
    </div>
</div>

