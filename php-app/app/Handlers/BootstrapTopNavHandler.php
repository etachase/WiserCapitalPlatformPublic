<?php namespace App\Handlers;
/**
 * This file is part of the Laravel package: Menu-Builder,
 * a menu and breadcrumb trails management solution for Laravel.
 *
 * @license GPLv3
 * @author Sebastien Routier (sroutier@gmail.com)
 * @package Sroutier\MenuBuilder
 */

use App\Contracts\MenuHandlerInterface;
use App\Traits\MenuHandlerTrait;
use App\Models\Menu;
use App\Http\Requests\Request;

class BootstrapTopNavHandler implements MenuHandlerInterface
{

    use MenuHandlerTrait {
        renderMenu  as traitRenderMenu;
    }

    // TODO: RenderLeftAlignmentGroup
    // TODO: RenderRightAlignmentGroup

    public $MENU_PARTIAL_VIEW   = 'partials._bootstrap-top-menu';
    public $MENU_HEADER         = "<ul class='nav navbar-nav'>";
    public $MENU_FOOTER         = "</ul>";
    public $MENU_ITEM_SEPARATOR = "<li role='separator' class='divider'></li>";
    public $MENU_ITEM_INACTIVE  = "<li><a href='@URL@'><i class='@ICON@'></i>&nbsp;@LABEL@</a></li>";
    public $MENU_ITEM_ACTIVE    = "<li class='active'><a href='@URL@'><i class='@ICON@'></i>&nbsp;@LABEL@<span class='sr-only'>(current)</span></a></li>";
    public $MENU_GROUP_START    = "<li class='dropdown'><a href='@URL@' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><i class='@ICON@'></i>&nbsp;@LABEL@<span class='caret'></span></a><ul class='dropdown-menu'>";
    public $SUB_MENU_GROUP_START    = "<li class='dropdown-submenu'><a href='@URL@' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><i class='@ICON@'></i>&nbsp;@LABEL@</a><ul class='dropdown-menu'>";
    public $MENU_GROUP_END      = "</ul></li>";

    public $TRAIL_PARTIAL_VIEW           = 'partials._bootstrap-light-trail';
    public $TRAIL_HEADER                 = "<ol class='breadcrumb'>";
    public $TRAIL_FOOTER                 = "</ol>";
    public $TRAIL_ITEM_ACTIVE_NO_URL     = "<li>@LABEL@</li>";
    public $TRAIL_ITEM_ACTIVE_WITH_URL   = "<li><a href='@URL@'>@LABEL@</a></li>";
    public $TRAIL_ITEM_INACTIVE_NO_URL   = "<li>@LABEL@</li>";
    public $TRAIL_ITEM_INACTIVE_WITH_URL = "<li><a href='@URL@'>@LABEL@</a></li>";

    protected $customMenus = [
        'hf' => 'generateHFURL'
    ];

    /**
     * @param Menu $menu
     * @return mixed|null|string
     */
    public function generateUrl( Menu $menu )
    {
        $url = null;
        if ($menu instanceof Menu) {
            foreach ( $this->customMenus as $key => $functionName) {
                if (str_contains($menu->url, '{#' . $key . '#}')) {
                    $url = call_user_func_array([$this, $functionName], [$menu]);
                }
            }
        }
        $url = $url ? $url : $menu->url;
        return $url;
    }

    public function generateHFURL($menu) {
        if (!empty($this->app->request->route('id'))) {
            $url = str_replace('{#hf#}', $this->app->request->route('id'), $menu->url);
        } else if (!empty($this->app->request->route('hf'))) {
            $url = str_replace('{#hf#}', $this->app->request->route('hf'), $menu->url);
        }
        return $url;
    }
    /**
     *
     *
     *
     * @param Menu $item
     * @param array $variables
     *
     * @return string
     */
    public function renderMenuItem( Menu $item, $variables = [], $isChild = false )
    {
        $itemGroupStart  = "";
        $itemGroupContent  = "";
        $itemGroupEnd  = "";
        $itemContent = "";

        if ($item->enabled) {
            $variables = $this->getVariables($item, $variables);
            $bActive      = ($variables['URL'] == $variables['CURRENT_URL']) ? true : false;
            $bHasChildren = ($item->children->count())                       ? true : false;
            $bIsSeparator = ($item->separator)                               ? true : false;
            if ($bHasChildren) {
                if($isChild){
                    $itemGroupStart = $this->replaceVars($this->SUB_MENU_GROUP_START, $variables);
                }else{
                    $itemGroupStart = $this->replaceVars($this->MENU_GROUP_START, $variables);
                }

                $children = $item->children;
                foreach($children as $child) {

                    $itemGroupContent .= $this->renderMenuItem($child, $variables, true);
                }

                $itemGroupEnd = $this->replaceVars($this->MENU_GROUP_END, $variables);

                if ("" != $itemGroupContent) {
                    $itemContent = $itemGroupStart . $itemGroupContent . $itemGroupEnd;
                }
            }
            elseif ($bIsSeparator) {
                $itemContent .= $this->replaceVars($this->MENU_ITEM_SEPARATOR, $variables);
            }
            else {
                if ($bActive) {
                    $itemContent .= $this->replaceVars($this->MENU_ITEM_ACTIVE, $variables);
                }
                else {
                    $itemContent .= $this->replaceVars($this->MENU_ITEM_INACTIVE, $variables);
                }
            }
        }

        return $itemContent;
    }
}
