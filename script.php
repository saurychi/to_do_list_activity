<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
    function addTask() {
        $(document).ready(function(){
            var data = {
                action: 'insert',
                task: $('#task_name').val(),
                description: $('#description').val(),
                expiry_date: $('#expiry_date').val()
            };

            $.ajax({
                url: 'function.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    alert(response);
                }
            });
        })
    }

    function editTask() {
        $(document).ready(function(){
            var data = {
                action: 'edit',
                id: $('#id').val(),
                task: $('#task_name').val(),
                description: $('#description').val(),
                expiry_date: $('#expiry_date').val()
            };

            $.ajax({
                url: 'function.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    alert(response);
                }
            });
        })
    }

    function deleteTask(id) {
        $(document).ready(function(){
            var data = {
                action: 'delete',
                id: id
            };

            $.ajax({
                url: 'function.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    alert(response);
                }
            });
        })
    }
</script>
