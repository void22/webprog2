<?php
    class Menu
    {
        public static $menu = array();
        
        public static function setMenu()
        {
            self::$menu = array();
            $connection = Database::getConnection();
            $stmt = $connection->query("SELECT url, name, parent, access FROM menu WHERE access LIKE '" . $_SESSION['wp2ulevel'] . "'ORDER BY sequence");
            
            while ($menuitem = $stmt->fetch(PDO::FETCH_ASSOC)) {
                self::$menu[$menuitem['url']] = array($menuitem['name'], $menuitem['parent'], $menuitem['access']);
            }
        }
    
        public static function getMenu($sItems)
        {
            $submenu = "";
            
            $menu = "<ul>";
            foreach (self::$menu as $menuindex => $menuitem) {
                if ($menuitem[1] == "") {
                    $menu.= "<li><a href='" . SITE_ROOT.$menuindex . "' " . ($menuindex==$sItems[0] ? "class='selected'" : "") . ">" . $menuitem[0] . "</a></li>";
                }
                else if ($menuitem[1] == $sItems[0]) {
                    $submenu .= "<li><a href='" . SITE_ROOT . $sItems[0] . "/" . $menuindex . "' " . ($menuindex == $sItems[1] ? "class='selected'" : "") . ">" . $menuitem[0] . "</a></li>";
                }
            }

            $menu.="</ul>";
            
            if ($submenu != "") {
                $submenu = "<ul>".$submenu."</ul>";
            }
            
            return $menu.$submenu;
        }
    }
    
    Menu::setMenu();
?>