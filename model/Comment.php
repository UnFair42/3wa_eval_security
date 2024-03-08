<?php


class Comment
{

    private $name;
    private $message;


    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    function __construct($name, $message)
    {
        $this->name = $name;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "Name: {$this->name}, Message: {$this->message}";
    }
}
