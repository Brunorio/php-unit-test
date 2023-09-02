<?php

class User {
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
        $this->validate();
    }

    private function validate(){
        if(empty(trim($this->name)))
            throw new \InvalidArgumentException("Name must not be empty");
    }

    public function getName(): string {
        return $this->name;
    }
}
