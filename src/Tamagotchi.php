<?php
    class Tamagotchi
    {
        private $name;
        private $happiness;
        private $food;
        private $sleep;

        function __construct($name)
        {
            $this->name = $name;
            $this->happiness = 100;
            $this->food = 100;
            $this->sleep = 100;
        }

        function getName()
        {
            return $this->name;
        }

        function getStat($statNumber)
        {
            if ($statNumber == 1) {
                return $this->food;
            } elseif ($statNumber == 2) {
                return $this->sleep;
            } else {
                return $this->happiness;
            }
        }

        function save()
        {
            $_SESSION['tamagotchiStats'] = $this;
        }

        function play()
        {
            $this->happiness += 10;
            $this->food -= 5;
            $this->sleep -= 5;
        }
        function feed()
        {
            $this->happiness -= 5;
            $this->food += 10;
            $this->sleep -= 5;
        }
        function sleep()
        {
            $this->happiness -= 5;
            $this->food -= 5;
            $this->sleep += 10;
        }
    }
 ?>
