<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingController extends Controller
{
    public function destroyMedia($modelName, $id)
    {
        if (! file_exists(app_path("Models/$modelName.php"))) {
            return response()->json(['message' => 'Model not found'], 404);
        }

        $modelName = ucfirst($modelName);

        try {
            $modelClass = "\\App\\Models\\$modelName";
            $model = $modelClass::findOrFail($id);
            $model->deleteMedia($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Model not found'], 404);
        }
    }
}
