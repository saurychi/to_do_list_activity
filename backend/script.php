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
                url: '../../backend/function.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    alert(response);
                    window.location.href = './index.php';
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
                url: '../../backend/function.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    alert(response);
                    window.location.href = './index.php';
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
                url: '../../backend/function.php',
                type: 'POST',
                data: data,
                success: function(response) {
                    alert(response);
                    window.location.href = './index.php';
                }
            });
        })
    }

    $(document).ready(function(){
        $('.status-checkbox').change(function(){
            var taskId = $(this).data('id');
            var status = $(this).is(':checked') ? 'done' : 'pending';

            $.ajax({
                url: '../../backend/function.php',
                type: 'POST',
                data: {
                    action: 'update_status',
                    id: taskId,
                    status: status
                },
                success: function(response) {
                    alert(response);
                    window.location.href = './index.php'; // Redirect to index page
                }
            });
        });
    });
</script>
