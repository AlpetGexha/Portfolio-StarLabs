<?php

/**
 * Databasa ORM
 *
 */
class DB
{
    /**
     * Database connection
     *
     * */
    private static $database = null;

    /**
     * Get database connection
     *
     * @return object
     */
    private $pdo;

    /**
     * Query per databazë
     *
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     */
    private $sql;

    /**
     * Resultatet e Querit
     *
     * @return object
     */
    private $results;
    /**
     * Shikon nese ka error
     *
     * @var bool
     *
     */
    private $error = false;

    /**
     * Numeron nese ka error
     *
     * @var int
     *
     */
    private $count = 0;

    private $data;

    //databse connection
    private function __construct() //var_dump(Config::get('mysql'));
    {
        try {
            $this->pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'), Config::get('mysql/options'));
            // echo "U lidh me batabase";
        } catch (PDOException $e) {
            die("Probleme me database" . $e->getMessage());
        }
    }

    //get batabase only one time

    /**
     * Selekto të dhënat nga databaza
     *
     */
    public function get(string $tabel, array $where) //DB::getDB()->get('users', array('username ' , '=' , 'AlpetG'));
    {
        return $this->action("SELECT *", $tabel, $where);
    }

    /**
     * Krijo Query
     *
     * @param String $action
     * @return "SELECT * from x where z 'operator' z"
     */
    public function action(string $action, string $table, array $where = []) //DB::getDB()->get('SELCET *','users', array('username ' , '=' , 'AlpetG') );
    {
        if (count($where) === 3) {
            $allow = ['=', '<', '>', '>=', '=>'];

            $filed = $where[0];
            $operator = $where[1];
            $value = $where[2];

            //in_array — Checks if a value exists in an array
            if (in_array($operator, $allow)) {
                $sql = "{$action} FROM {$table} ";
                if ($where != []) {
                    $sql .= "WHERE {$filed} {$operator} ?";
                }

                //use sql($sql,array) to run
                if (!$this->sql($sql, [$value])->error()) {
                    return $this;
                }
            }
            return false;
        }
    }

    /**
     * Gabimet në query
     *
     *
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * Query function
     *
     * @return "SELECT * from x where y = ?", ? = zs
     *
     */
    public function sql(string $sql, array $executes = []) //DB::getDB()->sql("SELECT * from users where username = ?", array('AlpetG'))
    {
        $this->error = false;
        if ($this->sql = $this->pdo->prepare($sql)) {
            // print_r($executes);
            $x = 1;
            if (count($executes)) {
                foreach ($executes as $execute) {
                    $this->sql->bindValue($x, $execute);
                    // $this->sql->bindParam($x, $execute);
                    $x++;
                }
            }
            if ($this->sql->execute()) {
                $this->results = $this->sql->fetchAll(PDO::FETCH_OBJ);
                $this->count = $this->sql->rowCount();
            } else {
                $this->error = true;
            }
        }
        return $this;
    }

    /** Lidhu me database vetem një here
     *
     * @return MainDatabase
     */
    public static function getDB() //DB::getDB();
    {
        if (!isset(self::$database)) {
            self::$database = new DB();
        }
        return self::$database;
    }

    /**
     * Fshij të dhënat në databazë
     *
     * @param Sting $tabel
     * @param void $where
     */
    public function delete(string $tabel, $where)
    {
        return $this->action("DELETE ", $tabel, $where);
    }

    /**
     * Krijo të dhënat në databazë
     *
     * @param Sting $tabel
     * @param Array $where
     */
    public function insert(string $table, array $fields = [])
    {
        if (count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;

            //fix ", " and "?" for sql
            foreach ($fields as $field) {
                $values .= "?";
                if ($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            } // VALUES (?, ?)

            $sql = "INSERT INTO $table (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
            //INSERT INTO users (`emri`, `mbiemri`)                 VALUES (?, ?)

            // echo $sql;
            if (!$this->sql($sql, $fields)->error()) {
                $this->sql("UPDATE $table SET created_at = NOW(), updated_at = NOW()  WHERE id = ?", [$this->pdo->lastInsertId()]);
                return true;
            }
        }
        return false;
    }

    /**
     * Përditëso të dhënat në databazë
     *
     * @param Sting $tabel
     * @param Array $where
     */
    public function update(string $table, int $id, array $fields = []) //DB::getDB()->update('users', 65, array( 'emri' => 'Alpet', 'mbiemri' => 'Gexha', 'username' => 'AlpetG23', 'password' => '123456789' ));
    {
        $set = ' ';
        $x = 1;

        foreach ($fields as $name => $value) {
            $set .= "{$name} = ?";
            if ($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }
        // die($set);

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id} ";
        echo $sql;

        if (!$this->sql($sql, $fields)->error()) {
//            $this->sql("UPDATE `updated_at` SET NOW() WHERE id = {$id}");
            return true;
        }

        return false;
    }

    /**
     * Limito numrin e resultatit
     *
     * @param Int $count
     *
     */
    public function limit(int $limit)
    {
        $this->sql->queryString .= " LIMIT {$limit}";
        return $this;
    }

    public function orderBy(string $by)
    {
        $this->sql->queryString .= " ORDER BY id {$by}";
        return $this;
    }

    public function orderByDESC()
    {
        $this->sql->queryString .= " ORDER BY id DESC";
        return $this;
    }

    public function orderByASC()
    {
        $this->sql->queryString .= " ORDER BY id ASC";
        return $this;
    }


    public function data()
    {
        $data = $this->sql;

        return $data;
    }

    public function lastId(string $table)
    {
        return ($this->sql("SELECT id FROM $table ORDER BY id DESC LIMIT 1")->results()[0]->id);

    }

    /**
     * Merr rezultatin
     *
     */
    public function results()
    {
        return $this->results;
    }

    /**
     * Numero gabimet
     *
     */
    public function count()
    {
        return $this->count;
    }

    /**
     * Merr rezultatin e parë
     *
     */
    public function firstResult()
    {
        return $this->results()[0];
    }

    public function toSQL()
    {
        return $this->sql->queryString;
    }
}
