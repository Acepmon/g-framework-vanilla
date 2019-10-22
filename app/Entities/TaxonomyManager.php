<?php

namespace App\Entities;

use App\TermTaxonomy;
use App\Term;
use App\TermMeta;

class TaxonomyManager extends Manager
{
    /**
     * Creates or modifies a taxonomy object.
     *
     * @parameter $term  = (string) (Required) Term name, it is the default display name.
     * @parameter $taxonomy = (string) (Required) Taxonomy key, must not exceed 32 characters.
     * @parameter $parent_id = (integer) (Optional) Taxonomy parent taxonomy key.
     * @parameter $args = (array|string) (Optional) Array or query string of arguments for registering a taxonomy.
     */
    public static function register($term, $taxonomy, $parent_id = null, $args = array())
    {
        $termTaxonomy = TermTaxonomy::where('taxonomy', $taxonomy)->whereHas('term', function ($query) use ($term) {
            $query->where('name', $term);
        })->first();

        if ($termTaxonomy == null) {
            $term = self::createTerm($term, $parent_id);
            self::saveTermMetas($term->id, $args);
            $termTaxonomy = self::createTaxonomy($term->id, $taxonomy, $parent_id);
        }

        return $termTaxonomy;
    }

    public static function collection($taxonomy)
    {
        $taxonomies = TermTaxonomy::where('taxonomy', $taxonomy)->get();
        return $taxonomies;
    }

    public static function createTerm($name, $group_id = null)
    {
        $term = new Term();
        $term->name = $name;
        $term->slug = \Str::slug($name);
        $term->group_id = $group_id;
        $term->save();

        return $term;
    }

    public static function createTaxonomy($term_id, $taxonomy, $parent_id = null, $description = null)
    {
        $termTaxonomy = new TermTaxonomy();
        $termTaxonomy->term_id = $term_id;
        $termTaxonomy->taxonomy = strtolower($taxonomy);
        $termTaxonomy->parent_id = $parent_id;
        $termTaxonomy->description = $description;
        $termTaxonomy->count = 0;
        $termTaxonomy->save();

        return $termTaxonomy;
    }

    public static function saveTermMetas($term_id, $metas = array())
    {
        $term = Term::findOrFail($term_id);

        if (count($metas) > 0) {
            foreach ($metas as $key => $value) {
                $term->metas()->save(new TermMeta(['key' => $key, 'value' => $value]));
            }
        }

        return $term->metas;
    }

    public static function updateTaxonomyCount($taxonomy_id)
    {
        $termTaxonomy = TermTaxonomy::findOrFail($taxonomy_id);
        $termTaxonomy->count = $termTaxonomy->contents->count();
        $termTaxonomy->save();
    }

    public static function updateTaxonomyChildrenSlugs($taxonomy_id)
    {
        $parent = TermTaxonomy::findOrFail($taxonomy_id);
        $childs = TermTaxonomy::where('parent_id', $taxonomy_id)->get();
        foreach ($childs as $key => $child) {
            $term = $child->term;
            $term->slug = $parent->term->slug . '/' . $term->slug;
            $term->save();
        }
    }

    public static function findTerm($term)
    {
        $term = Term::where('name', $term)->firstOrFail();
        return $term;
    }

    public static function findTaxonomy($taxonomy)
    {
        $taxonomy = TermTaxonomy::where('taxonomy', $taxonomy)->firstOrFail();
        return $taxonomy;
    }

    public static function updateCount($key, $value)
    {
        $term = self::findTerm($value);
        $parent_term = Term::findOrFail($term->group_id);
        $metaKey = $parent_term->metaValue('metaKey');
        if ($key == $metaKey) {
            
        }
        // $taxonomy = TermTaxonomy::where('');
        // $key = $taxonomy->term()->metaValue('metaKey');
        // $value = '';
        // Content::whereHas('metas', function ($query) use ($key, $value) {
        //     $query->where('key', $key);
        //     $query->where('value', $value);
        // });
        // $count = count();
        // $taxonomy->count = $count;
    }
}
