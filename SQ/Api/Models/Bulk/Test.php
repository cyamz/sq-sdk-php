<?php
namespace SQ\Api\Models\Bulk;

class Test
{
    /**
     * 获取测试商品
     *
     * @return Good[]
     */
    public static function getGoods()
    {
        $goods = [];
        $goods[] = new Good([
            'name' => '鞋子',
            'name_en' => 'Shoes',
            'hscode' => '12345678',
            'price' => 5,
            'quantity' => 1,
        ]);
        $goods[] = new Good([
            'name' => '衣服',
            'name_en' => 'Dresses',
            'price' => 2.5,
            'quantity' => 2,
        ]);

        return $goods;
    }

    /**
     * 获取测试地址
     *
     * @param string $key 国家[us_1,us_2,nz,au,br,il,mx,gb]
     * @return Consignee
     */
    public static function getConsignee($key = 'us_1')
    {
        $consignee_arr = [
            'us_1' => [
                "name" => "Raul Ortega",
                "phone" => "7086764422",
                "state" => "TX",
                "city" => "Fort Hood",
                "address1" => "51337 Jumano Ct",
                "address2" => "unit 1",
                "postcode" => "76544-1161",
                'country' => 'US',
            ],
            'us_2' => [
                'name' => 'YANYAN HUANG',
                'phone' => '1-646-932-5778',
                'address1' => '15015 Horace Harding Expy',
                'state' => 'NY',
                'province' => 'NY',
                'postcode' => '11367',
                'city' => 'Flushing',
                'country' => 'US',
            ],
            //新西兰
            'nz' => [
                'company' => 'YANYAN HUANG',
                'name' => 'AMAZON',
                'phone' => '1234567891',
                'state' => 'Ancklan',
                'province' => 'Ancklan',
                'city' => 'Ancklan',
                'address1' => '109QueenSt',
                'postcode' => '28214-8082',
                'country' => 'NZ',
            ],
            //澳大利亚
            'au' => [
                'country' => 'AU',
                'name' => 'kahley',
                'phone' => '7926976436',
                'state' => 'VIC',
                'province' => 'VIC',
                'city' => 'drouin',
                'address1' => '4 marion place',
                'postcode' => '3818',
            ],
            //巴西 需要税号 tax_number
            'br' => [
                'country' => 'BR',
                'name' => 'Larissa Soares de Menezes',
                'phone' => '34992338305',
                'state' => 'MG',
                'province' => 'MG',
                'city' => 'Rio De Janeiro',
                'address1' => 'rua três de maio número 305',
                'address2' => 'bairro independência',
                'postcode' => '38780-000',
                'tax_number' => '068.868.931-06'
            ],
            //以色列
            'il' => [
                'country' => 'IL',
                'name' => 'Marissa',
                'phone' => '7926976436',
                'state' => 'TEST',
                'province' => 'TEST',
                'city' => 'Worcestershire',
                'address1' => '4 Newlands Close',
                'postcode' => 'DY11 5AR',
                'email' => 'test@gmail.com'
            ],
            //墨西哥
            'mx' => [
                'country' => 'MX',
                'name' => 'Karen',
                'phone' => '7775920',
                'state' => 'TEST',
                'province' => 'TEST',
                'city' => 'Chicago',
                'address1' => '545 N Dearborn St #2304',
                'postcode' => '60654',
            ],
            //英国
            'gb' => [
                'country' => 'GB',
                'name' => 'Ionela Andreea',
                'phone' => '07507968952',
                'state' => 'PD',
                'province' => 'Padova',
                'city' => 'London',
                'address1' => '6 Stirling road',
                'postcode' => 'E13 0BJ',
            ]
        ];

        return new Consignee($consignee_arr[$key]);
    }

}
