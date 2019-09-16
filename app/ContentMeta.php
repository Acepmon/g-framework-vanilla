<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentMeta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'content_metas';

    public $timestamps = false;

    const NAMING_CONVENTION = \App\Content::NAMING_CONVENTION;

    public const MOBILE_WIDTH = 640;
    public const MOBILE_HEIGHT = 360;
    public const WEB_WIDTH = 1920;
    public const WEB_HEIGHT = 1080;

    const MODEL_ARRAY = ['4Runner', 'Allion', 'Alphard', 'Aqua', 'Auris', 'Avensis', 'Belta', 'Brevis', 'Camry', 'Carina', 'Chaser', 'Corolla', 'Corolla Axio', 'Corolla Fielder', 'Corolla Rumion', 'Corolla Runx','Corolla Spacio', 'Crown-150', 'Crown-170', 'Crown-180', 'Crown-200', 'Crown Majesta', 'Estima', 'Fortuner', 'Gaia', 'Harrier', 'Hiace', 'Highlander', 'Hilux', 'Ipsum', 'Isis', 'Ist', 'Kluger', 'Land Cruiser-100', 'Land Cruiser-105', 'Land Cruiser-200', 'Land Cruiser-70', 'Land Cruiser-80', 'Land Cruiser Cygnus', 'Land Cruiser Prado-120', 'Land Cruiser Prado-150', 'Land Cruiser Prado-95', 'Mark2-100', 
        'Mark2-110', 'Mark X', 'Mark X Zio', 'Noah', 'Passo', 'Passo Settle', 'Premio', 'Prius-10', 'Prius-11', 'Prius-20', 'Prius-30', 'Prius-41 Alpha', 'Probox', 'Progres', 'Ractis', 'Raum','Rav4', 'Rush', 'Sai', 'Sienta', 'Succeed', 'Tacoma', 'Tundra', 'Vanguard', 'Vellfire', 'Venza', 'Verossa', 'Vitz', 'Voxy', 'Wish'];

    const TYPE_ARRAY = [
        self::TYPE_PAGE,
        self::TYPE_POST,
        self::TYPE_CAR
    ];

    public function content()
    {
        return $this->belongsTo('App\Content', 'content_id');
    }

    public function revisionView()
    {
        $revision_value = json_decode($this->value);
        return $revision_value->after->slug . self::NAMING_CONVENTION . $this->content->status . self::NAMING_CONVENTION . $revision_value->datetime;
    }
}
