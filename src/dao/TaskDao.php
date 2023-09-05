<?php
class TaskDao
{
    private MysqlAdapter $mysqlAdapter;
    public function __construct(MysqlAdapter $mysqlAdapter)
    {
        $this->mysqlAdapter = $mysqlAdapter;
    }

    public function getLastId()
    {
        return $this->mysqlAdapter->getLastId();
    }

    public function select()
    {
        $resultset = $this->mysqlAdapter->query("
            SELECT * FROM tasks 
            INNER JOIN users ON tasks.user_id = users.user_id
            ORDER BY task_status ASC");
        $result = [];
        while ($row = mysqli_fetch_assoc($resultset)) {
            $result[] = $this->schematize($row);
        }
        return $result;
    }

    public function selectById($task_id)
    {
        $resultset = $this->mysqlAdapter->query("SELECT * FROM tasks INNER JOIN users ON tasks.user_id = users.user_id WHERE task_id = $task_id");
        $row = mysqli_fetch_assoc($resultset);
        if (mysqli_num_rows($resultset) == 0) return [];
        return $this->schematize($row);
    }

    public function countStatusMissing()
    {
        $resultset = $this->mysqlAdapter->query("SELECT COUNT(*) AS num FROM tasks WHERE task_status = 0");
        $row = mysqli_fetch_assoc($resultset);
        return $row['num'];
    }

    public function countStatusComplete()
    {
        $resultset = $this->mysqlAdapter->query("SELECT COUNT(*) AS num FROM tasks WHERE task_status = 1");
        $row = mysqli_fetch_assoc($resultset);
        return $row['num'];
    }

    public function insert(
        $task_name,
        $task_desc,
        $task_notify,
        $task_date,
        $user_id
    ) {
        $task_created = date('Y-m-d H:i:s');
        $task_updated = date('Y-m-d H:i:s');
        $result = $this->mysqlAdapter->query("
            INSERT INTO tasks SET 
                task_name = '$task_name',
                task_desc = '$task_desc',
                task_notify = '$task_notify',
                task_date = '$task_date',
                task_created = '$task_created',
                task_updated = '$task_updated',
                user_id = '$user_id'
        ");
        if ($result) return $this->mysqlAdapter->getLastId();
        return false;
    }

    public function update(
        $task_name,
        $task_desc,
        $task_notify,
        $task_date,
        $user_id,
        $task_id
    ) {
        $task_updated = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE tasks SET 
                task_name = '$task_name',
                task_desc = '$task_desc',
                task_notify = '$task_notify',
                task_date = '$task_date',
                task_updated = '$task_updated',
                user_id = '$user_id'
            WHERE task_id = '$task_id'
        ");
    }

    public function updateStatus($task_status, $task_id)
    {
        $task_updated = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE tasks SET 
                task_status = '$task_status',
                task_updated = '$task_updated'
            WHERE task_id = '$task_id'
        ");
    }

    public function delete($task_id)
    {
        return $this->mysqlAdapter->query("DELETE FROM tasks WHERE task_id = $task_id ");
    }

    private function schematize($row)
    {
        return $row;
    }
}
