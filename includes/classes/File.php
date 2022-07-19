<?php

class File
{
    public string $file_name = '';
    private $file = [];
    private $name = '';
    private $direcotry = '../../assets/uploads/';
    private $max_size = '1';
    private $error = '';

    public function set($f): void
    {
        if (is_array($f)) {
            $this->file = $f;
        } else {
            $this->error = 'Invalid upload file format  ';
        }
    }

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function max_size($size)
    {
        if (is_int($size) and $size > 0) {
            $this->max_size = $size * 1024 * 1024;
        } else {
            $this->error = 'Invalid max size';
        }

        return $this;
    }

    public function upload()
    {
        if ($this->max_size < $this->get_size()) {
            $this->error = 'File size is ' . round($this->get_size() / (1024 * 1024), 2) . ' MB, but max size is ' . round($this->max_size / (1024 * 1024), 2) . ' MB';
        }

        if (empty($this->error)) {
//            $this->am
            return move_uploaded_file($this->file['tmp_name'], $this->destination());
        } else {
            return false;
        }
    }

    public function get_size()
    {
        return $this->file['size'];
    }

    public function destination()
    {
//File name
        $rand = stringGenerate(10);
//        $this->destination = $this->get_dir() . DIRECTORY_SEPARATOR . $this->get_name() .'dafsdfdas.' .$this->ext;
        $this->destination = $this->get_dir() . DIRECTORY_SEPARATOR . $this->get_name() . date("m-d-Y-H-i-s") . $rand . '.' . $this->ext;
        $this->file_name = 'assets/uploads/' . $this->get_name() . date("m-d-Y-H-i-s") . '_' . $rand . '.' . $this->ext;
        return $this->destination;

    }

    public function get_dir()
    {
        if (!is_dir($this->direcotry)) {
            mkdir($this->direcotry, 0755, true);
        }

        return $this->direcotry;
    }

    public function get_name()
    {
        if (empty($this->name)) {
            return $this->name = date("m-d-Y H_i_s");
        }

        $this->fc = $this->get_dir() . DIRECTORY_SEPARATOR . $this->name . '.' . $this->ext;
        if (file_exists($this->fc)) {
            $this->i = 0;

            do {
                $this->name = $this->name . $this->i;
                $this->fc = $this->get_dir() . DIRECTORY_SEPARATOR . $this->name . '.' . $this->ext;
                $this->i++;
            } while (file_exists($this->fc));
        }

    }

    public function direcotry()
    {
        $this->fn = explode('.', $this->file['name']);
        $this->ext = end($this->fn);

        return '.' . $this->ext;
    }

//    change file upload name


    public function report()
    {
        return $this->error;
    }


}

