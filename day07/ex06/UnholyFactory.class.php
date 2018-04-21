<?php

class UnholyFactory {

    private $_fighter_types = array();

    function is_unique_fighter_type($type)
    {
        foreach ($this->_fighter_types as $fighter_type => $obj)
        {
            if ($fighter_type === $type)
            {
                return (False);
            }
        }
        return (True);
    }

    function absorb($fighter)
    {
        if (is_subclass_of($fighter, 'Fighter') === TRUE)
        {
            if ($this->is_unique_fighter_type($fighter->getFighterType()))
            {
                $this->_fighter_types[$fighter->getFighterType()] = $fighter;
                printf("(Factory absorbed a fighter of type %s)" . PHP_EOL, $fighter->getFighterType());
            }
            else
            {
                printf("(Factory already absorbed a fighter of type %s)" . PHP_EOL, $fighter->getFighterType());
            }
        }
        else
        {
            printf("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
        }
    }

    function fabricate($fighter_type)
    {
        if ($this->is_unique_fighter_type($fighter_type) == FALSE)
        {
            printf("(Factory fabricates a fighter of type %s)" . PHP_EOL, $fighter_type);
            $fighter_type = ucfirst(str_replace(' ', '', $fighter_type));
            return (new $fighter_type);
        }
        else
        {
            printf("(Factory hasn't absorbed any fighter of type llama)" . PHP_EOL);
            return (null);
        }
    }
}

?>