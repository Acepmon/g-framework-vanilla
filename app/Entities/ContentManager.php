<?php

namespace App\Entities;

use App\Content;
use App\ContentMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Content\Transformers\Content as ContentResource;

class ContentManager extends Manager
{
    //

    /**
     * Inserts meta to content
     * Does not care about if key exists or not
     * Can support array as value
     */
    public static function addMeta($content_id, $key, $value)
    {
        if ($value) {
            if (is_array($value)) {
                foreach ($value as $v) {
                    self::addMeta($content_id, $key, $v);
                }
            } else {
                $meta = new ContentMeta;
                $meta->content_id = $content_id;
                $meta->key = $key;
                $meta->value = $value;
                $meta->save();
            }
        }
    }

    /**
     * @parameter value = Old Value
     * @paremeter newValue = New value
     * Updates all metas matching key, value pair
     * @return meta if successful, error message if fail
     */
    public static function updateMeta($content_id, $key, $value, $newValue)
    {
        if ($newValue) {
            $metas = ContentMeta::where([['content_id', $content_id], ['key', $key], ['value', $value]])->get();
            $result = null;
            foreach ($metas as $meta) {
                if ($meta) {
                    if (is_array($newValue)) {
                        $meta->delete();
                        self::addMeta($content_id, $key, $newValue);
                    } else {
                        $meta->value = $newValue;
                        $meta->save();
                    }
                    $result = $meta;
                }
            }
            if ($result) {
                return $result;
            }

        }
        return ["error" => "No such meta found"];
    }

    /**
     * Deletas ALL content meta
     * @return meta if successful, error message if fail
     */
    public static function deleteMeta($content_id, $key, $value)
    {
        if ($value) {
            if (is_array($value)) {
                foreach ($value as $v) {
                    self::deleteMeta($content_id, $key, $v);
                }
            } else {
                $metas = ContentMeta::where([['content_id', $content_id], ['key', $key], ['value', $value]])->get();
                $metas->each->delete();
            }
        }
    }

    /**
     * Sync content metas
     * @input array of meta key, value pairs
     * Replace all values
     * @return meta if successful, error message if fail
     */
    public static function syncMetas($content_id, $metas)
    {
        try {
            DB::beginTransaction();
            foreach ($metas as $key => $value) {
                $oldMetas = ContentMeta::where([['content_id', $content_id], ['key', $key]]);
                if (is_array($value)) {
                    foreach ($oldMetas->get() as $meta) {
                        if (in_array($meta->value, $value)) {
                            $value = array_diff($value, [$meta->value]);
                        } else {
                            self::deleteMeta($content_id, $key, $meta->value);
                        }
                    }
                    foreach ($value as $v) {
                        self::addMeta($content_id, $key, $v);
                    }
                } else {
                    if ($oldMetas->first()) {
                        self::updateMeta($content_id, $key, $oldMetas->first()->value, $value);
                    } else {
                        self::addMeta($content_id, $key, $value);
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Mass add metas
     */
    public static function attachMetas($content_id, $metas)
    {
        try {
            DB::beginTransaction();
            foreach ($metas as $key => $value) {
                self::addMeta($content_id, $key, $value);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Mass delete metas
     */
    public static function detachMetas($content_id, $metas)
    {
        try {
            DB::beginTransaction();
            foreach ($metas as $key => $value) {
                if (is_array($value)) {
                    self::deleteMeta($content_id, $key, $value);

                } else {
                    self::deleteMeta($content_id, $key, $value);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Filter & Serialize mixed request of Content and ContentMetas to Content Object with ContentMeta subarray
     * @return Paginated Content
     */
    public static function serializeRequest(Request $request)
    {
        $type = $request->input('type', Content::TYPE_POST);
        $status = $request->input('status', Content::STATUS_PUBLISHED);
        $visibility = $request->input('visibility', Content::VISIBILITY_PUBLIC);
        $limit = $request->input('limit', 10);

        $metaInputs = self::discernMetasFromRequest($request->input());

        $contents = Content::where('type', $type)->where('status', $status)->where('visibility', $visibility);

        if ($request->has('author_id')) {
            $contents = $contents->where('author_id', $request->input('author_id'));
        }

        if (count($metaInputs) > 0) {
            $contents = $contents->whereHas('metas', function ($query) use ($metaInputs) {
                foreach ($metaInputs as $key => $value) {
                    $query->where('key', $key);
                    $query->where('value', $value);
                }
            });
        }

        $contents = $contents->paginate($limit);
        return $contents;
    }

    /**
     * Used to discern content metas from attributes of Content Model.
     * @return ContentMeta array, consisting of key, value pairs
     */
    public static function discernMetasFromRequest($input)
    {
        $inputExcept = ['title', 'slug', 'content', 'type', 'status', 'visibility', 'limit', 'page', 'author_id', '_token'];
        $metaInputs = array_filter($input, function ($key) use ($inputExcept) {
            return !in_array($key, $inputExcept);
        }, ARRAY_FILTER_USE_KEY);
        return $metaInputs;
    }

    /**
     * Transform Content to json-ready array
     * Can take additional parameters to merge
     * @return content array
     */
    public static function contentToArray(Content $content, $additional = null)
    {
        $result = new ContentResource($content);
        if ($additional) {
            $result = array_merge($result->toArray(request()), $additional);
        }
        return $result;
    }
}
