﻿# sq-sdk-php

````php
$goods = SQ\Api\Models\Bulk\Test::getGoods();
$consignee = SQ\Api\Models\Bulk\Test::getConsignee();

$bulk_order = new SQ\Api\Models\Bulk\Order([
    'order' => 'TS2500-' . date('m-d') . '-' . mt_rand(1, 10000),
    'weight' => 0.5,
    'weight_unit' => 'kg',
    'length' => 1,
    'width' => 1,
    'height' => 1,
    'length_unit' => 'cm',
    'channel_id' => $channel_id,
    'warehouse_id' => $warehouse_id,
    'consignee' => $consignee,
    'goods' => $goods,
    'remark' => '测试单',
]);

try {
    $bulk_service = new SQ\Api\Services\BulkService($client_code, $client_secret);
    /** @var SQ\Api\Response */
    $bulk_response = $bulk_service->CreateBulkOrder($bulk_order);
} catch (Throwable $th) {

}
````
