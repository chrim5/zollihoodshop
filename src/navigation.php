<?php
    class Navigation {
        public static function GenerateMenu($menu) {
            foreach ($menu as $key => $value) {
                $menuitem = strtolower($value);
                if ($value === $sitename)
                    echo "<li><a href=\"$menuitem.php\" class=\"active\">$value</a></li>";
                else
                    echo "<li><a href=\"$menuitem.php\">$value</a></li>";
            }
        }
    };
