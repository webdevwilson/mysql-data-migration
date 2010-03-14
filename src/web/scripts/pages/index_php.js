$(document).ready(function() {
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
