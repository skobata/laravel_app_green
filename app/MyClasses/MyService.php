<?php

namespace App\MyClasses;

class MyService
{
    private static self $myService;

    private int $serial;

    public function __construct(
        private int $id,
        private string $msg = 'no selected...',
        private array $data = ['Hello', 'Welcome', 'Bye']
    ) {
        $this->setId($id);
        $this->serial = rand();
        echo "[{$this->serial}]";
    }

    public static function getInstance(): self
    {
        return self::$myService ?? self::$myService = new MyService(0);
    }

    public function setId(int $id)
    {
        $this->id = $id;

        if ($id >= 0 && $id < count($this->data)) {
            $this->msg = "select id: \"{$id}\", data: \"{$this->data[$id]}\"";
        }
    }

    public function say(): string
    {
        return $this->msg;
    }

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function allData(): array
    {
        return $this->data;
    }
}
