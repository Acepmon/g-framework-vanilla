<?php

namespace Modules\System\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

use Route;
use App\Menu;
use Modules\Content\Entities\Content;

class MenuController extends Controller
{
    private $icomoonIconSet = ["icon-home","icon-home2","icon-home5","icon-home7","icon-home8","icon-home9","icon-office","icon-city","icon-newspaper","icon-magazine","icon-design","icon-pencil","icon-pencil3","icon-pencil4","icon-pencil5","icon-pencil6","icon-pencil7","icon-eraser","icon-eraser2","icon-eraser3","icon-quill2","icon-quill4","icon-pen","icon-pen-plus","icon-pen-minus","icon-pen2","icon-blog","icon-pen6","icon-brush","icon-spray","icon-color-sampler","icon-toggle","icon-bucket","icon-gradient","icon-eyedropper","icon-eyedropper2","icon-eyedropper3","icon-droplet","icon-droplet2","icon-color-clear","icon-paint-format","icon-stamp","icon-image2","icon-image-compare","icon-images2","icon-image3","icon-images3","icon-image4","icon-image5","icon-camera","icon-shutter","icon-headphones","icon-headset","icon-music","icon-album","icon-tape","icon-piano","icon-speakers","icon-play","icon-clapboard-play","icon-clapboard","icon-media","icon-presentation","icon-movie","icon-film","icon-film2","icon-film3","icon-film4","icon-video-camera","icon-video-camera2","icon-video-camera-slash","icon-video-camera3","icon-dice","icon-chess-king","icon-chess-queen","icon-chess","icon-megaphone","icon-new","icon-connection","icon-station","icon-satellite-dish2","icon-feed","icon-mic2","icon-mic-off2","icon-book","icon-book2","icon-book-play","icon-book3","icon-bookmark","icon-books","icon-archive","icon-reading","icon-library2","icon-graduation2","icon-file-text","icon-profile","icon-file-empty","icon-file-empty2","icon-files-empty","icon-files-empty2","icon-file-plus","icon-file-plus2","icon-file-minus","icon-file-minus2","icon-file-download","icon-file-download2","icon-file-upload","icon-file-upload2","icon-file-check","icon-file-check2","icon-file-eye","icon-file-eye2","icon-file-text2","icon-file-text3","icon-file-picture","icon-file-picture2","icon-file-music","icon-file-music2","icon-file-play","icon-file-play2","icon-file-video","icon-file-video2","icon-copy","icon-copy2","icon-file-zip","icon-file-zip2","icon-file-xml","icon-file-xml2","icon-file-css","icon-file-css2","icon-file-presentation","icon-file-presentation2","icon-file-stats","icon-file-stats2","icon-file-locked","icon-file-locked2","icon-file-spreadsheet","icon-file-spreadsheet2","icon-copy3","icon-copy4","icon-paste","icon-paste2","icon-paste3","icon-paste4","icon-stack","icon-stack2","icon-stack3","icon-folder","icon-folder-search","icon-folder-download","icon-folder-upload","icon-folder-plus","icon-folder-plus2","icon-folder-minus","icon-folder-minus2","icon-folder-check","icon-folder-heart","icon-folder-remove","icon-folder2","icon-folder-open","icon-folder3","icon-folder4","icon-folder-plus3","icon-folder-minus3","icon-folder-plus4","icon-folder-minus4","icon-folder-download2","icon-folder-upload2","icon-folder-download3","icon-folder-upload3","icon-folder5","icon-folder-open2","icon-folder6","icon-folder-open3","icon-certificate","icon-cc","icon-price-tag","icon-price-tag2","icon-price-tags","icon-price-tag3","icon-price-tags2","icon-barcode2","icon-qrcode","icon-ticket","icon-theater","icon-store","icon-store2","icon-cart","icon-cart2","icon-cart4","icon-cart5","icon-cart-add","icon-cart-add2","icon-cart-remove","icon-basket","icon-bag","icon-percent","icon-coins","icon-coin-dollar","icon-coin-euro","icon-coin-pound","icon-coin-yen","icon-piggy-bank","icon-wallet","icon-cash","icon-cash2","icon-cash3","icon-cash4","icon-credit-card","icon-credit-card2","icon-calculator4","icon-calculator2","icon-calculator3","icon-chip","icon-lifebuoy","icon-phone","icon-phone2","icon-phone-slash","icon-phone-wave","icon-phone-plus","icon-phone-minus","icon-phone-plus2","icon-phone-minus2","icon-phone-incoming","icon-phone-outgoing","icon-phone-hang-up","icon-address-book","icon-address-book2","icon-address-book3","icon-notebook","icon-envelop","icon-envelop2","icon-envelop3","icon-envelop4","icon-envelop5","icon-mailbox","icon-pushpin","icon-location3","icon-location4","icon-compass4","icon-map","icon-map4","icon-map5","icon-direction","icon-reset","icon-history","icon-watch","icon-watch2","icon-alarm","icon-alarm-add","icon-alarm-check","icon-alarm-cancel","icon-bell2","icon-bell3","icon-bell-plus","icon-bell-minus","icon-bell-check","icon-bell-cross","icon-calendar","icon-calendar2","icon-calendar3","icon-calendar52","icon-printer","icon-printer2","icon-printer4","icon-shredder","icon-mouse","icon-mouse-left","icon-mouse-right","icon-keyboard","icon-typewriter","icon-display","icon-display4","icon-laptop","icon-mobile","icon-mobile2","icon-tablet","icon-mobile3","icon-tv","icon-radio","icon-cabinet","icon-drawer","icon-drawer2","icon-drawer-out","icon-drawer-in","icon-drawer3","icon-box","icon-box-add","icon-box-remove","icon-download","icon-upload","icon-floppy-disk","icon-floppy-disks","icon-usb-stick","icon-drive","icon-server","icon-database","icon-database2","icon-database4","icon-database-menu","icon-database-add","icon-database-remove","icon-database-insert","icon-database-export","icon-database-upload","icon-database-refresh","icon-database-diff","icon-database-edit2","icon-database-check","icon-database-arrow","icon-database-time2","icon-undo","icon-redo","icon-rotate-ccw","icon-rotate-cw","icon-rotate-ccw2","icon-rotate-cw2","icon-rotate-ccw3","icon-rotate-cw3","icon-flip-vertical2","icon-flip-horizontal2","icon-flip-vertical3","icon-flip-vertical4","icon-angle","icon-shear","icon-align-left","icon-align-center-horizontal","icon-align-right","icon-align-top","icon-align-center-vertical","icon-align-bottom","icon-undo2","icon-redo2","icon-forward","icon-reply","icon-reply-all","icon-bubble","icon-bubbles","icon-bubbles2","icon-bubble2","icon-bubbles3","icon-bubbles4","icon-bubble-notification","icon-bubbles5","icon-bubbles6","icon-bubble6","icon-bubbles7","icon-bubble7","icon-bubbles8","icon-bubble8","icon-bubble-dots3","icon-bubble-lines3","icon-bubble9","icon-bubble-dots4","icon-bubble-lines4","icon-bubbles9","icon-bubbles10","icon-user","icon-users","icon-user-plus","icon-user-minus","icon-user-cancel","icon-user-block","icon-user-lock","icon-user-check","icon-users2","icon-users4","icon-user-tie","icon-collaboration","icon-vcard","icon-hat","icon-bowtie","icon-quotes-left","icon-quotes-right","icon-quotes-left2","icon-quotes-right2","icon-hour-glass","icon-hour-glass2","icon-hour-glass3","icon-spinner","icon-spinner2","icon-spinner3","icon-spinner4","icon-spinner6","icon-spinner9","icon-spinner10","icon-spinner11","icon-microscope","icon-enlarge","icon-shrink","icon-enlarge3","icon-shrink3","icon-enlarge5","icon-shrink5","icon-enlarge6","icon-shrink6","icon-enlarge7","icon-shrink7","icon-key","icon-lock","icon-lock2","icon-lock4","icon-unlocked","icon-lock5","icon-unlocked2","icon-safe","icon-wrench","icon-wrench2","icon-wrench3","icon-equalizer","icon-equalizer2","icon-equalizer3","icon-equalizer4","icon-cog","icon-cogs","icon-cog2","icon-cog3","icon-cog4","icon-cog52","icon-cog6","icon-cog7","icon-hammer","icon-hammer-wrench","icon-magic-wand","icon-magic-wand2","icon-pulse2","icon-aid-kit","icon-bug2","icon-construction","icon-traffic-cone","icon-traffic-lights","icon-pie-chart","icon-pie-chart2","icon-pie-chart3","icon-pie-chart4","icon-pie-chart5","icon-pie-chart6","icon-pie-chart7","icon-stats-dots","icon-stats-bars","icon-pie-chart8","icon-stats-bars2","icon-stats-bars3","icon-stats-bars4","icon-chart","icon-stats-growth","icon-stats-decline","icon-stats-growth2","icon-stats-decline2","icon-stairs-up","icon-stairs-down","icon-stairs","icon-ladder","icon-rating","icon-rating2","icon-rating3","icon-podium","icon-stars","icon-medal-star","icon-medal","icon-medal2","icon-medal-first","icon-medal-second","icon-medal-third","icon-crown","icon-trophy2","icon-trophy3","icon-diamond","icon-trophy4","icon-gift","icon-pipe","icon-mustache","icon-cup2","icon-coffee","icon-paw","icon-footprint","icon-rocket","icon-meter2","icon-meter-slow","icon-meter-fast","icon-hammer2","icon-balance","icon-fire","icon-fire2","icon-lab","icon-atom","icon-atom2","icon-bin","icon-bin2","icon-briefcase","icon-briefcase3","icon-airplane2","icon-airplane3","icon-airplane4","icon-paperplane","icon-car","icon-steering-wheel","icon-car2","icon-gas","icon-bus","icon-truck","icon-bike","icon-road","icon-train","icon-train2","icon-ship","icon-boat","icon-chopper","icon-cube","icon-cube2","icon-cube3","icon-cube4","icon-pyramid","icon-pyramid2","icon-package","icon-puzzle","icon-puzzle2","icon-puzzle3","icon-puzzle4","icon-glasses-3d2","icon-brain","icon-accessibility","icon-accessibility2","icon-strategy","icon-target","icon-target2","icon-shield-check","icon-shield-notice","icon-shield2","icon-racing","icon-finish","icon-power2","icon-power3","icon-switch","icon-switch22","icon-power-cord","icon-clipboard","icon-clipboard2","icon-clipboard3","icon-clipboard4","icon-clipboard5","icon-clipboard6","icon-playlist","icon-playlist-add","icon-list-numbered","icon-list","icon-list2","icon-more","icon-more2","icon-grid","icon-grid2","icon-grid3","icon-grid4","icon-grid52","icon-grid6","icon-grid7","icon-tree5","icon-tree6","icon-tree7","icon-lan","icon-lan2","icon-lan3","icon-menu","icon-circle-small","icon-menu2","icon-menu3","icon-menu4","icon-menu5","icon-menu62","icon-menu7","icon-menu8","icon-menu9","icon-menu10","icon-cloud","icon-cloud-download","icon-cloud-upload","icon-cloud-check","icon-cloud2","icon-cloud-download2","icon-cloud-upload2","icon-cloud-check2","icon-import","icon-download4","icon-upload4","icon-download7","icon-upload7","icon-download10","icon-upload10","icon-sphere","icon-sphere3","icon-earth","icon-link","icon-unlink","icon-link2","icon-unlink2","icon-anchor","icon-flag3","icon-flag4","icon-flag7","icon-flag8","icon-attachment","icon-attachment2","icon-eye","icon-eye-plus","icon-eye-minus","icon-eye-blocked","icon-eye2","icon-eye-blocked2","icon-eye4","icon-bookmark2","icon-bookmark3","icon-bookmarks","icon-bookmark4","icon-spotlight2","icon-starburst","icon-snowflake","icon-weather-windy","icon-fan","icon-umbrella","icon-sun3","icon-contrast","icon-bed2","icon-furniture","icon-chair","icon-star-empty3","icon-star-half","icon-star-full2","icon-heart5","icon-heart6","icon-heart-broken2","icon-thumbs-up2","icon-thumbs-down2","icon-thumbs-up3","icon-thumbs-down3","icon-height","icon-man","icon-woman","icon-man-woman","icon-yin-yang","icon-cursor","icon-cursor2","icon-lasso2","icon-select2","icon-point-up","icon-point-right","icon-point-down","icon-point-left","icon-pointer","icon-reminder","icon-drag-left-right","icon-drag-left","icon-drag-right","icon-touch","icon-multitouch","icon-touch-zoom","icon-touch-pinch","icon-hand","icon-grab","icon-stack-empty","icon-stack-plus","icon-stack-minus","icon-stack-star","icon-stack-picture","icon-stack-down","icon-stack-up","icon-stack-cancel","icon-stack-check","icon-stack-text","icon-stack4","icon-stack-music","icon-stack-play","icon-move","icon-dots","icon-warning","icon-warning22","icon-notification2","icon-question3","icon-question4","icon-plus3","icon-minus3","icon-plus-circle2","icon-minus-circle2","icon-cancel-circle2","icon-blocked","icon-cancel-square","icon-cancel-square2","icon-spam","icon-cross2","icon-cross3","icon-checkmark","icon-checkmark3","icon-checkmark2","icon-checkmark4","icon-spell-check","icon-spell-check2","icon-enter","icon-exit","icon-enter2","icon-exit2","icon-enter3","icon-exit3","icon-wall","icon-fence","icon-play3","icon-pause","icon-stop","icon-previous","icon-next","icon-backward","icon-forward2","icon-play4","icon-pause2","icon-stop2","icon-backward2","icon-forward3","icon-first","icon-last","icon-previous2","icon-next2","icon-eject","icon-volume-high","icon-volume-medium","icon-volume-low","icon-volume-mute","icon-speaker-left","icon-speaker-right","icon-volume-mute2","icon-volume-increase","icon-volume-decrease","icon-volume-mute5","icon-loop","icon-loop3","icon-infinite-square","icon-infinite","icon-loop4","icon-shuffle","icon-wave","icon-wave2","icon-split","icon-merge","icon-arrow-up5","icon-arrow-right5","icon-arrow-down5","icon-arrow-left5","icon-arrow-up-left2","icon-arrow-up7","icon-arrow-up-right2","icon-arrow-right7","icon-arrow-down-right2","icon-arrow-down7","icon-arrow-down-left2","icon-arrow-left7","icon-arrow-up-left3","icon-arrow-up8","icon-arrow-up-right3","icon-arrow-right8","icon-arrow-down-right3","icon-arrow-down8","icon-arrow-down-left3","icon-arrow-left8","icon-circle-up2","icon-circle-right2","icon-circle-down2","icon-circle-left2","icon-arrow-resize7","icon-arrow-resize8","icon-square-up-left","icon-square-up","icon-square-up-right","icon-square-right","icon-square-down-right","icon-square-down","icon-square-down-left","icon-square-left","icon-arrow-up15","icon-arrow-right15","icon-arrow-down15","icon-arrow-left15","icon-arrow-up16","icon-arrow-right16","icon-arrow-down16","icon-arrow-left16","icon-menu-open","icon-menu-open2","icon-menu-close","icon-menu-close2","icon-enter5","icon-esc","icon-enter6","icon-backspace","icon-backspace2","icon-tab","icon-transmission","icon-sort","icon-move-up2","icon-move-down2","icon-sort-alpha-asc","icon-sort-alpha-desc","icon-sort-numeric-asc","icon-sort-numberic-desc","icon-sort-amount-asc","icon-sort-amount-desc","icon-sort-time-asc","icon-sort-time-desc","icon-battery-6","icon-battery-0","icon-battery-charging","icon-command","icon-shift","icon-ctrl","icon-opt","icon-checkbox-checked","icon-checkbox-unchecked","icon-checkbox-partial","icon-square","icon-triangle","icon-triangle2","icon-diamond3","icon-diamond4","icon-checkbox-checked2","icon-checkbox-unchecked2","icon-checkbox-partial2","icon-radio-checked","icon-radio-checked2","icon-radio-unchecked","icon-checkmark-circle","icon-circle","icon-circle2","icon-circles","icon-circles2","icon-crop","icon-crop2","icon-make-group","icon-ungroup","icon-vector","icon-vector2","icon-rulers","icon-pencil-ruler","icon-scissors","icon-filter3","icon-filter4","icon-font","icon-ampersand2","icon-ligature","icon-font-size","icon-typography","icon-text-height","icon-text-width","icon-height2","icon-width","icon-strikethrough2","icon-font-size2","icon-bold2","icon-underline2","icon-italic2","icon-strikethrough3","icon-omega","icon-sigma","icon-nbsp","icon-page-break","icon-page-break2","icon-superscript","icon-subscript","icon-superscript2","icon-subscript2","icon-text-color","icon-highlight","icon-pagebreak","icon-clear-formatting","icon-table","icon-table2","icon-insert-template","icon-pilcrow","icon-ltr","icon-rtl","icon-ltr2","icon-rtl2","icon-section","icon-paragraph-left2","icon-paragraph-center2","icon-paragraph-right2","icon-paragraph-justify2","icon-indent-increase","icon-indent-decrease","icon-paragraph-left3","icon-paragraph-center3","icon-paragraph-right3","icon-paragraph-justify3","icon-indent-increase2","icon-indent-decrease2","icon-share","icon-share2","icon-new-tab","icon-new-tab2","icon-popout","icon-embed","icon-embed2","icon-markup","icon-regexp","icon-regexp2","icon-code","icon-circle-css","icon-circle-code","icon-terminal","icon-unicode","icon-seven-segment-0","icon-seven-segment-1","icon-seven-segment-2","icon-seven-segment-3","icon-seven-segment-4","icon-seven-segment-5","icon-seven-segment-6","icon-seven-segment-7","icon-seven-segment-8","icon-seven-segment-9","icon-share3","icon-share4","icon-google","icon-google-plus","icon-google-plus2","icon-google-drive","icon-facebook","icon-facebook2","icon-instagram","icon-twitter","icon-twitter2","icon-feed2","icon-feed3","icon-youtube","icon-youtube2","icon-youtube3","icon-vimeo","icon-vimeo2","icon-lanyrd","icon-flickr","icon-flickr2","icon-flickr3","icon-picassa","icon-picassa2","icon-dribbble","icon-dribbble2","icon-dribbble3","icon-forrst","icon-forrst2","icon-deviantart","icon-deviantart2","icon-steam","icon-steam2","icon-dropbox","icon-onedrive","icon-github","icon-github4","icon-github5","icon-wordpress","icon-wordpress2","icon-joomla","icon-blogger","icon-blogger2","icon-tumblr","icon-tumblr2","icon-yahoo","icon-tux","icon-apple2","icon-finder","icon-android","icon-windows","icon-windows8","icon-soundcloud","icon-soundcloud2","icon-skype","icon-reddit","icon-linkedin","icon-linkedin2","icon-lastfm","icon-lastfm2","icon-delicious","icon-stumbleupon","icon-stumbleupon2","icon-stackoverflow","icon-pinterest2","icon-xing","icon-flattr","icon-foursquare","icon-paypal","icon-paypal2","icon-yelp","icon-file-pdf","icon-file-openoffice","icon-file-word","icon-file-excel","icon-libreoffice","icon-html5","icon-html52","icon-css3","icon-git","icon-svg","icon-codepen","icon-chrome","icon-firefox","icon-IE","icon-opera","icon-safari","icon-check2","icon-home4","icon-people","icon-checkmark-circle2","icon-arrow-up-left32","icon-arrow-up52","icon-arrow-up-right32","icon-arrow-right6","icon-arrow-down-right32","icon-arrow-down52","icon-arrow-down-left32","icon-arrow-left52","icon-calendar5","icon-move-alt1","icon-reload-alt","icon-move-vertical","icon-move-horizontal","icon-hash","icon-bars-alt","icon-eye8","icon-search4","icon-zoomin3","icon-zoomout3","icon-add","icon-subtract","icon-exclamation","icon-question6","icon-close2","icon-task","icon-inbox","icon-inbox-alt","icon-envelope","icon-compose","icon-newspaper2","icon-calendar22","icon-hyperlink","icon-trash","icon-trash-alt","icon-grid5","icon-grid-alt","icon-menu6","icon-list3","icon-gallery","icon-calculator","icon-windows2","icon-browser","icon-portfolio","icon-comments","icon-screen3","icon-iphone","icon-ipad","icon-googleplus5","icon-pin","icon-pin-alt","icon-cog5","icon-graduation","icon-air","icon-droplets","icon-statistics","icon-pie5","icon-cross","icon-minus2","icon-plus2","icon-info3","icon-info22","icon-question7","icon-help","icon-warning2","icon-add-to-list","icon-arrow-left12","icon-arrow-down12","icon-arrow-up12","icon-arrow-right13","icon-arrow-left22","icon-arrow-down22","icon-arrow-up22","icon-arrow-right22","icon-arrow-left32","icon-arrow-down32","icon-arrow-up32","icon-arrow-right32","icon-switch2","icon-checkmark5","icon-ampersand","icon-alert","icon-alignment-align","icon-alignment-aligned-to","icon-alignment-unalign","icon-arrow-down132","icon-arrow-up13","icon-arrow-left13","icon-arrow-right14","icon-arrow-small-down","icon-arrow-small-left","icon-arrow-small-right","icon-arrow-small-up","icon-check","icon-chevron-down","icon-chevron-left","icon-chevron-right","icon-chevron-up","icon-clippy","icon-comment","icon-comment-discussion","icon-dash","icon-diff","icon-diff-added","icon-diff-ignored","icon-diff-modified","icon-diff-removed","icon-diff-renamed","icon-file-media","icon-fold","icon-gear","icon-git-branch","icon-git-commit","icon-git-compare","icon-git-merge","icon-git-pull-request","icon-graph","icon-law","icon-list-ordered","icon-list-unordered","icon-mail5","icon-mail-read","icon-mention","icon-mirror","icon-move-down","icon-move-left","icon-move-right","icon-move-up","icon-person","icon-plus22","icon-primitive-dot","icon-primitive-square","icon-repo-forked","icon-screen-full","icon-screen-normal","icon-sync","icon-three-bars","icon-unfold","icon-versions","icon-x"];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        $pages = Content::where('type', Content::TYPE_PAGE)->get();
        $icons = $this->icomoonIconSet;
        $modulesArray = Menu::select('module')->groupBy('module')->get()->filter(function ($item) {
            return !empty($item->module);
        })->transform(function ($item) {
            return $item->module;
        })->toArray();

