<?php

function system_asset(string $string)
{
    $name = $string;
    if (substr($string, 0, 1) == '/' || substr($string, 0, 1) == '\\') {
        $name = DIRECTORY_SEPARATOR . substr($string, 1);
    } else {
        $name = DIRECTORY_SEPARATOR . $string;
    }
    $path = 'system' . $name;
    return asset($path);
}

function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function put_string_between($string, $start, $end, $replacement)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;

    $part1 = substr($string, 0, $ini);
    $part2 = substr($string, $len);
    return $part1 . $replacement . $part2;
}

function get_blade_section(string $path, string $section)
{
    $contents = file_get_contents($path);
    $sectionNameStart = "@section('".$section."')";
    $sectionNameEnd = "@endsection";

    return get_string_between($contents, $sectionNameStart, $sectionNameEnd);
}

function put_blade_section(string $path, string $section, $replacement)
{
    $contents = file_get_contents($path);
    $sectionNameStart = "@section('".$section."')";
    $sectionNameEnd = "@endsection";

    return put_string_between($contents, $sectionNameStart, $sectionNameEnd, '\\n' . $replacement . '\\n');
}

function numerizePrice($value) {
    $value = floatval($value);
    if ($value < 1000) {
        return round($value, 2);
    } else if ($value < 1000000) {
        return round(($value / 1000), 0) . ' мянга';
    } else {
        return round(($value / 1000000), 2) . ' сая';
    }
}

function getDateFromDatetime($value) {
    if ($value) {
        $value = new DateTime($value);
        return $value->format('Y-m-d');
    }
    return $value;
}

function getMetasValue($metas, $key) {
    foreach($metas as $meta){
        if($meta->key==$key){
            return $meta->value;
        }
    }
}

function isPremium($car) {
    return
        $car->type == App\Content::TYPE_CAR &&
        $car->status == App\Content::STATUS_PUBLISHED &&
        $car->visibility == App\Content::VISIBILITY_PUBLIC &&
        $car->metaValue('publishVerified') == True &&
        $car->metaValue('publishVerifiedEnd') >= now() &&
        ($car->metaValue('publishType') == 'best_premium' || $car->metaValue('publishType') == 'premium');
        // ($car->metaValue('publishType') == 'premium');
}

function metaHas($items, $key, $value, $operator = '=', $min = Null, $max = Null) {
    return $items->whereHas('metas', function ($query) use ($key, $value, $operator, $min, $max) {
        $query->where('key', $key);
        if ($operator == 'in') {
            $query->whereIn('value', explode('|', $value));
        } else if ($operator == 'not in') {
            $query->whereNotIn('value', explode('|', $value));
        } else if ($operator == 'range'){
            if ($min != Null) {
                $query->whereRAW('cast(value as unsigned) >= ' .$min);
            }
            if ($max != Null) {
                $query->whereRAW('cast(value as unsigned) <= ' .$max);
            }
        } else if (is_array($value)){
            $query->whereIn('value', $value);
        } else {
            $query->where('value', $operator, $value);
        }
    });
}

function getTaxonomyCount($taxonomy, $items, $request) {
    $count = $taxonomy->count;
    if ($taxonomy->term->group) {
        $count = metaHas(\Modules\Car\Entities\Car::filter(clone $items, $request, $taxonomy->term->group->metaValue('metaKey')), $taxonomy->term->group->metaValue('metaKey'), $taxonomy->term->name)->count();
    }
    return $count;
}

function countModel($items) {
    $items->join('content_metas', function($join) {
        $join->on('contents.id', '=', 'content_metas.content_id');
        $join->where('content_metas.key', '=', 'modelName');
    });
    $items = $items->select('contents.*', 'content_metas.value');
    $items = $items->groupBy('value');
    dd($items->get());

}

function format_phone($phone) {
    $phone = trim($phone);
    $phone = str_replace(' ', '', $phone);
    $phone = str_replace('+', '', $phone);

    // add logic to correctly format number here
    // a more robust ways would be to use a regular expression
    return "(".substr($phone, 0, 3).") ".substr($phone, 3, 4)." ".substr($phone, 7);
}

function getMimeType($r, $t='file') {
    //Returns the Mime Type of a file or a string content - from: https://coursesweb.net/
    // $r = the resource: Path to the file; Or the String content
    // $t = type of the resource, needed to be specified as "str" if $r is a string-content
    $finfo = new \finfo(FILEINFO_MIME_TYPE);
    return ($t =='str') ? $finfo->buffer($r) : $finfo->file($r);
}

