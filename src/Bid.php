<?php

class Bid {

    private User $user;
    private float $value;

    public function __construct(User $user, float $value){
        $this->user = $user;
        $this->value = $value;
        $this->validate();
    }

    private function validate(){
        if($this->value <= 0)
            throw new \InvalidArgumentException("Value must be greater than zero");
    }

    public function getUser(): User {
        return $this->user;
    }

    public function getValue(): float{
        return $this->value;
    }
}
