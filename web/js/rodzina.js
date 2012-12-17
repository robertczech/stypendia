$(function() {
    var typ = $( "#typ" ),
        dochod = $( "#dochod" ),
        osoba = $( "#id"),
        i = 0,
        allFields = $( [] ).add( typ ).add( dochod ),
        tips = $( ".validateTips" );
        
function dodaj_dr() {
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
        $.get('http://127.0.0.1/ug/web/dochud/dodajr?typ=' + typ.val() +'&wartosc=' + dochod.val() +'&id=' + osoba.val() );
        i++;
        $( ".usun-user" )
            .button()
            .click(function() {
                alert();
            });

        $( ".edytuj-user" )
            .button()
            .click(function() {
                $( "#dialog-form" ).dialog( "open" );
            });
        $( this ).dialog( "close" );
    }
}   
function dodaj_osoby( id ) {
    var bValid = true;
    allFields.removeClass( "ui-state-error" );

    bValid = bValid && checkLength( typ, "typ", 3, 16 );
    bValid = bValid && checkLength( dochod, "dochod", 0, 80 );

    bValid = bValid && checkRegexp( typ, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
    // From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
    bValid = bValid && checkRegexp( dochod, /^(([\-]{0,1})+[0-9]+\,+[0-9][0-9])+$/i, " error" );

    if ( bValid ) {
        $.get('http://127.0.0.1/ug/web/dochud/dodaj?typ=' + typ.val() +'&dochud=' + dochod.val() +'&id=' + id );
        i++;
        $( ".usun-user" )
            .button()
            .click(function() {
                alert();
            });

        $( ".edytuj-user" )
            .button()
            .click(function() {
                $( "#dialog-form" ).dialog( "open" );
            });
        return true
    }else return false
}   
    $( "#create-dr" )
        .button()
        .click(function() {
            $( "#dialog-form" ).dialog({
                    autoOpen: false,
                    height: 305,
                    width: 350,
                    modal: true,
                    buttons: {
                        "dodaj": dodaj_dr,
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
        
    $( "#create-dr" )
    .button()
    .click(function() {
        $( "#dialog-form" ).dialog( "open" );
    });
        
    $( ".usun-rodzina" )
        .button()
        .click(function() {
            dane = $(this).parent().parent().parent();
            id = $("td :eq(0)", dane).html();
            $.get('http://127.0.0.1/ug/web/rodzina/usun?id=' + id  );
            dane.remove();
        });
        
    $( ".usun-dr" )
        .button()
        .click(function() {
            dane = $(this).parent().parent().parent();
            id = $("td :eq(0)", dane).html();
            $.get('http://127.0.0.1/ug/web/dochud/usunr?id=' + id  );
            dane.remove();
        });        
    $( ".usun-osobe" )
        .button()
        .click(function() {
            dane = $(this).parent().parent().parent();
            id = $("td :eq(0)", dane).html();
            $.get('http://127.0.0.1/ug/web/osoba/usun?id=' + id  );
            dane.remove();
        });
        
    $( ".dochod-osoba" )
        .button()
        .click(function() {
        dane = $(this).parent().parent().parent();
        id = $("td :eq(0)", dane).html();
        
        $( "#dialog-form" ).dialog({
                autoOpen: false,
                height: 305,
                width: 350,
                modal: true,
                buttons: {
                    "dodaj": function() {
                            if(dodaj_osoby(id)){
                                $( this ).dialog( "close" );
                            }else{
                                dodaj_osoby(id)
                            }
                        },
                    Cancel: function() {
                        $( this ).dialog( "close" );
                    }
                },
                close: function() {
                    allFields.val( "" ).removeClass( "ui-state-error" );
                }
            });
        $( "#dialog-form" ).dialog( "open" );
    })
});

