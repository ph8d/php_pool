<?php

class Color {
    public static $verbose = FALSE;

    public $red = 0;
    public $green = 0;
    public $blue = 0;

    function __construct(array $color)
    {
        if (isset($color["rgb"]))
        {
            $this->red = (int)(($color["rgb"] >> 16) & 0xFF);
            $this->green = (int)(($color["rgb"] >> 8) & 0xFF);
            $this->blue = (int)($color["rgb"] & 0xFF);
        }
        else if (isset($color["red"]) && isset($color["green"]) && isset($color["blue"]))
        {
            $this->red = (int)$color["red"];
            $this->green = (int)$color["green"];
            $this->blue = (int)$color["blue"];
        }
        if (self::$verbose === TRUE)
        {
            echo $this." constructed.\n";
        }
    }

    function __destruct()
    {
        if (self::$verbose === TRUE)
        {
            echo $this." destructed.\n";
        }
    }

    function __toString()
    {
        return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
    }

    static function doc()
    {
        return (file_get_contents("Color.doc.txt")."\n");
    }

    function add(Color $rhs)
    {
        $new_color = new Color(array("red" => $this->red + $rhs->red, "green" => $this->green + $rhs->green, "blue" => $this->blue + $rhs->blue));
        return ($new_color);
    }

    public function sub(Color $rhs)
    {
        $new_color = new Color(array("red" => $this->red - $rhs->red, "green" => $this->green - $rhs->green, "blue" => $this->blue - $rhs->blue));
        return ($new_color);
    }

    public function mult($f)
    {
        $new_color = new Color(array("red" => $this->red * $f, "green" => $this->green * $f, "blue" => $this->blue * $f));
        return ($new_color);
    }
}

?>