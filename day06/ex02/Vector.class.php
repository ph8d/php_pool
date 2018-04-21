<?php

require_once "Vertex.class.php";

class Vector
{
    public static $verbose = FALSE;

    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;

    function __construct(array $kwargs)
    {
        if (isset($kwargs["dest"]))
        {
            $this->_x = $kwargs["dest"]->getX();
            $this->_y = $kwargs["dest"]->getY();
            $this->_z = $kwargs["dest"]->getZ();
        }
        if (isset($kwargs["orig"]) === TRUE)
        {
            $this->_x -= $kwargs["orig"]->getX();
            $this->_y -= $kwargs["orig"]->getY();
            $this->_z -= $kwargs["orig"]->getZ();
        }
        else
        {
            $orig = new Vertex(array("x" => 0, "y" => 0, "z" => 0, "w" => 1.0));
            $this->_x -= $orig->getX();
            $this->_y -= $orig->getY();
            $this->_z -= $orig->getZ();
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
        return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }

    static function doc()
    {
        return (file_get_contents("Vector.doc.txt")."\n");
    }

    function magnitude()
    {
        return (sqrt(pow(abs($this->_x), 2) + pow(abs($this->_y), 2) + pow(abs($this->_z), 2)));
    }

    function normalize()
    {
        $magnitude = $this->magnitude();
        $vertex = new Vertex(array("x" => $this->_x / $magnitude, "y" => $this->_y / $magnitude, "z" => $this->_z / $magnitude));
        return (new Vector(array("dest" => $vertex)));
    }

    function add(Vector $rhs)
    {
        $vertex = new Vertex(array("x" => $this->_x + $rhs->_x, "y" => $this->_y + $rhs->_y, "z" => $this->_z + $rhs->_z));
        return (new Vector(array("dest" => $vertex)));
    }

    function sub(Vector $rhs)
    {
        $vertex = new Vertex(array("x" => $this->_x - $rhs->_x, "y" => $this->_y - $rhs->_y, "z" => $this->_z - $rhs->_z));
        return (new Vector(array("dest" => $vertex)));
    }

    function opposite()
    {
        $vertex = new Vertex(array("x" => $this->_x * -1, "y" => $this->_y * -1, "z" => $this->_z * -1));
        return (new Vector(array("dest" => $vertex)));
    }

    function scalarProduct($k)
    {
        $vertex = new Vertex(array("x" => $this->_x * $k, "y" => $this->_y * $k, "z" => $this->_z * $k));
        return (new Vector(array("dest" => $vertex)));
    }

    function dotProduct(Vector $rhs)
    {
        $result = ($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z);
        return ($result);
    }

    function cos(Vector $rhs)
    {
        $v1_magn = $this->magnitude();
        $v2_magn = $rhs->magnitude();
        $dot_product = $this->dotProduct($rhs);
        return ($dot_product / ($v1_magn * $v2_magn));
    }

    function crossProduct(Vector $rhs)
    {
        $vertex = new Vertex(array("x" => $rhs->_z * $this->_y - $rhs->_y * $this->_z, "y" => $rhs->_x * $this->_z - $rhs->_z * $this->_x, "z" => $rhs->_y * $this->_x - $rhs->_x * $this->_y));
        return (new Vector(array("dest" => $vertex)));
    }
}

?>