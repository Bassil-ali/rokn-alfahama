<?php

namespace App\Http\Controllers;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MediaController extends BaseController
{

    public static function routeName(){
        return Str::snake("Media");
    }
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
    public function index(Request $request)
    {
        return MediaResource::collection(Media::search($request)->sort($request)->paginate((request('per_page')??request('itemsPerPage'))??15));
    }
    public function store(Request $request)
    {
        if(!$this->user->is_permitted_to('store',Media::class,$request))
            return response()->json(['message'=>'not_permitted'],422);

        $validator = Validator::make($request->all(),Media::createRules($this->user));
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()],422);
        }
        $media = Media::create($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $media->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new MediaResource($media);
    }
    public function show(Request $request,Media $media)
    {
        if(!$this->user->is_permitted_to('view',Media::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        return new MediaResource($media);
    }
    public function update(Request $request, Media $media)
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
    public function destroy(Request $request,Media $media)
    {
        if(!$this->user->is_permitted_to('delete',Media::class,$request))
            return response()->json(['message'=>'not_permitted'],422);
        $media->delete();

        return new MediaResource($media);
    }
}
