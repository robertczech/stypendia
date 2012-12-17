    <script>
    $(function() {
        var availableTags = [
            "Praca",
            "Rodzinne",
            "Alimety",
            "Stypedjum",
            "dofinasowanie",
        "Scala",
            "Scheme"
        ];
        $( "#typ" ).autocomplete({
            source: availableTags
        });
    });
    </script>
      <?php 
        $osoba = new Osoba(1);
        echo $osoba->getImmie();
      ?>
<?php include_component('dochud', 'lista') ?>

<button id="create-user">Plus</button> 
</head>
<body>
 
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
    

<hr>
<?php include_component('osoba', 'lista') ?>