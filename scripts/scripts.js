$(document).ready(function() {

    var ghostTag = 'ghost';

    //set for first time
    $('['+ghostTag+']').each( function() {
        var me = $(this);
        if (me.val() == "") {
            me.val(me.attr(ghostTag));
            me.css('color', '#999');
        }
    });

    $('['+ghostTag+']').focus(function(){
        var me = $(this);
        if (me.attr(ghostTag) == me.val()) {
            me.val("");
            me.css('color', '#000');
        }
    });
    $('['+ghostTag+']').blur(function(){
        var me = $(this);
        if (me.val() == "") {
            me.val(me.attr(ghostTag));
            me.css('color', '#999');
        }
    });
    
    $('#source_connection_test').click(DataMigration.calls.testConnection.curry('source'));

});



var DataMigration = {
    stateManager: function() {
        if(this.connectionInfoFilledOut('source')) {

        }
        if(this.connectionInfoFilledOut('destination')) {

    }
    },
    connectionInfoFilledOut: function(sd) {
        return $(sd+'_host').val() != ''
    },
    calls: {
        getCatalogs: function(sourceOrDestination) {

        },
        getTables: function(sourceOrDestination) {

        }
    }
}