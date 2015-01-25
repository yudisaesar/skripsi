var TableEditable = function () {

    var handleTable = function () {
        
        var totalTh = $('#data_table thead tr th').length;
        var lastIndex = totalTh - 1;
        
        $('#data_table').dataTable({
            "lengthMenu": [
                [10, 20, 30, 40, 50, -1],
                [10, 20, 30, 40, 50, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': false,
                'targets': [0, lastIndex]
            },{
                "searchable": false,
                "targets": [0, lastIndex]
            },{ 
                "width": "1%", 
                "targets": [0] 
            }],
            "aaSorting": [],
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleTable();
        }
    };
}();

jQuery(document).ready(function(){
    TableEditable.init();
});