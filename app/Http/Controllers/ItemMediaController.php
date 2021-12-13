<?php

namespace App\Http\Controllers;

use App\Http\Resources\MediaResource;
use App\Models\Item;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class ItemMediaController extends BaseController
{
    public static function routeName(){
        return "item.media";
    }
    public $childRelationName; 
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->childRelationName = 'media';
    }
    public function index(Request $request,Item $item)
    {
        $childRelationName = $this->childRelationName;
        return MediaResource::collection($item->$childRelationName()->search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request, Item $item)
    {
        if(!$this->user->is_permitted_to('store',Media::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Media::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $arr = $validator->validated();
        unset($arr['file']);
        $file= $request->file('file');
        $path = $file->store(
            'media',
            'public'
        );
        $arr += ['path' => $path,'mimetype'=>$file->getExtension()];
        $media = Media::create($arr);
        $childRelationName = $this->childRelationName;
        $item->$childRelationName()->save($media);
        return new MediaResource($media);
    }
    public function show(Request $request,Item $item, Media $media)
    {
        if(!$this->user->is_permitted_to('view',Media::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new MediaResource($media);
    }
    public function update(Request $request, Item $item, Media $media)
    {
        if(!$this->user->is_permitted_to('update',Media::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $validator = Validator::make($request->all(),Media::updateRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $media->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $media->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new MediaResource($media);

    }

    public function destroy(Request $request,Item $item, Media $media)
    {
        if(!$this->user->is_permitted_to('delete',Media::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $media->delete();
        return new MediaResource($media);
    }
}
