<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerController extends Controller
{
    /**
     * 返回JSON格式的Swagger定义
     *
     * 这里需要一个主`Swagger`定义：
     * @SWG\Swagger(
     *     basePath="/v1",
     *      host="api.hezhongyimeng.com",
     * 		schemes={"https"},
     * 		produces={"application/json"},
     * 		consumes={"application/json"},
     *   @SWG\Info(
     *     title="合众API文档",
     *     version="1.0.0",
     *     @SWG\Contact(name="call@me.com"),
     *     @SWG\License(name="proprietary")
     *   )
     *
     *
     * )
     */
    public function getJSON()
    {
        $swagger = \Swagger\scan(app_path('Http/Controllers/'));

        return response()->json($swagger, 200);
    }

    /**
     * 假设是项目中的一个API
     *
     *
     * @SWG\Get(path="/swagger/my-data",
     *   tags={"project"},
     *   summary="拿一些神秘的数据",
     *   description="请求该接口需要先登录。",
     *   operationId="getMyData",
     *   produces={"application/json"},
     *   @SWG\Parameter(
     *     in="body",
     *     name="reason",
     *     type="json",
     *     description="拿数据的理由",
     *     @SWG\Schema(
     *              @SWG\Property(
     *                  property="items",
     *                  type="array",
     *                  @SWG\Items(
     *                      type="object",
     *                      @SWG\Property(property="id", type="integer", example=1),
     *                      @SWG\Property(property="name", type="string", example="权限管理"),
     *                      @SWG\Property(property="route", type="string", example="/admin/permission/index")
     *                  )
     *              ),
     *     )
     *   ),
     *   @SWG\Response(response="default", description="操作成功")
     * )
     */

    public function getMyData()
    {

    }
}
