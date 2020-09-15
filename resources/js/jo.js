$(document).ready(function(){
    $(function(){
      $("#addtask").click(function(){
        var inpd = '<td width="2%"><input type="checkbox" name="task"></td><td width="50%"><input type="text" class="form-control" name="task[]" placeholder="Task name" value="" required> </td>'+
        '<td width="20%"> <input type="number" min="1" class="form-control" name="lead[]" placeholder="Lead Time in Days" value="" required> </td>'+
        '<td width="20%"> <input type="number" class="form-control" step=".01" class="inpamount" name="amount[]" placeholder="Amount Due" value="" required> </td>';
        var markup = '<tr>'+inpd+'</tr>';
        $("table tbody").append(markup);
        });
        // Find and remove selected table rows
        $("#deletetask").click(function(){
            $("table tbody").find('input[name="task"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }else{
                  alert('Please select a task using the checkbox.');
                }
            });
        });

        $("#calcTask").click(function() {
          var values = $("input[name='amount[]']")
                  .map(function(){return $(this).val();}).get();
          var sum = 0;
          for (var i = 0; i < values.length; i++) {
            sum += parseFloat(values[i])
          }
          $("#amountdue").html(sum.toFixed(2));
        });

        $("button.btn.btn-outline-primary.my-2.my-sm-0.btn-sm.taskstatus").click(function() {
          alert('test');
        });
  });
  // $(document).ready(function() {
  //  $("#jotable").DataTable({
  //     columnDefs : [
  //     { type : 'date', targets : [3] }
  //     ],
  //     });
  //   });
});
