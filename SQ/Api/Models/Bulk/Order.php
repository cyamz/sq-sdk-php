<?php
namespace SQ\Api\Models\Bulk;

use SQ\Api\Exceptions\ModelException;
use SQ\Api\Models\Model;

class Order extends Model
{
    public function check()
    {
        $required_arr = [
            'consignee',
            'order',
            'goods',
            'weight',
            'channel_id',
            'warehouse_id'
        ];
        foreach ($required_arr as $required) {
            if (null === $this->{$required}) {
                throw new ModelException("订单", "缺少必填字段-" . $required);
            }
        }

        if (null === $this->weight_unit) {
            $this->weight_unit = 'kg';
        }
        if (null === $this->length_unit) {
            $this->length_unit = 'cm';
        }

        $consignee = $this->consignee;
        if (!$consignee instanceof Consignee) {
            $consignee = new Consignee($consignee);
        }
        try {
            $consignee->check();
        } catch (ModelException $me) {
            throw new ModelException("订单", "consignee校验失败: (" . $me->getMessage() . ')');
        }
        $this->consignee = $consignee->toArray();

        $arr_goods = [];
        $goods = $this->goods;
        if (!is_array($goods)) {
            throw new ModelException("订单", "订单产品详情应为数组格式");
        }
        $good_declare = 0;
        foreach ($goods as $good) {
            if (!$good instanceof Good) {
                $good = new Good($good);
            }
            try {
                $good->check();
            } catch (ModelException $me) {
                throw new ModelException("订单", "good校验失败: (" . $me->getMessage() . ')');
            }
            $arr_goods[] = $good->toArray();

            $good_declare += $good->quantity * $good->price;
        }
        $good_declare = round($good_declare, 2);
        if (null === $this->declare) {
            $this->declare = $good_declare;
        } else {
            $this->declare = round($this->declare, 2);
            if ($this->declare != $good_declare) {
                throw new ModelException("订单", "申报价值与产品详情总价不一致");
            }
        }
        $this->goods = $arr_goods;

    }

}