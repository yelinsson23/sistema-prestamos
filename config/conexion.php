<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

class DB
{
    private $connection;

    public function __construct()
    {
        // Leemos directamente desde $_ENV al instanciar la clase
        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASSWORD'];
        $db   = $_ENV['DB_NAME'];

        $this->connection = new mysqli($host, $user, $pass, $db);

        if ($this->connection->connect_errno) {
            die("Connection Failed: " . $this->connection->connect_error);
        }

        $this->connection->set_charset("utf8mb4");
    }


    function bindQueryParams($statement, $sql_param_type, $param_array = array())
    {
        $param_value_reference[] = &$sql_param_type;
        for ($i = 0; $i < count($param_array); $i++) {
            $param_value_reference[] = &$param_array[$i];
        }

        call_user_func_array(array($statement, 'bind_param'), $param_value_reference);
    }
    
    function select($sql_query, $sql_param_type = "", $param_array = array())
    {
        if ($statement = $this->connection->prepare($sql_query)) {
            if (!empty($sql_param_type) && !empty($param_array)) {
                $this->bindQueryParams($statement, $sql_param_type, $param_array);
            }

            $statement->execute();
            $sql_query_result = $statement->get_result();

            if ($sql_query_result->num_rows > 0) {
                while ($row = $sql_query_result->fetch_assoc()) {
                    $result_set[] = $row;
                }
            }

            if (!empty($result_set)) {
                return $result_set;
            }
        }
    }

    function insert($sql_query, $sql_param_type = "", $param_array = array())
    {
        if ($statement = $this->connection->prepare($sql_query)) {
            $this->bindQueryParams($statement, $sql_param_type, $param_array);
            // print_r($statement);
            $statement->execute();
            $insert_id = $statement->insert_id;
            return $statement->affected_rows;
        }
    }

    function delete($sql_query, $sql_param_type = "", $param_array = array())
    {
        if ($statement = $this->connection->prepare($sql_query)) {
            if (!empty($sql_param_type) and !(empty($param_array))) {
                $this->bindQueryParams($statement, $sql_param_type, $param_array);
            }
            $statement->execute();
            return $statement->affected_rows;
        }
    }

    function execute($sql_query, $sql_param_type = "", $param_array = array())
    {
        if ($statement = $this->connection->prepare($sql_query)) {
            if (!empty($sql_param_type) && !empty($param_array)) {
                $this->bindQueryParams($statement, $sql_param_type, $param_array);
            }
            $statement->execute();
            $result = $statement->get_result();
            return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
        } else {
            throw new Exception("Error preparing statement: " . $this->connection->error);
        }
    }

    function update($sql_query, $sql_param_type = "", $param_array = array())
    {
        if ($statement = $this->connection->prepare($sql_query)) {
            if (!empty($sql_param_type) and !(empty($param_array))) {
                $this->bindQueryParams($statement, $sql_param_type, $param_array);
                $statement->execute();
                $statement->store_result();
                return $statement->affected_rows;
            }
        }
        return 0;
    }
}
