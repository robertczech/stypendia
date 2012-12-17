$(function() {
    var typ = $( "#typ" ),
        dochod = $( "#dochod" ),
        osoba = $( "#id"),
        i = 0,
        allFields = $( [] ).add( typ ).add( dochod ),
        tips = $( ".validateTips" );

function edytuj() {
    $( ".edytuj-user" )
        .button()
        .click(function() {
            dane = $(this).parent().parent();
            id = $("td :eq(0)", dane).html();   
            $( "#typ" ).val( $("td :eq(1)", dane).html() )
            $( "#dochod" ).val(  $("td :eq(2)", dane).html() )
            $( "#dialog-form" ).dialog({
            buttons: {
                "Edytuj": function() {
                var bValid = true;
                allFields.removeClass( "ui-state-error" );

                bValid = bValid && checkLength( typ, "typ", 3, 16 );
                bValid = bValid && checkLength( dochod, "dochod", 0, 80 );

                bValid = bValid && checkRegexp( typ, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
                // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
                bValid = bValid && checkRegexp( dochod, /^(([\-]{0,1})+[0-9]+\.+[0-9][0-9])+$/i, " error" );

                if ( bValid ) {
                    $.get('http://127.0.0.1/ug/web/dochud/edytuj?typ=' + typ.val() +'&dochod=' + dochod.val() +'&id=' + id );
                    $("td :eq(1)", dane).html(typ.val());
                    $("td :eq(2)", dane).html(dochod.val());
                    $( this ).dialog( "close" );
                }
            },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
    });   
}

function dodaj() {
    var bValid = true;
    allFields.removeClass( "ui-state-error" );

    bValid = bValid && checkLength( typ, "typ", 3, 16 );
    bValid = bValid && checkLength( dochod, "dochod", 0, 80 );

    bValid = bValid && checkRegexp( typ, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
    // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
    bValid = bValid && checkRegexp( dochod, /^(([\-]{0,1})+[0-9]+\.+[0-9][0-9])+$/i, " error" );

    if ( bValid ) {
        $( "#users tbody" ).append( "<tr>" +
            "<td>" + (i+1) + "</td>" + 
            "<td> " + typ.val() + "</td>" + 
            "<td> " + dochod.val() + "</td>"  + 
            "<td>" +
                "<button class=\"usun-user\">Uduń</button>" +
                "<button class=\"edytuj-user\">Edtyuj</button>" +
           "</td>" +
        "</tr>" ); 
        $.get('http://127.0.0.1/ug/web/dochud/dodaj?typ=' + typ.val() +'&dochod=' + dochod.val() +'&id=' + osoba.val() );
        i++;
        $( ".usun-user" )
            .button()
            .click(function() {
                alert();
            });
        edytuj()
        $( ".edytuj-user" )
            .button()
            .click(function() {
                edytuj()
                $( "#dialog-form" ).dialog( "open" );
            });
        $( this ).dialog( "close" );
    }
}   

$( "#dialog-form" ).hide();
edytuj()
$( "#create-user" )
    .button()
    .click(function() {
        $( "#dialog-form" ).dialog({
                autoOpen: false,
                height: 305,
                width: 350,
                modal: true,
                buttons: {
                    "dodaj": dodaj,
                    Cancel: function() {
                        $( this ).dialog( "close" );
                    }
                },
                close: function() {
                    allFields.val( "" ).removeClass( "ui-state-error" );
                }
            });
        $( "#dialog-form" ).dialog( "open" );
    });

$( ".usun-user" )
    .button()
    .click(function() {
        dane = $(this).parent().parent();
        id = $("td :eq(0)", dane).html();
        $.get('http://127.0.0.1/ug/web/dochud/usun?id=' + id  );
        dane.remove();
    });

$("#osoba_typ").change(function () {
          var str = "";
          $("#osoba_typ option:selected").each(function () {
                if($(this).text() == 'dorosly'){
                    $('#osoba_szkala').parent().parent().hide();
                    $('#osoba_klasa').parent().parent().hide();
                }else {
                    $('#osoba_szkala').parent().parent().show();
                    $('#osoba_klasa').parent().parent().show();
                }
              });
         })
    .trigger('change');
});

