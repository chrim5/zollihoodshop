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
    public static function GenerateCategoryList($categories) {
        foreach ($categories as $key => $value) {
            $menuitem = strtolower($value->getId());
            echo "<li><a href=\"/product/category/$menuitem\">$value</a></li>";
        }
    }
}
