<?php


namespace App\Traits;


use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait HasUuid
{
    /**
     * Override the boot function
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = Controller::uuid();
        });
    }

    /**
     * Get the route key for the model
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * @param Model $model
     * @param Request $request
     * @param string $slugSource
     * @param string $idSource
     * @return bool
     */
    public static function adjustShowUrlSlug(Model $model, Request $request, string $slugSource = 'title', string $idSource = 'uuid') : bool
    {
        $explodedUrl = explode('/', urldecode($request->getRequestUri()));
        $slugAndUuid = $explodedUrl[count($explodedUrl) - 1];
        $slug = strstr($slugAndUuid, '-' . $model->{$idSource}, 1);

        return $slug !== self::slugify($model->{$slugSource});
    }

    /**
     * Generate slug string from text
     *
     * @param string $text
     * @return string
     */
    static function slugify(string $text): string
    {
        $text = trim(strtolower($text), '-');

        return trim(preg_replace('#(\p{P}|\p{C}|\p{S}|\p{Z})+#u', '-', $text), '-');
    }
}