function mime2ext($mime){
    $all_mimes = '{"png":["image\/png","image\/x-png"],"bmp":["image\/bmp","image\/x-bmp","image\/x-bitmap","image\/x-xbitmap","image\/x-win-bitmap","image\/x-windows-bmp","image\/ms-bmp","image\/x-ms-bmp","application\/bmp","application\/x-bmp","application\/x-win-bitmap"],"gif":["image\/gif"],"jpeg":["image\/jpeg","image\/pjpeg"],"xspf":["application\/xspf+xml"],"vlc":["application\/videolan"],"wmv":["video\/x-ms-wmv","video\/x-ms-asf"],"au":["audio\/x-au"],"ac3":["audio\/ac3"],"flac":["audio\/x-flac"],"ogg":["audio\/ogg","video\/ogg","application\/ogg"],"kmz":["application\/vnd.google-earth.kmz"],"kml":["application\/vnd.google-earth.kml+xml"],"rtx":["text\/richtext"],"rtf":["text\/rtf"],"jar":["application\/java-archive","application\/x-java-application","application\/x-jar"],"zip":["application\/x-zip","application\/zip","application\/x-zip-compressed","application\/s-compressed","multipart\/x-zip"],"7zip":["application\/x-compressed"],"xml":["application\/xml","text\/xml"],"svg":["image\/svg+xml"],"3g2":["video\/3gpp2"],"3gp":["video\/3gp","video\/3gpp"],"mp4":["video\/mp4"],"m4a":["audio\/x-m4a"],"f4v":["video\/x-f4v"],"flv":["video\/x-flv"],"webm":["video\/webm"],"aac":["audio\/x-acc"],"m4u":["application\/vnd.mpegurl"],"pdf":["application\/pdf","application\/octet-stream"],"pptx":["application\/vnd.openxmlformats-officedocument.presentationml.presentation"],"ppt":["application\/powerpoint","application\/vnd.ms-powerpoint","application\/vnd.ms-office","application\/msword"],"docx":["application\/vnd.openxmlformats-officedocument.wordprocessingml.document"],"xlsx":["application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application\/vnd.ms-excel"],"xl":["application\/excel"],"xls":["application\/msexcel","application\/x-msexcel","application\/x-ms-excel","application\/x-excel","application\/x-dos_ms_excel","application\/xls","application\/x-xls"],"xsl":["text\/xsl"],"mpeg":["video\/mpeg"],"mov":["video\/quicktime"],"avi":["video\/x-msvideo","video\/msvideo","video\/avi","application\/x-troff-msvideo"],"movie":["video\/x-sgi-movie"],"log":["text\/x-log"],"txt":["text\/plain"],"css":["text\/css"],"html":["text\/html"],"wav":["audio\/x-wav","audio\/wave","audio\/wav"],"xhtml":["application\/xhtml+xml"],"tar":["application\/x-tar"],"tgz":["application\/x-gzip-compressed"],"psd":["application\/x-photoshop","image\/vnd.adobe.photoshop"],"exe":["application\/x-msdownload"],"js":["application\/x-javascript"],"mp3":["audio\/mpeg","audio\/mpg","audio\/mpeg3","audio\/mp3"],"rar":["application\/x-rar","application\/rar","application\/x-rar-compressed"],"gzip":["application\/x-gzip"],"hqx":["application\/mac-binhex40","application\/mac-binhex","application\/x-binhex40","application\/x-mac-binhex40"],"cpt":["application\/mac-compactpro"],"bin":["application\/macbinary","application\/mac-binary","application\/x-binary","application\/x-macbinary"],"oda":["application\/oda"],"ai":["application\/postscript"],"smil":["application\/smil"],"mif":["application\/vnd.mif"],"wbxml":["application\/wbxml"],"wmlc":["application\/wmlc"],"dcr":["application\/x-director"],"dvi":["application\/x-dvi"],"gtar":["application\/x-gtar"],"php":["application\/x-httpd-php","application\/php","application\/x-php","text\/php","text\/x-php","application\/x-httpd-php-source"],"swf":["application\/x-shockwave-flash"],"sit":["application\/x-stuffit"],"z":["application\/x-compress"],"mid":["audio\/midi"],"aif":["audio\/x-aiff","audio\/aiff"],"ram":["audio\/x-pn-realaudio"],"rpm":["audio\/x-pn-realaudio-plugin"],"ra":["audio\/x-realaudio"],"rv":["video\/vnd.rn-realvideo"],"jp2":["image\/jp2","video\/mj2","image\/jpx","image\/jpm"],"tiff":["image\/tiff"],"eml":["message\/rfc822"],"pem":["application\/x-x509-user-cert","application\/x-pem-file"],"p10":["application\/x-pkcs10","application\/pkcs10"],"p12":["application\/x-pkcs12"],"p7a":["application\/x-pkcs7-signature"],"p7c":["application\/pkcs7-mime","application\/x-pkcs7-mime"],"p7r":["application\/x-pkcs7-certreqresp"],"p7s":["application\/pkcs7-signature"],"crt":["application\/x-x509-ca-cert","application\/pkix-cert"],"crl":["application\/pkix-crl","application\/pkcs-crl"],"pgp":["application\/pgp"],"gpg":["application\/gpg-keys"],"rsa":["application\/x-pkcs7"],"ics":["text\/calendar"],"zsh":["text\/x-scriptzsh"],"cdr":["application\/cdr","application\/coreldraw","application\/x-cdr","application\/x-coreldraw","image\/cdr","image\/x-cdr","zz-application\/zz-winassoc-cdr"],"wma":["audio\/x-ms-wma"],"vcf":["text\/x-vcard"],"srt":["text\/srt"],"vtt":["text\/vtt"],"ico":["image\/x-icon","image\/x-ico","image\/vnd.microsoft.icon"],"csv":["text\/x-comma-separated-values","text\/comma-separated-values","application\/vnd.msexcel"],"json":["application\/json","text\/json"]}';
    $all_mimes = json_decode($all_mimes,true);
    foreach ($all_mimes as $key => $value) {
        if(array_search($mime,$value) !== false) return $key;
    }
    return false;
}
