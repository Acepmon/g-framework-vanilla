<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Config;
use File;

class Theme extends Model
{
    const AVAILABLE = 'available';
    const DOWNLOADING = 'downloading';
    const INSTALLING = 'installing';
    const INSTALLED = 'installed';
    const ACTIVATED = 'activated';
    const DEACTIVATED = 'deactivated';
    const FAILED = 'failed';
    const UPDATING = 'updating';
    const UNINSTALLED = 'uninstalled';

    const STATUS_ARRAY = [
        self::AVAILABLE,
        self::DOWNLOADING,
        self::INSTALLING,
        self::INSTALLED,
        self::ACTIVATED,
        self::DEACTIVATED,
        self::FAILED,
        self::UPDATING,
        self::UNINSTALLED
    ];

    public function layouts() {
        $layouts = [];
        $path = config('system.themes.viewPath');
        $fullPath = $path . DIRECTORY_SEPARATOR . $this->package . DIRECTORY_SEPARATOR . 'layouts';
        if (File::exists($fullPath)) {
            foreach(File::files($fullPath) as $path) {
                array_push($layouts, [
                    'text' => str_replace('.blade.php', '', $path->getFilename()),
                    'theme_id' => $this->id,
                    'value' => 'themes.' . $this->package . '.layouts.' . str_replace('.blade.php', '', $path->getFilename()),
                    'fullPath' => $fullPath . DIRECTORY_SEPARATOR . $path->getFilename()
                ]);
            }
        }
        return $layouts;
    }

    public function includes() {
        $includes = [];
        $path = config('system.themes.viewPath');
        $fullPath = $path . DIRECTORY_SEPARATOR . $this->package . DIRECTORY_SEPARATOR . 'includes';
        if (File::exists($fullPath)) {
            foreach(File::files($fullPath) as $path) {
                array_push($includes, [
                    'text' => str_replace('.blade.php', '', $path->getFilename()),
                    'theme_id' => $this->id,
                    'value' => 'themes.' . $this->package . '.includes.' . str_replace('.blade.php', '', $path->getFilename()),
                    'fullPath' => $fullPath . DIRECTORY_SEPARATOR . $path->getFilename()
                ]);
            }
        }
        return $includes;
    }
}
