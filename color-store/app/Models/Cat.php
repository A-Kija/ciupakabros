<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\UploadedFile;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'colors_count', 'photo'];
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function gallery()
    {
        return $this->hasMany(Photo::class, 'cat_id', 'id');
    }

    public function deletePhoto()
    {
        if ($this->photo) {
            $photo = public_path() . '/cats-photo/' . $this->photo;
            unlink($photo);
            $photo = public_path() . '/cats-photo/t_' . $this->photo;
            unlink($photo);
        }
        $this->update([
            'photo' => null,
        ]);
    }

    public function savePhoto(UploadedFile $photo) : string
    {
        $name = $photo->getClientOriginalName();
        $name = rand(1000000, 9999999) . '-' . $name;
        $path = public_path() . '/cats-photo/';
        $photo->move($path, $name);
        $img = Image::make($path . $name);
        $img->resize(200, 200);
        $img->save($path . 't_' . $name, 90);
        return $name;
    }
}