        return view('admin.menus.index', ['menus' => $menus, 'pages' => $pages, 'icons' => $icons, 'modulesArray' => $modulesArray]);
    }

    public function subtree($id)
    {
        $output = [];
        $menus = Menu::where('parent_id', $id)->orderBy('order', 'asc')->get();
        foreach($menus as $key => $value)
        {
            $menu = (object)[];
            $menu->id = $value["id"];
            $menu->title = $value["title"];
            $menu->link = $value["link"];
            $menu->icon = $value["icon"];
            $menu->module = $value["module"];

            $menu->children = $this->subtree($value["id"]);

            $output[$key] = $menu;
        }
        return $output;
    }

    public function tree(Request $request)
    {
        $parent_id = $request->input('parent_id', null);
        $output = $this->subtree($parent_id);
        return response()->json($output);
    }

    public function updateTree(Request $request)
    {
        $request->validate([
            'mode' => 'required|in:before,after',
            'node' => 'required|exists:menus,id',
            'other' => 'required|exists:menus,id'
        ]);

        $mode = $request->input('mode');
        $node = $request->input('node');
        $other = $request->input('other');

        $updated = null;

        try {
            if ($mode == 'before') {
                $updated = $this->updateOrderBefore($node, $other);
            } else if ($mode == 'after') {
                $updated = $this->updateOrderAfter($node, $other);
            }
        } catch (Exception $ex) {
            abort(500);
        }

        if (is_null($updated)) {
            abort(500);
        }

        return response()->json($updated);
    }

    private function updateOrderBefore($node, $other)
    {
        $nodeMenu = Menu::find($node);
        $otherMenu = Menu::find($other);

        if ($nodeMenu->parent_id != $otherMenu->parent_id) {
            $nodeMenu->parent_id = $otherMenu->parent_id;
        }

        $nodeMenu->order = $otherMenu->order - 1;
        $nodeMenu->save();

        $menus = Menu::where('parent_id', $otherMenu->parent_id)->orderBy('order', 'asc')->get();
        foreach ($menus as $index => $menu) {
            $menu->order = $index + 1;
            $menu->save();
        }

        return $nodeMenu;
    }

    private function updateOrderAfter($node, $other)
    {
        $nodeMenu = Menu::find($node);
        $otherMenu = Menu::find($other);

        if ($nodeMenu->parent_id != $otherMenu->parent_id) {
            $nodeMenu->parent_id = $otherMenu->parent_id;
        }

        $nodeMenu->order = $otherMenu->order + 1;
        $nodeMenu->save();

        $menus = Menu::where('parent_id', $otherMenu->parent_id)->orderBy('order', 'asc')->get();
        foreach ($menus as $index => $menu) {
            $menu->order = $index + 1;
            $menu->save();
        }

        return $nodeMenu;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        $pages = Content::where('type', Content::TYPE_PAGE)->get();
        $icons = $this->icomoonIconSet;
        return view('admin.menus.create', ['menus' => $menus, 'pages' => $pages, 'icons' => $icons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:191',
            'link' => 'nullable|max:255',
            'icon' => 'nullable|max:50',
            'module' => 'nullable|max:100',
            'parent_id' => 'nullable|integer|exists:menus,id'
        ]);

        $parentId = $request->input('parent_id', null);

        $lastMenuFromParent = Menu::where('parent_id', $parentId)->orderBy('order', 'desc')->first();
        $parentMenu = $request->has('parent_id') ? Menu::find($parentId) : null;
        $order = $lastMenuFromParent ? $lastMenuFromParent->order + 1 : 1;
        $sublevel = $parentMenu ? $parentMenu->sublevel + 1 : 1;

        $menu = new Menu();
        $menu->title = $request->input('title');
        $menu->link = $request->input('link');
        $menu->icon = $request->input('icon');
        $menu->module = $request->input('module');
        $menu->parent_id = $parentId;
        $menu->order = $order;
        $menu->sublevel = $sublevel;

        $menu->save();

        if ($request->ajax()) {
            return response()->json($menu);
        } else {
            return redirect()->route('admin.menus.index')->with('status', 'Success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        if ($request->ajax()) {
            return response()->json($menu);
        } else {
            return view('admin.menus.show', ['menu' => $menu]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $menus = Menu::all();

        $menu = Menu::find($id);
        return view('admin.menus.edit', ['menu' => $menu, 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $menus = Menu::find($id);
        // $menu = new menu;
        $request->validate([
            'title' => 'required|max:191',
            'link' => 'nullable|max:255',
            'icon' => 'nullable|max:50',
            'parent_id' => 'nullable|integer|exists:menus,id'
        ]);

        $menu = Menu::findOrFail($id);

        $menu->title = $request->input('title');

        if ($request->has('link')) {
            $menu->link = $request->input('link');
        }
        if ($request->has('icon')) {
            $menu->icon = $request->input('icon');
        }
        if ($request->has('order')) {
            $menu->order = $request->input('order');
        }
        if ($request->has('sublevel')) {
            $menu->sublevel = $request->input('sublevel');
        }
        if ($request->has('parent_id')) {
            $menu->parent_id = $request->input('parent_id');
        }

        $menu->save();

        if ($request->ajax()) {
            return response()->json($menu);
        } else {
            return redirect()->route('admin.menus.edit', ['id' => $menu->id])->with('status', 'Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Menu::where('parent_id', $id)->delete();
        Menu::destroy($id);

        return redirect()->route('admin.menus.index');
    }
}
