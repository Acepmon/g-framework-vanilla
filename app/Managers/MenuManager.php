<?php

namespace App\Managers;

use Illuminate\Support\Arr;
use App\Menu;
use Modules\System\Entities\Group;

class MenuManager extends Manager
{
    public static function register($title, $link, $args = array())
    {
        $args = self::handleArgs($args);

        if (isset($args['parent_id'])) {
            $args['order'] = Menu::where('parent_id', $args['parent_id'])->count() + 1;
        }

        $menu = self::createMenu($title, $link, $args['sublevel'], $args['order'], $args['parent_id'], $args['group']);

        // If meta was included then attach
        if (count($args['meta']) > 0) {
            $menu->setMeta($args['meta']);
            $menu->save();
        }

        // If group is passed then attach menu to group
        self::attachGroup($menu, $args['group']);

        return $menu;
    }

    public static function iterate($arr = array(), $sublevel = 1, $parent_id = null, $group = null) {
        // Loop through current iteration of array
        for ($i=0; $i < count($arr); $i++) {
            $order = $i + 1;

            // If parent id is specified then
            // set the order after its last children
            if (isset($parent_id)) {
                $order = Menu::where('parent_id', $parent_id)->count() + 1;
            }

            // Insert the current in-loop menu
            $menu = self::createMenu($arr[$i]['title'], $arr[$i]['link'], $sublevel, $order, $parent_id);

            // If meta was included then attach
            if (array_key_exists('meta', $arr[$i])) {
                $menu->setMeta($arr[$i]['meta']);
                $menu->save();
            }

            // If group is passed then attach menu to group
            self::attachGroup($menu, $group);

            // Reiterate children menus if there are any
            if (array_key_exists('children', $arr[$i]) && count($arr[$i]['children']) > 0) {
                self::iterate($arr[$i]['children'], $sublevel + 1, $menu->id, $group);
            }
        }
    }

    public static function createMenu($title, $link, $sublevel = 1, $order = 1, $parent_id = null) {
        $menu = new Menu();
        $menu->title = $title;
        $menu->link = $link;
        $menu->sublevel = $sublevel;
        $menu->order = $order;
        $menu->parent_id = $parent_id;
        $menu->save();

        return $menu;
    }

    public static function attachGroup($menu, $group) {
        if (is_array($group)) {
            foreach ($group as $grp) {
                $grp = self::handleGroup($grp);
                $grp->menus()->attach($menu);
            }
        } else {
            if (isset($group)) {
                $group = self::handleGroup($group);
                $group->menus()->attach($menu);
            }
        }
    }

    public static function search($criteria = array()) {
        $menu = Menu::whereRaw('1 = 1');
        foreach ($criteria as $key => $value) {
            $menu = $menu->where($key, $value);
        }
        return $menu->get();
    }

    private static function handleGroup($group) {
        if ($group instanceof Group) {
            return $group;
        } else {
            $group = Group::findOrFail($group);
            return $group;
        }
    }

    private static function handleArgs($args = array()) {
        $args_filters = ['sublevel', 'order', 'parent_id', 'group'];

        return [
            'sublevel' => Arr::get($args, 'sublevel', 1),
            'order' => Arr::get($args, 'order', 1),
            'parent_id' => Arr::get($args, 'parent_id', null),
            'group' => Arr::get($args, 'group', null),
            'meta' => Arr::except($args, $args_filters),
        ];
    }
}
