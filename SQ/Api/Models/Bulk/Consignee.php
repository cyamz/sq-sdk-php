<?php
namespace SQ\Api\Models\Bulk;

use SQ\Api\Exceptions\ModelException;
use SQ\Api\Models\Model;

class Consignee extends Model
{
    public function check()
    {
        $required_arr = [
            'name',
            'phone',
            'state',
            'city',
            'postcode'
        ];
        foreach ($required_arr as $required) {
            if (null === $this->{$required}) {
                throw new ModelException("收件地址", "缺少必填字段-" . $required);
            }
        }

    }

}