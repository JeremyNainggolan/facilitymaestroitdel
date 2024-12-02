<?php

namespace App\Http\Resources\Hateoas;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserHateoasResource extends JsonResource
{
    public $status;
    public $message;
    public $links;
    public $resource;

    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */
    public function __construct($status, $message, $resource, $links)
    {
        $this->status = $status;
        $this->message = $message;
        $this->resource = $resource;
        $this->links = $links;
    }


    /**
     * toArray
     *
     * @param  mixed $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'status'   => $this->status,
            'message'   => $this->message,
            'resource'      => $this->resource,
            'links'     => $this->links,
        ];
    }
}
