<?php


class Student
{
    protected $name;
    protected $email;
    protected $phone;
    protected $index;
    protected $image;
    protected $group;

    public function __construct($name, $email, $phone, $image, $group)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->image = $image;
        $this->group = $group;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getIndex()
    {
        return $this->index;
    }
}