<?php
 class Singleton
{
    private static  $instance=null;
    private string $name;
    private function __construct()
    {
        self::$name = "";
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();

        }
        return self::$instance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}