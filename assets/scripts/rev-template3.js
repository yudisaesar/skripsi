$(document).ready(function() {
    TableEditable.init();

    $('#company_id').change(function(){
        location.href = $(this).val();
    });
    $('.refresh').click(function(){
        location.reload();
    });

    $('#submit-form').click(function(){
        //Loading
        Metronic.startPageLoading();
        $.ajax({
            type: 'POST',
            url: ajax_url_add,
            data: $('#form-add').serialize(),
            success:function(data){
                Metronic.stopPageLoading();
                if(data == 'OK'){
                    location.reload();
                    return false;
                }
                alert(data);
                return false;
            }
        });  
    });
    
    $('#revenue-add').click(function(){
        //Loading
        Metronic.startPageLoading();
        $.ajax({
            type: 'POST',
            url: ajax_url_add_rev,
            data: {
                    "company_id": company_id,
                    "total_1": $('#total_1').val(),
                    "total_2": $('#total_2').val(),
                    "total_3": $('#total_3').val(),
                    "total_4": $('#total_4').val(),
                    "total_5": $('#total_5').val(),
                    "total_6": $('#total_6').val(),
                    "total_7": $('#total_7').val(),
                    "total_8": $('#total_8').val(),
                    "total_9": $('#total_9').val(),
                    "total_10": $('#total_10').val(),
                    "total_11": $('#total_11').val(),
                    "total_12": $('#total_12').val(),
            },            
            success:function(data){
                Metronic.stopPageLoading();
                if(data == 'OK'){
                    location.reload();
                    return false;
                }
                alert(data);
                return false;
            }
        });        
    });
});

var TableEditable = function () {

    var handleTable = function () {

        function restoreRow(oTable, nRow) 
        {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow, dataId) 
        {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            //aData = colom mana yg akan di edit
            jqTds[2].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[4] + '">';
            jqTds[5].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[5] + '">';
            jqTds[6].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" input-mini" onkeypress="return isNumberKey(event)" value="' + aData[6] + '">';
            jqTds[7].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[7] + '">';
            jqTds[8].innerHTML = '<input type="text" class="form-control input-qty" onkeypress="return isNumberKey(event)" value="' + aData[8] + '">';
            jqTds[9].innerHTML = '<input type="text" class="form-control input-qty" onkeypress="return isNumberKey(event)" value="' + aData[9] + '">';
            jqTds[10].innerHTML = '<input type="text" class="form-control input-qty" onkeypress="return isNumberKey(event)" value="' + aData[10] + '">';
            jqTds[11].innerHTML = '<input type="text" class="form-control input-qty" onkeypress="return isNumberKey(event)" value="' + aData[11] + '">';
            jqTds[12].innerHTML = '<input type="text" class="form-control input-qty" onkeypress="return isNumberKey(event)" value="' + aData[12] + '">';
            jqTds[13].innerHTML = '<input type="text" class="form-control input-qty" onkeypress="return isNumberKey(event)" value="' + aData[13] + '">';
            
            jqTds[15].innerHTML = '<a class="edit" data-id="'+ dataId +'" href="javascript:;">Save</a>|<a class="cancel" href="javascript:;">Cancel</a>';
        }

        function saveRow(oTable, nRow, dataId) 
        {
            //alert(oTable.attr('id'));
            //return false;
            var idTable = oTable.attr('id');
            var jqInputs = $('input', nRow);
            
            //Loading
            Metronic.startPageLoading();
            
            if (idTable == 'price'){
                $.ajax({
                    type: 'POST',
                    url: ajax_url_edit_price,
                    data: {
                        "id": dataId, 
                        "company_id": company_id,
                        "price": jqInputs[0].value,
                    },
                    success:function(data){
                        Metronic.stopPageLoading();
                        if(data == 'OK'){
                            location.reload();
                            return false;
                        }
                        //Kembalikan ke sedia kala
                        oTable.fnUpdate('<a class="edit" data-id="'+ dataId +'" href="javascript:;">Edit</a>', nRow, 15, false);
                        oTable.fnDraw();

                        alert(data);
                        return false;
                    }
                }); 
            }
            else if (idTable == 'hours'){
                $.ajax({
                    type: 'POST',
                    url: ajax_url_edit,
                    data: {
                        "id": dataId, 
                        "company_id": company_id,
                        "hour_1": jqInputs[0].value,
                        "hour_2": jqInputs[1].value,
                        "hour_3": jqInputs[2].value,
                        "hour_4": jqInputs[3].value,
                        "hour_5": jqInputs[4].value,
                        "hour_6": jqInputs[5].value,
                        "hour_7": jqInputs[6].value,
                        "hour_8": jqInputs[7].value,
                        "hour_9": jqInputs[8].value,
                        "hour_10": jqInputs[9].value,
                        "hour_11": jqInputs[10].value,
                        "hour_12": jqInputs[11].value,
                        "id_table" : idTable
                    },
                    success:function(data){
                        Metronic.stopPageLoading();
                        if(data == 'OK'){
                            location.reload();
                            return false;
                        }
                        //Kembalikan ke sedia kala
                        oTable.fnUpdate('<a class="edit" data-id="'+ dataId +'" href="javascript:;">Edit</a>', nRow, 15, false);
                        oTable.fnDraw();

                        alert(data);
                        return false;
                    }
                }); 
            }
        }

        var table = $('.table');

        //var oTable = table.dataTable({
        var opts = {
            "lengthMenu": [
                [10, 20, 30, -1],
                [10, 20, 30, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': false,
                'targets': [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14], //sortir di false
            }, {
                "searchable": true,
                "targets": [0]
            }],
            //men disable sorting kolom pertama
            "aaSorting": [], // set first column as a default sort by asc
        }
    //);
        var oTables = {
          "price" : $('#price').dataTable(opts),
          "hours" : $('#hours').dataTable(opts),
          "maintenance" : $('#maintenance').dataTable(opts),
          "fixed" : $('#fixed').dataTable(opts),
          "variable_fee" : $('#variable_fee').dataTable(opts),
        };
        
        var nEditing = null;

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            /* Get The Table ID */
            var idTab = $(this).closest("table").attr("id");
            
            restoreRow(oTables[idTab], nEditing);
            nEditing = null;
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();
            
            /* Get The Table ID */
            var idTab = $(this).closest("table").attr("id");
            
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];
            var dataId = $(this).attr('data-id');

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTables[idTab], nEditing);
                editRow(oTables[idTab], nRow, dataId);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTables[idTab], nEditing, dataId);
                nEditing = null;
            } else {
                /* No edit in progress - let's start one */
                editRow(oTables[idTab], nRow, dataId);
                nEditing = nRow;
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleTable();
        }
    };
}();