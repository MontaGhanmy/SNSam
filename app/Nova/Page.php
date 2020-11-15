<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Drobee\NovaSluggable\SluggableText;
use Drobee\NovaSluggable\Slug;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\BelongsTo;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Boolean;
use Kpolicar\DateRange\DateRange;

class Page extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Page';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'slug',
        'title',
        'summary',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
                     ID::make()->sortable(),
                     BelongsTo::make(__('Auteur'), 'author', User::class)
                         ->sortable()
                         ->rules(['required']),
                     Images::make(__('Image mise en avant'), 'banner')->croppable(true)->rules('required', 'max:4096')
                     ->setFileName(function ($originalFilename, $extension, $model) {
                         return md5($originalFilename) . '.' . $extension;
                     })->setName(function ($originalFilename, $model) {
                         return md5($originalFilename);
                     })->withResponsiveImages(),
                     SluggableText::make(__('Titre'), 'title')
                         ->sortable()
                         ->rules(['required']),
                     Slug::make('Slug')->slugUnique()
                         ->slugModel('App\Page'),
                     Markdown::make('Résumé', 'Summary')->hideFromIndex(),
                     NovaTinyMCE::make(__('Contenu'), 'body')->options([
                      'plugins' => [
                          'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                          'searchreplace wordcount visualblocks visualchars code fullscreen',
                          'insertdatetime media nonbreaking save table contextmenu directionality',
                          'emoticons template paste textcolor colorpicker textpattern'
                      ],
                      'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                      'use_lfm' => true
                      ])->rules(['required', 'string'])->hideFromIndex(),
                     Boolean::make(__('Publié'), 'Published', function () {
                         return $this->published;
                     })->exceptOnForms(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
    public static function label()
    {
        return __('Pages');
    }
    public static function singularLabel()
    {
        return __('Page');
    }
}
