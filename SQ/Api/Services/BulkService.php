<?php
namespace SQ\Api\Services;

use SQ\Api\Response;
use SQ\Api\Models\Bulk\Order;

class BulkService extends BaseService
{
    /**
     * 创建订单
     *
     * @param array|Order $bulk_order
     * @return Response
     */
    public function CreateBulkOrder($bulk_order)
    {
        if (!$bulk_order instanceof Order) {
            $bulk_order = new Order($bulk_order);
        }
        $bulk_order->check();

        return $this->request_service->makeRequest('CreateBulkOrder', $bulk_order);
    }

    /**
     * 确认订单
     *
     * @param string $code
     * @param integer $type
     * @return Response
     */
    public function ConfirmBulkOrder($code, $type = 1)
    {
        return $this->request_service->makeRequest('ConfirmBulkOrder', [
            'type' => $type,
            'code' => $code
        ]);
    }
    /**
     * 确认manifest
     *
     * @param string $code
     * @param integer $type
     * @return Response
     */
    public function SubmitManifestBulkOrder($code, $type = 1)
    {
        return $this->request_service->makeRequest('SubmitManifestBulkOrder', [
            'type' => $type,
            'code' => $code
        ]);
    }

    /**
     * 获取面单
     *
     * @param string $code
     * @param integer $type
     * @return Response
     */
    public function GetLabel($code, $type = 1)
    {
        return $this->request_service->makeRequest('GetLabel', [
            'type' => $type,
            'code' => $code
        ]);
    }

    /**
     * 取消订单
     *
     * @param string $code
     * @param integer $type
     * @return Response
     */
    public function CancelBulkOrder($code, $type = 1)
    {
        return $this->request_service->makeRequest('CancelBulkOrder', [
            'type' => $type,
            'code' => $code
        ]);
    }

    /**
     * 获取仓库
     *
     * @param string $code
     * @param integer $type
     * @return Response
     */
    public function GetWarehouse()
    {
        return $this->request_service->makeRequest('GetWarehouse');
    }

    /**
     * 获取轨迹
     *
     * @param string $code
     * @param integer $type
     * @return Response
     */
    public function GetTrack($code, $type = 1)
    {
        return $this->request_service->makeRequest('GetTrack', [
            'type' => $type,
            'code' => $code
        ]);
    }

}