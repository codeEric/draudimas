<?php

namespace App\Http\Controllers;

use App\Models\CarImage;
use Illuminate\Http\Request;

class CarImageController extends Controller
{

    public function destroy($id)
    {
        $carImage = CarImage::find($id);
        unlink(storage_path('app/public/cars/' . $carImage->image));
        $carImage->delete();

        return back()->with('success', 'Image has been deleted');
    }
}
