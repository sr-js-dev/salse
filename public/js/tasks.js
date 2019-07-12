var oTable=Null;
$(document).ready(function()
{
    oTable= $('#tasks').dateTable({
        "ajax":'http://localhost:8000/dashboard/tasks/getTasks',
        "lengthMenu":[[5,10,15,-1], [5,10,15,"All"]]
    });
});