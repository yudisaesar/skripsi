var TableEditable = function () {

    var handleTable = function () {
        
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
                'targets': [0]
            },{
                "searchable": false,
                "targets": [0]
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
    
    if($('.location-href').length > 0){
        $('.location-href').change(function(){
            location.href = $(this).val();
        });
    }
    if($('.refresh').length > 0){
        $('.refresh').click(function(){
            location.reload();
        });
    }
});