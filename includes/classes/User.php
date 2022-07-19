<?php

class User
{
    /** Databasa
     *
     * @var object
     */
    private $db;

    /** Resultati i Queryit
     *
     * @var object
     */
    private $data;

    /**
     * Emir i sessionit
     *
     * @param object
     */
    private $sessionName;

    /**
     * Nese Useri është i kyçur
     *
     * @param object
     */
    private $isLogenIN;

    /**
     * User Type
     *
     * @param object
     */
    protected const ADMIN = 1;
    protected const USER = 0;



    public function __construct($user = null)
    {
        $this->db = DB::getDB();

        $this->sessionName = Config::get('session/sessionName');
        // $this->sessionRole = Config::get('session/sessionRoles');

        /** Check if user is loggin */
        if (!$user) {
            if (Session::exist($this->sessionName)) {
                $user = Session::get($this->sessionName);
                // echo $user;

                if ($this->find($user)) {
                    $this->isLogenIN = true;
                } else {
                    //Logout
                }
            } else {
                $this->find($user);
            }
        }
    }

    /**
     * Shiko nësë useri ekziston në databazë
     *
     */
    public function exist(): bool
    {
        return (!empty($this->data)) ? true : false;
    }

    /**
     * Gjeje userin e parë në databazë
     *
     */
    public function find(mixed $user = null)
    {
        if ($user) {
            // if user had a numeric return id else username
            $field = (is_numeric($user)) ? 'id' : 'email';
            $data = $this->db->get('users', [$field, '=', $user]);

            //get first user result
            if ($data->count()) {
                $this->data = $data->firstResult();
                return true;
            }
        }
        return false;
    }

    /** Login
     *
     * @param string $email
     * @param string $password
     */
    public function login(string $email = null, string $password = null)
    {
        // $user = ;
        //    echo "<pre>"; print_r($this->data);

        if (!$this->find($email)) {
            Session::flash('error', 'Emaili është gabim');
            return false;
        }
        if (!password_verify($password, $this->data()->password)) {
            Session::flash('error', 'Password është gabim');
            return false;
        }

        if ($this->find($email)) {
            if (password_verify($password, $this->data()->password)) {
                // echo "Logged in";
                Session::put($this->sessionName, $this->data()->id);
                Session::flash('success', 'Ju jeni loguar me sukses');
                // Session::put($this->sessionRole,  $this->data()->role);
                return true;
            }
        }

        return false;
    }

    /**
     * Merr informacionin e userit
     *
     * @return object
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Krijo userin
     *
     * @param array $fields
     */
    public function create(array $fields = [])
    {
        if (!$this->db->insert('users ', $fields)) {
            throw new Exception('Kishte nj&euml; problem me krijimin e k&euml;saj llogaris.');
        }
    }

    /**
     * Përditëso userin
     *
     * @param array $fields
     * @param int $id
     */
    public function update(array $fileds = [], int $id = null)
    {
        if (!$id && $this->isLoggendIn()) {
            $id = $this->data()->id;
        }

        if (!$this->db->update('users', $id, $fileds)) {
            throw new Exception('Kishte nj&euml; problem me updatin e llogaris');
        }
    }

    /**
     * Shiko nëse useri është i kyçur
     *
     */
    public function isLoggendIn()
    {
        return $this->isLogenIN;
    }

    public function hasRole()
    {
    }

    /**
     * Check if user is admin
     *
     */
    public function isAdmin(){
        return $this->data()->role === self::ADMIN;
    }

    /**
     * logout
     *
     */
    public function logout()
    {
        Session::delete($this->sessionName);
        // Session::delete($this->sessionRole);
        Go::to('login');
    }
}
