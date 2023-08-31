<?php
namespace SQ\Api\Models\Bulk;

use SQ\Api\Exceptions\ModelException;
use SQ\Api\Models\Model;

class Good extends Model
{
    public function check()
    {
        $required_arr = [
            'name',
            'name_en',
            'price',
            'quantity',
        ];
        foreach ($required_arr as $required) {
            if (null === $this->{$required}) {
                throw new ModelException("产品", "缺少必填字段-" . $required);
            }
        }

        if (!preg_match("/[\x7f-\xff]/", $this->name)) {
            throw new ModelException("产品", "产品中文名应含中文");
        }

    }

}