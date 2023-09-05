<?php
class TaskService
{

    public static function select($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $taskDao = new TaskDao($adapter);
        $users = $taskDao->select();
        echo json_encode([
            'status' => 'success',
            'message' => 'Tasks obtained successfully',
            'response' => true,
            'data' => $users
        ]);
    }

    public static function insert($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];
        if (isset(
            $_POST['task_name'],
            $_POST['task_desc'],
            $_POST['task_notify'],
            $_POST['task_date'],
            $_POST['user_id'],
        )) {
            $taskDao = new taskDao($adapter);

            $task_name = $_POST['task_name'];
            $task_desc = $_POST['task_desc'];
            $task_notify = $_POST['task_notify'];
            $task_date = $_POST['task_date'];
            $user_id = $_POST['user_id'];

            $task = $taskDao->insert(
                $task_name,
                $task_desc,
                $task_notify,
                $task_date,
                $user_id,
            );

            $result['status'] = 'success';
            $result['message'] = 'Task created successfully';
            $result['response'] = true;
            $result['data'] = $task;
        }
        echo json_encode($result);
    }

    public static function update($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];
        if (isset(
            $_POST['task_name'],
            $_POST['task_desc'],
            $_POST['task_notify'],
            $_POST['task_date'],
            $_POST['user_id'],
            $_POST['task_id']
        )) {
            $taskDao = new taskDao($adapter);

            $task_id = $_POST['task_id'];
            $current_task = $taskDao->selectById($task_id);
            if (!$current_task) {
                $result['message'] = 'Task not found';
                echo json_encode($result);
                exit();
            }

            $task_name = $_POST['task_name'];
            $task_desc = $_POST['task_desc'];
            $task_notify = $_POST['task_notify'];
            $task_date = $_POST['task_date'];
            $user_id = $_POST['user_id'];
            $task_id = $_POST['task_id'];

            $task = $taskDao->update(
                $task_name,
                $task_desc,
                $task_notify,
                $task_date,
                $user_id,
                $task_id
            );

            $result['status'] = 'success';
            $result['message'] = 'Task updated successfully';
            $result['response'] = true;
            $result['data'] = $task;
        }
        echo json_encode($result);
    }

    public static function updateStatus($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];
        if (isset(
            $_POST['task_status'],
            $_POST['task_id']
        )) {
            $taskDao = new taskDao($adapter);

            $task_id = $_POST['task_id'];
            $current_task = $taskDao->selectById($task_id);
            if (!$current_task) {
                $result['message'] = 'Task not found';
                echo json_encode($result);
                exit();
            }

            $task_status = $_POST['task_status'];

            $task = $taskDao->updateStatus(
                $task_status,
                $task_id
            );

            $result['status'] = 'success';
            $result['message'] = 'Task status updated successfully';
            $result['response'] = true;
            $result['data'] = $task;
        }
        echo json_encode($result);
    }

    public static function delete($DATA)
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $adapter = $DATA['mysqlAdapter'];
        $result = [
            'status' => 'error',
            'message' => 'Data not found',
            'response' => false,
            'data' => null
        ];
        if (isset($_POST['task_id'])) {
            $taskDao = new taskDao($adapter);
            $task_id = $_POST['task_id'];
            $task = $taskDao->selectById($task_id);
            if (!$task) {
                $result['message'] = 'Task not found';
                echo json_encode($result);
                exit();
            }

            $taskDao->delete($task_id);
            $result['status'] = 'success';
            $result['message'] = 'Task deleted successfully';
            $result['response'] = true;
        }
        echo json_encode($result);
    }
}
