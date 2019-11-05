<?php
require_once(SITE_ROOT . 'app/Connection.php');

class Client
{
    private $attributes;

    public function __construct()
    { }

    public function __set(string $attribute, $values)
    {
        $this->attributes[$attribute] = $values;
        return $this;
    }

    public function __get(string $attribute)
    {
        return $this->attributes[$attribute];
    }

    public function __isset($attribute)
    {
        return isset($this->attributes[$attribute]);
    }

    /**
     * Salvar o cliente
     * @return boolean
     */
    public function save()
    {
        $columns = $this->prepare($this->attributes);
        if (!isset($this->id)) {
            $query = "INSERT INTO client (" .
                implode(', ', array_keys($columns)) .
                ") VALUES (" .
                implode(', ', array_values($columns)) . ");";
        } else {
            foreach ($columns as $key => $value) {
                if ($key !== 'id') {
                    $define[] = "{$key}={$value}";
                }
            }
            $query = "UPDATE client SET " . implode(', ', $define) . " WHERE id='{$this->id}';";
        }
        if ($connection = Connection::getInstance()) {
            $stmt = $connection->prepare($query);
            if ($stmt->execute()) {
                return $stmt->rowCount();
            }
        }
        return false;
    }

    /**
     * Tornar valueses aceitos para sintaxe SQL
     * @param type $data
     * @return string
     */
    private function escape($data)
    {
        if (is_string($data) & !empty($data)) {
            return "'" . addslashes($data) . "'";
        } elseif (is_bool($data)) {
            return $data ? 'TRUE' : 'FALSE';
        } elseif ($data !== '') {
            return $data;
        } else {
            return 'NULL';
        }
    }

    /**
     * Verifica se data são próprios para ser salvos
     * @param array $data
     * @return array
     */
    private function prepare($data)
    {
        $result = array();
        foreach ($data as $k => $v) {
            if (is_scalar($v)) {
                $result[$k] = $this->escape($v);
            }
        }
        return $result;
    }

    /**
     * Retorna uma lista de clientes
     * @return array/boolean
     */
    public static function all()
    {
        $connection = Connection::getInstance();
        $stmt    = $connection->prepare("SELECT * FROM client;");
        $result  = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Client::class)) {
                $result[] = $rs;
            }
        }
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }

    /**
     * Retornar o número de registros
     * @return int/boolean
     */
    public static function count()
    {
        $connection = Connection::getInstance();
        $count   = $connection->exec("SELECT count(*) FROM client;");
        if ($count) {
            return (int) $count;
        }
        return false;
    }

    /**
     * Encontra um recurso pelo id
     * @param type $id
     * @return type
     */
    public static function find($id)
    {
        $connection = Connection::getInstance();
        $stmt    = $connection->prepare("SELECT * FROM client WHERE id='{$id}';");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchObject('Client');
                if ($result) {
                    return $result;
                }
            }
        }
        return false;
    }

    /**
     * Destruir um recurso
     * @param type $id
     * @return boolean
     */
    public static function destroy($id)
    {
        $connection = Connection::getInstance();
        if ($connection->exec("DELETE FROM client WHERE id='{$id}';")) {
            return true;
        }
        return false;
    }
}
