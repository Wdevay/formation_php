<?php
namespace App\Models;

use App\Models\AbstractTable;


class Post extends AbstractTable
{

    protected ?int $user_id = null;
    protected ?string $title = null;
    protected ?string $description = null;
    protected ?string $image = null;
    private ?string $created_at = null;
    protected ?string $updated_at = null;

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function toArray(){
        $postArray=[
            $this->user_id,
            $this->title,
            $this->description,
            $this->image,
            $this->created_at,
            $this->updated_at
        ];
        return $postArray;
    }

   
}
