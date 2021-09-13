<?php

class Guns
{
    protected string $name;
    protected int $power;
    protected string $license;

    public function __construct(string $name, int $power, string $license)
    {
        $this->name = $name;
        $this->power = $power;
        $this->license = $license;
    }

    public function calculateRecoil(): int
    {
        return $this->power * 5;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLicense(): string
    {
        return $this->license;
    }
}

class Shotguns extends Guns
{
    public function __construct(string $name, int $power, string $license = "SG")
    {
        parent::__construct($name, $power, $license);
    }

    public function calculateRecoil(): int
    {
        return $this->power * rand(1, 4);
    }
}

class Pistols extends Guns
{

    public function __construct(string $name, int $power, string $license = "No")
    {
        parent::__construct($name, $power, $license);
    }

    public function calculateRecoil(): int
    {
        return $this->power * 3;
    }
}

class SubMachines extends Guns
{
    public function __construct(string $name, int $power, string $license = "SM")
    {
        parent::__construct($name, $power, $license);
    }

    public function calculateRecoil(): int
    {
        return $this->power * 13;
    }
}

class Rifles extends Guns
{
    public function __construct(string $name, int $power, string $license = "RF")
    {
        parent::__construct($name, $power, $license);
    }

    public function calculateRecoil(): int
    {
        return $this->power * 30;
    }
}

class Snipers extends Guns
{
    public function __construct(string $name, int $power, string $license = "SP")
    {
        parent::__construct($name, $power, $license);
    }

    public function calculateRecoil(): int
    {
        return $this->power * 99;
    }
}