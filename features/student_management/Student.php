<?php

namespace student_management;

class Student
{
    private string $id;
    private ?string $name;
    private ?string $dob;
    private ?string $gender;
    private ?string $address;
    private ?string $class;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Student
     */
    public function setId(string $id): Student
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Student
     */
    public function setName(?string $name): Student
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDob(): string
    {
        return $this->dob;
    }

    /**
     * @param string $dob
     * @return Student
     */
    public function setDob(string $dob): Student
    {
        $this->dob = $dob;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return Student
     */
    public function setGender(string $gender): Student
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Student
     */
    public function setAddress(string $address): Student
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     * @return Student
     */
    public function setClass(string $class): Student
    {
        $this->class = $class;
        return $this;
    }
}
