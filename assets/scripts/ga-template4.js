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
            jqTds[1].innerHTML = '<input type="text" class="form-control" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" class="form-control" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[4] + '">';
            jqTds[6].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[6] + '">';
            jqTds[8].innerHTML = '<input type="text" class="form-control input-mini" onkeypress="return isNumberKey(event)" value="' + aData[8] + '">';
            jqTds[10].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[10] + '">';
            jqTds[12].innerHTML = '<input type="text" class="form-control input-mini" onkeypress="return isNumberKey(event)" value="' + aData[12] + '">';
            jqTds[14].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[14] + '">';
            jqTds[16].innerHTML = '<input type="text" class="form-control input-mini" onkeypress="return isNumberKey(event)" value="' + aData[16] + '">';
            jqTds[18].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[18] + '">';
            jqTds[20].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[20] + '">';
            jqTds[22].innerHTML = '<input type="text" class="form-control input-mini" onkeypress="return isNumberKey(event)" value="' + aData[22] + '">';
            jqTds[24].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[24] + '">';
            jqTds[26].innerHTML = '<input type="text" class="form-control" onkeypress="return isNumberKey(event)" value="' + aData[26] + '">';
            jqTds[30].innerHTML = '<a class="edit" data-id="'+ dataId +'" href="javascript:;">Save</a>|<a class="cancel" href="javascript:;">Cancel</a>';
        }

        function saveRow(oTable, nRow, dataId) 
        {
            var jqInputs = $('input', nRow);
            
            //Loading
            Metronic.startPageLoading();
            $.ajax({
                type: 'POST',
                url: ajax_url_edit,
                data: {
                    "id": dataId, 
                    "company_id": company_id,
                    "description": jqInputs[0].value,
                    "unit": jqInputs[1].value,
                    "cost": jqInputs[2].value,
                    "quantity_1": jqInputs[3].value,
                    "quantity_2": jqInputs[4].value,
                    "quantity_3": jqInputs[5].value,
                    "quantity_4": jqInputs[6].value,
                    "quantity_5": jqInputs[7].value,
                    "quantity_6": jqInputs[8].value,
                    "quantity_7": jqInputs[9].value,
                    "quantity_8": jqInputs[10].value,
                    "quantity_9": jqInputs[11].value,
                    "quantity_10": jqInputs[12].value,
                    "quantity_11": jqInputs[13].value,
                    "quantity_12": jqInputs[14].value
                },
                success:function(data){
                    Metronic.stopPageLoading();
                    if(data == 'OK'){
                        location.reload();
                        return false;
                    }
                    //Kembalikan ke sedia kala
                    oTable.fnUpdate('<a class="edit" data-id="'+ dataId +'" href="javascript:;">Edit</a>', nRow, 30, false);
                    oTable.fnDraw();
                    
                    alert(data);
                    return false;
                }
            }); 
        }

        var table = $('#data_editable');

        var oTable = table.dataTable({
            "lengthMenu": [
                [10, 20, 30, 40, 50, 100, -1],
                [10, 20, 30, 40, 50, 100, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': false,
                'targets': [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19], //sortir di false
            }, {
                "searchable": true,
                "targets": [0]
            }],
            //men disable sorting kolom pertama
            "aaSorting": [], // set first column as a default sort by asc
            
            
        });

        var nEditing = null;

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            
            restoreRow(oTable, nEditing);
            nEditing = null;
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];
            var dataId = $(this).attr('data-id');

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow, dataId);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing, dataId);
                nEditing = null;
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow, dataId);
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