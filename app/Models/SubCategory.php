<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $subcategory;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;

    public static function getImageUrl($request)
    {
        self::$image          = $request->file('image');
        self::$imageName      = self::$image->getClientoriginalName();
        self::$directory      = 'sub-category-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl       = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newSubCategory($request)
    {
        self::$subcategory                 = new SubCategory();
        self::$subcategory->category_id    = $request->category_id;
        self::$subcategory->name           = $request->name;
        self::$subcategory->description    = $request->description;
        self::$subcategory->image          = self::getImageUrl($request);
        self::$subcategory->save();
    }

    //show category details in subcategory manage file
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subcategory = SubCategory::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$subcategory->image))
            {
                unlink(self::$subcategory->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$subcategory->image;
        }

        self::$subcategory->category_id    = $request->category_id;
        self::$subcategory->name           = $request->name;
        self::$subcategory->description    = $request->description;
        self::$subcategory->image          = self::getImageUrl($request);
        self::$subcategory->save();
    }

    public static function deleteSubCategory($id)
    {
        self::$subcategory = SubCategory::find($id);
        if(file_exists(self::$subcategory->image))
        {
            unlink(self::$subcategory->image);
        }
        self::$subcategory->delete();
    }

}
