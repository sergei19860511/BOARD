<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    //public static $wrap = 'test'; Переопределяем обвёртку целенаправленно
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'price' => $this->price,
            'created_at' => $this->created_at->format('d.m.Y H:m:s'),
            'updated_at' => $this->updated_at->format('d.m.Y H:m:s'),
            'author' => $this->when($this->price > 0, function () {
                return $this->user->name;
            }, function () {
                return "Автор объявления {$this->user->name} не указал цену, поэтому его имя не имеет смысла";
            })
        ];
    }
}
