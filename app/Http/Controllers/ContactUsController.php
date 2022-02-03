<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class ContactUsController extends BaseController
{
    public static function routeName()
    {
        return  "contact";
    }
    public $childRelationName;
    public function __construct(Request $request)
    {
        // parent::__construct($request);
        // $this->childRelationName = Pluralizer::plural(Str::snake(array_slice(explode('\\', ContactUs::class), -1)[0]));
        // $this->middleware('auth:api', ['except' => ['index', 'show' , ]]);
    }
    public function index(Request $request)
    {

        return ContactUsResource::collection(ContactUs::search($request)->sort($request)->paginate((request('per_page') ?? request('itemsPerPage')) ?? 15));
    }
    public function store(Request $request)
    {
        // if (!$this->user->is_permitted_to('store', ContactUs::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);

        $validator = Validator::make($request->all(), ContactUs::createRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $contactUs = ContactUs::create($validator->validated());

        return new ContactUsResource($contactUs);
    }
    public function show(Request $request, $contactUs_id)
    {

        $contactUs = ContactUs::find($contactUs_id);
        // if (!$this->user->is_permitted_to('view', ContactUs::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
        return new ContactUsResource($contactUs);
    }
    public function update(Request $request, User $user, ContactUs $contactUs)
    {
        // if (!$this->user->is_permitted_to('update', ContactUs::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
        $validator = Validator::make($request->all(), ContactUs::updateRules($this->user));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $contactUs->update($validator->validated());
        if ($request->translations) {
            foreach ($request->translations as $translation)
                $contactUs->setTranslation($translation['field'], $translation['locale'], $translation['value'])->save();
        }
        return new ContactUsResource($contactUs);
    }

    public function destroy(Request $request, User $user, ContactUs $contactUs)
    {
        // if (!$this->user->is_permitted_to('delete', ContactUs::class, $request))
        //     return response()->json(['message' => 'not_permitted'], 422);
        $contactUs->delete();
        return new ContactUsResource($contactUs);
    }
}
