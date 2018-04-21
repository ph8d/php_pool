<?php

require_once "Color.class.php";

class Vertex
{
    public static $verbose = FALSE;

    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;

    function __construct(array $kwargs)
    {
        if  (isset($kwargs["x"]) && isset($kwargs["y"]) && isset($kwargs["z"]))
        {
            $this->_x = $kwargs["x"];
            $this->_y = $kwargs["y"];
            $this->_z = $kwargs["z"];
        }
        if (isset($kwargs["w"]))
        {
            $this->_w = $kwargs["w"];
        }
        if (isset($kwargs["color"]))
        {
            $this->_color = $kwargs["color"];
        }
        else
        {
            $this->_color = new Color(array("rgb" => 0xFFFFFF));
        }
        if (self::$verbose === TRUE)
        {
            echo $this." constructed\n";
        }
    }

    function __destruct()
    {
        if (self::$verbose === TRUE)
        {
            echo $this." destructed\n";
        }
    }

    function __toString()
    {
        if (self::$verbose == TRUE)
            return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color));
        else
            return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }

    static function doc()
    {
        return (file_get_contents("Vertex.doc.txt")."\n");
    }

    public function getX()
    {
        return $this->_x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function getZ()
    {
        return $this->_z;
    }

}

?>