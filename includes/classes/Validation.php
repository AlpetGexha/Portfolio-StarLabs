<?php

/**
 * @method min Mininumu => x
 * @method max Maximum = x> x
 * @method req Request
 * @method match x => y
 * @method uniq x => database tabel
 * @method email EmailOnly
 *
 */
class Validation
{
    /**
     * Errorat
     *
     * @var array
     */
    private $errors = [];

    /**
     * Nese e ka plotesuar kushtin
     *
     * @var bool
     *
     */
    private $passed = false;

    /**
     * Për datebasë
     *
     * @var object
     */
    private $db = null;


    public function __construct()
    {
        $this->db = DB::getDB();
    }

    /**
     * Shiko nese forma i ka plotësuar kushtet
     *
     * @param InputName $source
     * @param Validate $items
     *
     */
    public function check($source, array $items = [])
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                // echo "{$item} {$rule} duhet te jete {$rule_value} <br/>";

                $value = $source[$item]; //$source = _POST/+_GET $values = _POST['username']
                $item = e($item);

                if ($rule === 'req' && empty($value)) {
                    $this->addError("{$item} është e obliguar");
                } else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("{$item} duhet t&euml; jet&euml; minimum {$rule_value} karaktereve.");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError("{$item} mund t&euml; jet&euml; vet&euml;m {$rule_value} karaktereve.");
                            }
                            break;
                        case 'match':
                            if ($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} must match {$item}.");
                            }
                            break;
                        case 'uniq':
                            $check = $this->db->get($rule_value, [$item, '=', $value]);
                            if ($check->count()) {
                                $this->addError("{$item} tashm&euml; ekziston.");
                            }
                            break;
                        case 'email':
                            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                                $this->addError("{$item} nuk &euml;sht&euml; valid.");
                            }
                            break;
                        case 'photo':
                            if (!in_array(strtolower(pathinfo($value, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])) {
                                $this->addError("{$item} duhet t&euml; jet&euml; nj&euml; foto.");
                            }
                            break;
                        case 'url':
                            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                                $this->addError("{$item} nuk &euml;sht&euml; valid.");
                            }
                            break;
                    }
                }
            }
        }


        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this;
    }

    /**
     * Shto errora ne kushte
     *
     * @param string $error
     * @return void
     */
    public function addError($error)
    {
        $this->errors[] = $error;
    }

    /**
     * Kushti i ka plotësuar kriteret
     *
     * @return bool
     */
    public function passed()
    {
        return $this->passed;
    }

    /**
     * Listo errorat në forma e liste
     *
     * @return array
     */
    public function getError()
    {
        foreach ($this->errors() as $error) {
            echo '<p style="color: #8B0000;">' . $error . ' </p>';
        }
    }

    /**
     * Merr errorat në forma e liste
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }
}
