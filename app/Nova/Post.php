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
use Spatie\TagsField\Tags;
use Laravel\Nova\Fields\File;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Post';

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
        'views',
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
                     Images::make(__('Image mise en avant'), 'banner')->croppable(true)->rules('required', 'max:4096')
                     ->setFileName(function ($originalFilename, $extension, $model) {
                         return md5($originalFilename) . '.' . $extension;
                     })->setName(function ($originalFilename, $model) {
                         return md5($originalFilename);
                     })->withResponsiveImages(),
                     Files::make(__('Document joint'), 'file')->help(
                         'Document PDF uniquement'
                     )->rules('max:16900')->setFileName(function ($originalFilename, $extension, $model) {
                         return md5($originalFilename) . '.' . $extension;
                     })->setName(function ($originalFilename, $model) {
                         return md5($originalFilename);
                     }),
                     BelongsTo::make('Catégorie', 'category', Category::class)
                         ->sortable()
                         ->rules(['required']),
                     SluggableText::make(__('Titre'), 'title')
                         ->sortable()
                         ->rules(['required'])
                         ->creationRules('unique:posts,title')
                         ->updateRules('unique:posts,title,{{resourceId}}'),
                     Slug::make('Slug')->slugUnique()
                         ->slugModel('App\Post'),
                     Markdown::make('Résumé', 'Summary')->hideFromIndex()->help(
                         'S\'affiche dans la page d\'accueil et dans la page de catégorie de l\'article'
                     ),
                     Tags::make('Tags'),
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
                     DateRange::make('Date(s) de l\'événement', ['from', 'to'])->help(
                         'N\'apparait que pour les événements'
                     ),
                     Boolean::make(__('Mis en avant'), 'featured')->sortable(),
                     Boolean::make(__('Publié'), 'published')->sortable(),
	             File::make('Video')
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
        return __('Articles');
    }
    public static function singularLabel()
    {
        return __('Article');
    }
}
