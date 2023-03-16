<?php

namespace Labs;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validation;
class User
{
    // объявление свойства
    public $id;
    public $name;
    public $password;
    public DateTime $creation_date;
    public $email;
    private function printViolations($violations, $id){
        if (0 !== count($violations)) {
            foreach ($violations as $violation) {
                echo $id.' ';
                echo $violation->getMessage().'<br>';
            }
        }
        return (0 !== count($violations));
    }
    public function __construct(int $id, string $name, string $email, string $password) {
        $validator = Validation::createValidator();
        $violations = $validator->validate($email, [
            new Assert\Email(),
            new Assert\NotBlank(),
        ]);
        if ($this->printViolations($violations, $id)){
            return;
        }
        $violations = $validator->validate($name, [
            new Assert\NotBlank(),
        ]);
        if ($this->printViolations($violations, $id)){
            return;
        }
        $violations = $validator->validate($password, [
            new Assert\NotBlank(),
        ]);
        if ($this->printViolations($violations, $id)){
            return;
        }
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password=$password;
        $this->creation_date=new DateTime();;
    }
}